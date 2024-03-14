<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Order;  

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session; 
use URL;
session_start();
class PaypalController extends Controller
{


    private $_api_context;
   
    public function __construct(){
        $paypal_conf = \Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function makePayment(Request $request){

          
        $request->validate(
            [
                'email'=>'required|email',
                'price'=>'required',
            ]   
        ); 
        
        $_SESSION['email'] = $request->email; 
        $_SESSION['price'] = $request->price; 


        $payer = new Payer();

        $payer->setPaymentMethod('PayPal');
        // you can get Data from database

        $my_product=[
            ["name"=>"courde math" ,"price"=>$request->price , "qty"=>"1"]
        ]; 

        $items = []; $i=0; $total = 0;

        foreach($my_product as $v){
            $price_v = (float)$v['price'];
            $items[$i] = new Item();
            $items[$i]->setName($v['name'])
            ->setCurrency('USD')
            ->setQuantity((int)$v['qty'])
            ->setPrice($price_v);
            $i++;
            $total+=($price_v)*((int)$v['qty']);

        }

        $item_list = new ItemList();
        $item_list->setItems($items);
        $amount = new Amount();
        $amount->setCurrency('USD')
        ->setTotal($total);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('courses enligne');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('getPaymentStatuts'))
        ->setCancelUrl(URL::to('getPaymentStatut'));

        $payment  = new Payment();

        $payment->setIntent("Sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));

        try{
            $payment->create($this->_api_context);
        }catch(\PayPal\Exception\PPConnectionException $ex){
            if(\Config::get('app.debug')){
                dd('Connexion timeout');
            }else{
                dd('Some error occur , Sorry for inconvenient');
            }
        }  

        foreach($payment->getLinks() as $link){
            
            if($link->getRel() == 'approval_url'){
               $redirect_url = $link->getHref();
            }
        }

        Session::put('PayPal_payment_id',$payment->getId());

        if(isset($redirect_url)){
            return Redirect::away($redirect_url);
        }
        dd('Unknown error occurred');
    }


    public function getPaymentStatus(){
       
        $request = request();
        
        // $payment_id = Session::get('paymentId');  
        // Session::forget('paypal_payment_id');
        
        $payment_id =  $request->paymentId ;  

        if(empty($request->PayerID) || empty($request->token)){
            dd('Payment failed');
        }

        $payment = Payment::get($payment_id , $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID); 
        $result = $payment->execute($execution , $this->_api_context);
        
        $payment = new Order(); 
               
        // $payment->email = $arr['payer']['payer_info']['email'];
        $payment->email =  $_SESSION['email'];  
        $payment->price = $_SESSION['price'];        
        $payment->payment_id = $request->paymentId; 
        $payment->payer_id = $request->PayerID;  
        $payment->payment_status = $result->getState(); 
        $payment->save(); 
        session_destroy();

        if($result->getState()=='approved'){
            return view('payment.success' , $arr= ['id'=>$request->paymentId]); 
        }
        dd('Payment failed'); 
    }


    public function success(Request $request)
    {

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    } 

    public function error()
    {
        return 'User declined the payment!';   
    }

}
