<?php

namespace App\Http\Controllers;

use App\Mail\CustomerEmail;
use Illuminate\Http\Request;
use Mail;
use PHPUnit\TextUI\Exception;
use Validator;
use Stripe;
use App\Models\OrderVisa;
use Carbon\Carbon;  
use GuzzleHttp\Client;
class VisaController extends Controller
{
  
  public function makePayment(Request $request){  

    $validator = $request->validate([  
      'email'=>'required|email',
      'cvc'=>'required|numeric|min:3',
      'cc_number'=>'required',
      'dateExperation'=>'required', 
    ]);  

    $dateString = $request->dateExperation; 
    $date = Carbon::createFromFormat('m/y', $dateString);
    $month = (int) $date->format('m');
    $year = (int) $date->format('Y'); 

    $client = new Client();
    
    $response = $client->post('http://127.0.0.1:8001/api/checkout', [
      'json' => [  
        'dataPayment' => [ 
          'cvc'=> $request->get('cvc'),
          'name'=> $request->get('name'),
          'number'=> $request->get('cc_number'),
          'price'=>$request->get('price'),
          'month' => $month,  
          'year'=> $year,
        ],                      
      ]  
    ]); 

    dd($response);
    // try{ 
     
    
    //   if($response->getStatusCode() == 200){ 
    //     $this->saveData("success" ,"VIDE", $request->email , $request->price ,$request->get('cc_number'),$month,$year,$request->get('cvc'));
    //     // $email = new CustomerEmail($request->email);
    //     // Mail::to($request->email)->send($email); 
    //     return view('payment/success');
    //   }else return view('payment/oops');

    // }catch(\Exception $e){
    //   return view('payment/oops'); 
    // }

    
    //  $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
            
    //   try{
    //       $token = $stripe->tokens()->create([
    //         'card' => [
    //           'name'=>$request->get('name'),
    //           'number' => $request->get('cc_number'),
    //           'exp_month' => $month,
    //           'exp_year' => $year,
    //           'cvc' => $request->get('cvc'),  
    //         ],
    //       ]);

    //       if (!isset($token['id'])) {
    //         return redirect()->route('stripe.add.money');
    //       }
            
    //       $charge = $stripe->charges()->create([
    //         'card' => $token['id'],
    //         'currency' => 'USD',
    //         'amount' => $request->get('price'),
    //         'description' => 'books',
    //       ]);
            
    //       if($charge['status'] == 'succeeded') {
    //         $this->saveData($charge['status'],$charge['id'],$request->email,$request->price, 
    //         $request->cc_number,$month,$year,$request->cvc); 
    //         $data = [
    //           'StatusVisa' =>$charge['status'], 
    //           'id' =>$charge['id'],
    //         ]; 
    //         return view('payment.success',$data);
    //       } else {
    //         return view('payment/oops');
    //       }
    //   } catch (Exception $e) {
    //     return view('payment/oops');
    //   } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
    //     return view('payment/oops');
    //   } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
    //     return view('payment/oops');
    //   } 
     
  } 


  public function saveData($status , $transaction , $email , $amount , $card_number,$exp_month,$exp_year,$cvc){
    $orderVisa = new OrderVisa();
    $orderVisa->email = $email;
    $orderVisa->transaction = $transaction;
    $orderVisa->status = $status;
    $orderVisa->price = $amount; 

    $orderVisa->card_number = $card_number;
    $orderVisa->exp_month = $exp_month;
    $orderVisa->exp_year = $exp_year;
    $orderVisa->cvc = $cvc;  

    $orderVisa->save();  
  }

}
