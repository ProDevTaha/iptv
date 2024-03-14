<?php

namespace App\Http\Controllers;

use App\Models\blogs_images;
use App\Models\Temp;
use DB;
use Illuminate\Http\Request;
use App\Models\Blogs; 
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\OrderVisa;
use App\Models\OrderTrial;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;

class adminController extends Controller
{

    public function __invoke(Request $request){ 
        if($request->hasFile('image')){
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
         }
    }
    public function search(Request $request){
        if(isset(auth()->user()->id)){
            if(session('userId')){
                $id = $request->orderid;
                $orders = DB::select('SELECT * FROM myorders WHERE orderId LIKE ?', ['%' . $id . '%']);
                return view('myOrders',compact('orders')); 
            }  
        } 
    }
    public function changeStatut($id,$statut){
        if($statut == 0){
            DB::table('myorders')->where('id', $id)->update(['statut' => 1]);
        }else DB::table('myorders')->where('id', $id)->update(['statut' => 0]);
    }
    public function deleteImage(){
        try{
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
    public function register(Request $request){
        if(Auth::User()->name == null && Auth::User()->email ==null){
            return redirect('/login');
        }  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->password =Hash::make($request->password);

        $user->save();
        return back()->with('success','Register successfully');  
    }   
  

   

    public function newBlog(Request $request){
        
        try { 
            // Create a new product instance
            $blog = new Blogs();
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            
            $blog->save();

            $blogId = $blog->id;
        
            // Handle image uploads from temporary storage
            $temps = Temp::all();
            foreach ($temps as $temp) {
                // Copy the image from the temporary directory to the permanent directory
                Storage::copy('images/tmp/' . $temp->folder . '/' . $temp->file, 'images/' . $temp->folder . '/' . $temp->file);
    
                // Create a Product_image record for the product
              
                $blog_image = new blogs_images();
                $blog_image->blog_id = $blogId;
                $blog_image->image = $temp->folder . '/' . $temp->file;
                $blog_image->save();
    
                // Delete the temporary directory and its contents
                Storage::deleteDirectory('images/tmp/' . $temp->folder);
    
                // Delete the temporary record
                $temp->delete();
            }
    
            return back()->with('success_create', 'Blog Created Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function blogDetails(Request $request){ 
        $image       = $request->image;
        $details     = $request->details;
        $titel       = $request->titel;
        return view("blogDetaills",compact('image','titel','details'));
    } 


    public function home(Request $request){

        if(request()->has('day')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  

            $orders = Order::latest()->whereDate('created_at', '=', $request->day)->paginate(11);
            $count = $orders->count(); 
            return view('admin.home',compact('orders','count')); 
        }else if(request()->has('from','to')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  

            $orders = Order::latest()->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->paginate(11);
            $count = $orders->count(); 
            return view('admin.home',compact('orders','count'));  
        }else{
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }   
            $orders = Order::latest()->paginate(11); 
            $count = $orders->count(); 
            return view('admin.home',compact('orders','count')); 
        }
    } 
    
    public function OrderTrial(Request $request){ 

        if(request()->has('day')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
            $orders = OrderTrial::latest()->whereDate('created_at', '=', $request->day)->paginate(11);
            $countTrial = $orders->count(); 
            return view('admin.OrderTrial',compact('orders','countTrial'));
        }else if(request()->has('from','to')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
            $orders = OrderTrial::latest()->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->paginate(11);
            $countTrial = $orders->count(); 
            return view('admin.OrderTrial',compact('orders','countTrial')); 
        }else{
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
    
            $orders = OrderTrial::latest()->paginate(11); 
            $countTrial = $orders->count(); 
            return view('admin.OrderTrial',compact('orders','countTrial')); 
        }

    }
    public function OrderVisa(Request $request){ 

        if(request()->has('day')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
            $orders = OrderVisa::latest()->whereDate('created_at', '=', $request->day)->paginate(11);
            $countVisa = $orders->count(); 
            return view('admin.OrderVisa',compact('orders','countVisa'));
        }else if(request()->has('from','to')){
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
            $orders = OrderVisa::latest()->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->paginate(11);
            $countVisa = $orders->count(); 
            return view('admin.OrderVisa',compact('orders','countVisa')); 
        }else{
            if(Auth::User()->name == null && Auth::User()->email ==null){
                return redirect('/login');
            }  
    
            $orders = OrderVisa::latest()->paginate(11); 
            $countVisa = $orders->count(); 
            return view('admin.OrderVisa',compact('orders','countVisa')); 
        }

    }

    
} 
