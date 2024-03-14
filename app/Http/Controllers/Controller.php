<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use Log;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use Hash;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Models\Temp;
use Storage;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function contactUs(Request $request){
        try {
            $dataContact = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'comment' => $request->input('comment'),
            ];
            Mail::send('mails.contact',$dataContact,function($message){
                $message->to('bootcoders.tv@gmail.com','Hicham marhar')
                ->subject('Dear Hicham New Contact');
            });
            return redirect()->route('contactUsSweet')->with('contactSuccess','contactSuccess');
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }  
    }
    
    public function blogDetaills($id){
        try {

            $blog = Blogs::with('images')->where('id', $id)->latest()->paginate(13);

            return view('blogDetaills',compact('blog'));
        } catch (\Throwable $th) {
            return $th->getMessage(); 
        }
    }
    public function successOrder(Request $request){
        
       try {
            $login =  $request->login;
            $phone =  $request->phone;
            $email =  $request->email;
            $price =  $request->price;
            $offre =  $request->offre;
            $orderId =  $request->orderId;
            $date =   $request->input('date');  
            if( $login == '00'){
                session(['saveOrderWhenUserLoginOrSignUp' => true]);
                session(['login' => $login ]); 
                session(['phone' => $phone ]); 
                session(['email' => $email ]); 
                session(['price' => $price ]); 
                session(['offre' => $offre ]); 
                session(['date' =>  $date  ]);
                session(['orderId' =>  $orderId  ]);
                return view('payment.success',compact('login'));
            }else{
                DB::insert(
                    "INSERT INTO myorders (created_at, price, offre, id_user) VALUES (?, ?, ?, ?)",
                    [$date, $price, $offre, $login]
                );
                return view('payment.success',compact('login'));
            }
       } catch (\Throwable $th) {
            return  $th->getMessage();
       }
       
    }

    public function newUser(Request $request){  
        try {
            $user = new User();
            $firstname = $request->firstname;
            $user->name = $request->firstname." ".$request->lastname; 
            $user->email = $request->email; 
            $user->password =Hash::make($request->password);
            $register = true;
            $user->save();
            session([
                'userId' => $user->id,
                'firstname'=>$request->firstname,
                'lastname' =>$request->lastname 
            ]);
            // $save = session('saveOrderWhenUserLoginOrSignUp');
            // if($save == true){
            //     $date = session('date');$price = session('price');$id_user = $user->id;$offre = session('offre');
            //     Log::info('insert data in myorders : date'.$save .$date . $price . $offre . $id_user );
            //     DB::insert(
            //         "INSERT INTO myorders (created_at, price, offre, id_user) VALUES (?, ?, ?, ?)",
            //         [$date, $price, $offre, $id_user]
            //     );
            // }
            return redirect()->route('loginView')->with('createSuccess','createSuccess');  
        } catch (\Throwable $th) {
            return  $th->getMessage();      
        }
    }
    
    public function login(Request $dataUser){
        try {
            $credetials = [
                'email'=> $dataUser->email,
                'password'=> $dataUser->password 
            ];    
            if(Auth::attempt($credetials)){
                session([
                    'userId' => auth()->user()->id,
                    'lastname' =>auth()->user()->name,
                ]);
                $save = session('saveOrderWhenUserLoginOrSignUp');
                if($save == true){
                    $date = session('date');$orderId = session('orderId');$price = session('price');$id_user = auth()->user()->id;$offre = session('offre');
                    Log::info('insert data in myorders : date'.$save .$date . $price . $offre . $id_user );
                    DB::insert(
                        "INSERT INTO myorders (created_at, price, offre, id_user,orderid) VALUES (?, ?, ?, ?,?)",
                        [$date, $price, $offre, $id_user,$orderId]
                    );
                    session()->forget('saveOrderWhenUserLoginOrSignUp');
                }
                return redirect()->route('index')->with('successLogin','success login');       
            }else
           
            return redirect()->route('index')->with('faildLogin','your email or password is incorrect. try again');
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }


    public function logout(){
       try {
            Auth::logout(); 
            session()->forget('firstname');
            session()->forget('lastname');
            session()->forget('userId');
            return redirect()->route('index');
       } catch (\Throwable $th) {
        return $th->getMessage(); 
       }
    } 
    

    public function myOrders(Request $request){
        try {
            if(isset(auth()->user()->id)){
                if(session('userId')){
                    $id = auth()->user()->id;
                    if(auth()->user()->email == 'bootcoders@gmail.com'){
                        $orders = DB::table('myorders')->latest()->paginate(10);
                        return view('myOrders',compact('orders')); 
                    }else {
                        $orders = DB::select('select * from myorders where id_user = ?', [$id]);
                        return view('myOrders',compact('orders')); 
                    }
                }  
            } 
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }


    public function checkoutPost(Request $request){
        //validation
        $request->validate([
            'exp_year' => 'required|expiration_year',
            'exp_month' => 'required|expiration_month',
            'CVC' => 'required|cvc',
            'card_number' => 'required|credit_card_number',
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255'
        ], [
            'exp_year.expiration_year' => 'The expiration year is not valid.',
            'exp_month.expiration_month' => 'The expiration month is not valid.',
            'CVC.cvc' => 'The CVC is not valid.',
            'card_number.credit_card_number' => 'The credit card number is not valid.',
        ]);
      
        $client = new Client();
    
        $response = $client->post('http://127.0.0.1:8082/api/checkout', [
          'json' => [  
            'dataPayment' => [ 
                'exp_year' => $request->input('exp_year'),
                'exp_month' => $request->input('exp_month'),
                'CVC' => $request->input('CVC'),
                'card_number' => $request->input('card_number'),
                'name' =>$request->input('name'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'price'=> $request->input('price'), 
                'course'=> $request->input('course') 
            ],                      
          ]  
        ]); 
    
        dd($response);
        //send email to customer and seller
        //return thnkyoupage
    }
    public function deleteImage(){
        try{
            Log::info("<======= delete image started ========>");
            $temp = Temp::where('folder',request()->getContent())->first();
            if(!empty($temp->folder)){ 
                Storage::deleteDirectory('images/tmp/' . $temp->folder);
                $temp->delete();
                return $temp;
            }
            return $temp;
        }catch(\Exception $e){ 
            return response()->noContent() ;
        } 
    }
    public function uploadImages(Request $request){
        try {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $folder = uniqid('image-',true);
            $image->storeAs('images/tmp/'.$folder ."/". $filename);
            $tempImage = new  Temp();
            $tempImage->fill([
                'folder' => $folder,
                'file' => $filename,
            ]);
            $tempImage->save();
            return $folder;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function createBlogPost(Request $request){
        try {

            $blogId = DB::table('blogs')->insertGetId([
                'title'=> $request->title,
                'description' => $request->description
            ]);

            $temps = Temp::all();
            foreach ($temps as $temp) {
                // Copy the image from the temporary directory to the permanent directory
                Storage::copy('images/tmp/' . $temp->folder . '/' . $temp->file, 'public/images/' . $temp->folder . '/' . $temp->file);
    
                // Create a Product_image record for the product
              
                DB::table('blogs_images')->insertGetId([
                    'blogs_id'=> $blogId,
                    'image' => $temp->folder . '/' . $temp->file
                ]);  
    
                // Delete the temporary directory and its contents
                Storage::deleteDirectory('images/tmp/' . $temp->folder);
    
                // Delete the temporary record
                $temp->delete();
            }

            return view('newBlog')->with('success','success ');
        } catch (\Throwable $th) {
            return  $th->getMessage();
        }
    }
    public function resetPassword(Request $request){
        try {
            if ($request->token && !empty($request->token)) {
                if ($request->token == 'LnMX9S3NfcbHZ5PsIA3pR4ShOcKZGHMj161EBTtt') {  // Using $request->_token for CSRF token
                    $email = $request->email;
                    $user = User::where('email', $email)->first();
            
                    if ($user) {
                        $password = Hash::make($request->password);
                        $user->update([
                            'password' => $password
                        ]);
                        return redirect()->route('loginView')->with('passwordResetSuccess', 'Password reset successfully.');
                    } else {
                        return view('resetPassword')->with('emailNotExist', 'Email does not exist.');
                    }
                } else {
                    return redirect()->route('loginView');
                }
            }            

            $emailIn = $request->input('email');
            
            $user = DB::table('users')->where('email', $emailIn)->first();
            
            if (!empty($user)) {
                $data = [
                    'username' => $user->name,
                ];
                Mail::send('mails.resetPassword', $data, function ($message) use ($user) {
                    $message->to($user->email, $user->name)
                            ->subject('Reset Password');
                });
                $token = "";
                $send  = "true";
                return view('resetPassword',compact('token','send'))->with('success', 'email is exist');
            } else {
                $token = "";
                $send  = "false";
                return view('resetPassword',compact('token','send'))->with('failed', 'email is NotExist ');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }
    
    public function resetPasswordView(){
        $token = "";
        $send = "";
        return view('resetPassword',compact('token','send'));
    }

    public function ConfermResetPassword($token){
        try {
            if($token == "LnMX9S3NfcbHZ5PsIA3pR4ShOcKZGHMj161EBTtt"){
                return view('resetPassword',compact('token'));
            }else return redirect()->route('loginView'); 
        } catch (\Throwable $th) {
            return $th->getMessage(); 
        }
    }

    public function blogs(){
        try {
            $blogs = Blogs::with('images')->latest()->paginate(13);
        
        
            Log::info($blogs);
            return view('blogs',compact('blogs')); 
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }
    public function newBlog(){
        try {
            return view('newBlog');
        } catch (\Throwable $th) {
            return  $th->getMessage(); 
        }
    }
}
