<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; 
use App\Models\OrderTrial;
use App\Mail\OrderMessage;
use GuzzleHttp\Client;
session_start();
class OrderController extends Controller {  

    public function trial(Request $order)
    {

        $order->validate(
           [
               'firstname'=>'required',
               'lastname'=>'required',
               'email'=>'required|email',     
           ] 
        ); 
        
        OrderTrial::create($order->all());

        return redirect()->route('success_Trial'); 
    }  

    


    public function checkout(Request $request){
        $client = new Client();
    
        $client->post('http://127.0.0.1:8081/api/checkout', [
            'json' => [
                'dataPayment' => [
                    'price' => $request->price,
                    'course' => $request->offre,
                ],
            ],
        ]); 
       
    }  

    public function saveData($data){
        $_SESSION['data'] = $data;
        return  $_SESSION['data'] ;
    }
    
    public function checkoutDetail(Request $data){
        try {
            $price = $data->input('price');
            $month  = $data->input('month');    
            $course  = $data->input('course');    
            $thankyou  = $data->input('thankyou');    
            $description = $data->input('description');
            return view('checkoutDetail',compact('price','month','course','thankyou'));
        } catch (\Throwable $th) {
            return  $th->getMessage();
        } 
    }
    public function saveCheckout(Request $data){
        try {
            $price = $data->input('price');
            $type  = $data->input('type');
            $month  = $data->input('month');    
            $description = $data->input('description');
            return view('checkoutDetail',compact('price','type','description','month'));
        } catch (\Throwable $th) {
            return  $th->getMessage();
        } 
    }

}
