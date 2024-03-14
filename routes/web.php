<?php

use App\Models\Blogs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware('setapplang')->prefix('{local}')->group(function(){
   
// });

Route::get('/',function(){return view('index');})->name('index'); 

Route::get('/successOrder',[Controller::class , 'successOrder'])->name('successOrder');    
Route::get('success_Trial', function () {return view('payment.successTrial');})->name('success_Trial');    
Route::post('/trial',[OrderController::class , 'trial'])->name('trial');
Route::get('/installation',function(){return view('installation');})->name('installation');
Route::get('/blog',function(){return view('admin/blog');});
Route::get('/PrivacyPolicy',function(){return view('PrivacyPolicy');});
Route::get('/ReturnsPolicy',function(){return view('ReturnsPolicy');});

Route::get('/loginView',function(){return view('newClient');})->name('loginView');



Route::match(['get','post'],'/checkout', [OrderController::class , 'checkout'])->name('checkout');  
Route::post('/login', [Controller::class,'login'])->name('login');
Route::delete('/logout',[Controller::class,'logout'])->name('logout');
Route::post('/checkoutDetail',[OrderController::class,'checkoutDetail'])->name('checkoutDetail');
Route::post('/checkoutPost',[Controller::class,'checkoutPost'])->name('checkoutPost');

Route::get('/blogs',[Controller::class , 'blogs']);


Route::group(['middleware'=>'auth'] , function(){
  Route::get('/register',function(){return view('admin.register');})->name('register');
  Route::get('/Order_Visa',[adminController::class , 'OrderVisa'])->name('Order_Visa');
  Route::get('/Order_Trial',[adminController::class , 'OrderTrial'])->name('Order_Trial');
  Route::post('/register',[adminController::class , 'register'])->name('register');
  Route::get('/myOrders',[Controller::class ,'myOrders']);
  Route::post('/search',[adminController::class,'search'])->name('search');
  Route::post('/changeStatut/{id}/{statut}',[adminController::class , 'changeStatut'])->name('changeStatut');
  Route::get('/newBlog',[Controller::class , 'newBlog']);
  
  Route::post('/uploadImages',[Controller::class,'uploadImages']);
  Route::delete('/createBlog',[Controller::class,'deleteImage']);
  Route::post('/createBlog',[Controller::class,'createBlogPost'])->name('create.blog');
  
});  

Route::get('/blogs/{id}',[Controller::class,'blogDetaills']);



Route::group(['middleware'=>'guest'],function(){
  Route::post('/contactUs',[Controller::class , 'contactUs'])->name('contactUs');
  Route::post('/#contact',[Controller::class , 'contactUs'])->name('contactUsSweet');
  Route::post('stripeCheckout',)->name('stripe.post');
  Route::get('/newAcount',function(){return view('newClient'); });
  Route::post('/newUser',[Controller::class , 'newUser'])->name('newUser') ;
  Route::get('/resetPassword/{token}',[Controller::class , 'ConfermResetPassword']) ;
  Route::get('/resetPassword',[Controller::class , 'resetPassword'])->name('resetPassword') ;
  Route::get('/resetPasswordView',[Controller::class , 'resetPasswordView']);
  Route::post('/resetPassword',[Controller::class , 'resetPassword'])->name('resetPassword') ;
});
/*========================== routes auth user  =============================*/





