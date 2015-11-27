<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Billboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('page1','Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
// ambil view resgiter
Route::get('auth/register', 'Auth\AuthController@getRegister');
// post ke db
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::resource('home','homeController');
// Route::get('home',function(){
// 	$data=Billboard::all();
// 	return view('home',compact('data'));
// });

Route::get('aboutUs','homeController@aboutUs');
 // Route::get('aboutUs',function(){
 // 	return view ('aboutUs');
 // });

Route::get('auth/upgradeAccount',function(){
 	return view ('auth/updgrade');
 });

Route::get('billboardList','merchantController@billboardList');
// Route::get('billboardList',function(){
// 	$data=Billboard::all();
//  	return view ('billboardList',compact('data'));
//  });

Route::resource('home','merchantController');
Route::get('auth/addBillboard','merchantController@create');
// Route::get('auth/addBillboard',function(){
//  	return view ('auth/addBillboard');
//  });

Route::post('auth/addBillboard','merchantController@store');
// Route::post('auth/addBillboard',function(Request $request){
//   Billboard::create($request->all());
//    $data=Billboard::all();
//         return view('billboardList',compact('data'));
// });
Route::get('auth/updateBillboard','merchantController@edit');
Route::post('auth/updateBillboard','merchantController@update');

Route::delete('billboardList/{id}', 'merchantController@destroy');

Route::get('orderList',function(){
	$data=Billboard::all();
 	return view ('orderList',compact('data'));
 });

Route::get('auth/changePassword',function(){
 	return view ('auth/changePassword');
 });

Route::get('auth/forgotPassword',function(){
 	return view ('auth/forgotPassword');

    // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
    $repass = ['prize' => 'Peke', 'total' => 3 ];

    // "emails.hello" adalah nama view.
    Mail::send('auth/email', $repass, function ($mail)
    {
      // Email dikirimkan ke address "momo@deviluke.com"
      // dengan nama penerima "Momo Velia Deviluke"
      $mail->to('hairinisapratiwi@yahoo', 'Hairinisa Pratiwi');

      // Copy carbon dikirimkan ke address "haruna@sairenji"
      // dengan nama penerima "Haruna Sairenji"
      //$mail->cc('haruna@sairenji', 'Haruna Sairenji');

      $mail->subject('Hello World!');
    });
});
Route::get('foo',function(){
  // Buat testing wkwkwkwkwkkwkw

});
Route::post('auth/forgotPassword', function(Request $request){
  // define variabel
  $email =  $request->input('email');
  $user= new App\User;
  $forgotToken =Hash::make(Auth::user()->name);
  $url='http://localhost:8000/foo'.$forgotToken;

  // validasi email yang dimasukkin cocok ga sama yang ada di database
  if($user->findEmail($email) == true){
    // bagian ini kalau masukin email yang bener

    // masukin data token ke field forgot token;
    $user->insertForgotToken($forgotToken);

    //TODO ICHA  kirim email ke email yang dimasukkin dengan token
    return 'Email true';
  }else{
    // bagian ini kalau email yang dimasukkin salah
    return 'email yang anda masukan salah';
  }
});

Route::get('auth/forgotPassword/{token}',function($token){

  // define variabel
  $user= new App\User;
  // cek token ada atau ga
  if($user->tokenValidate($token) == 'token Exist'){
    // TODO icha bikin form buat ngisi reset password
  }else{
    return 'invalid token';
  }
});

 Route::post('auth/addToCart',function(Request $request){
   Billboard::create($request->all());
    $data=Billboard::all();
         return view('billboardList',compact('data'));
 });


//Route::get('aboutus','halamanController@aboutUs');

// Route::get('page1/{$id}','halamanController@show')

// tampilin data hanya yang id nya 2
