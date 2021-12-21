<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sendmail', function () {
    \Mail::raw('Text to e-mail', function ($message) {
       $message->to('rizkymaulanamm@gmail.com')->subject("test");
    });
    
    dd('sukses');
});


 
Route::get('reset', function (){
    Artisan::call('storage:link');
});
Route::get('config', function (){
    Artisan::call('config:cache');
});

Route::get('mail','PelaporanController@mail');
Route::get('qrcode-with-image', function () {
	$image = \QrCode::format('png')->merge('https://www.garutkab.go.id/assets/img/logo-kabupaten-garut.png', .3, true)->generate('asd');
 return response($image)->header('Content-type','image/png');
});
Route::get('pengajuan/create', ['as' => 'pengaduan.create', 'uses' => 'PengaduanController@create']);
Route::post('pengajuan', ['as' => 'pengaduan.store', 'uses' => 'PengaduanController@store']);
Route::get('/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'userwaiting');
Route::get('/waiting', ['as' => 'waiting', 'uses' => 'HomeController@waiting']);

Route::middleware(['auth'])->group( function () {
	//Pelaporan
	Route::resource('pelaporan', 'PelaporanController', ['except' => ['show', 'destroy']]);
	Route::get('pelaporan/json','PelaporanController@json');
	Route::get('/pelaporan-air-chart-ajax', 'HomeController@pelaporanairchartAjax');
	Route::get('/pelaporan-udara-chart-ajax', 'HomeController@pelaporanudarachartAjax');
	Route::get('/pelaporan-limbahb3-chart-ajax', 'HomeController@pelaporanlimbahb3chartAjax');
	Route::get('/pelaporan-lingkungan-chart-ajax', 'HomeController@pelaporanlingkunganchartAjax');
	Route::get('pelaporan/form', ['as' => 'pelaporan.form', 'uses' => 'PelaporanController@form']);	
	Route::post('pelaporan/form', ['as' => 'pelaporan.form-status', 'uses' => 'PelaporanController@formstatus']);
	Route::get('pelaporan/export', ['as' => 'pelaporan.export', 'uses' => 'PelaporanController@pelaporanexport']);
	Route::get('pelaporan/tanggapi/{id}', ['as' => 'pelaporan.pelaporanreview', 'uses' => 'PelaporanController@pelaporanreview']);
	Route::put('pelaporan/', ['as' => 'pelaporan.review', 'uses' => 'PelaporanController@review']);
	Route::get('pelaporan/{id}', ['as'     => 'pelaporan.show', 'uses' => 'PelaporanController@show']);	
	Route::get('pelaporan/destroy/{id}', ['as' => 'pelaporan.destroy', 'uses' => 'PelaporanController@destroy']);
	Route::post('/notification-pelaporan/get', 'NotificationController@get');
	Route::post('/notification-pelaporan/read', 'NotificationController@read');
	Route::post('/notification-pelaporan/readall', 'NotificationController@readall');
	//Review
	Route::get('tanggapan', ['as' => 'review.index', 'uses' => 'PelaporanController@indexreview']);
	Route::get('tanggapan/json','PelaporanController@jsonreview');
	Route::get('tanggapan/export', ['as' => 'review.export', 'uses' => 'PelaporanController@exportreview']);
	Route::get('tanggapan/{id}', ['as' => 'review.show', 'uses' => 'PelaporanController@showreview']);
	Route::get('tanggapan/email/{id}', ['as' => 'review.email', 'uses' => 'PelaporanController@emailreview']);

	//Profile
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::get('profile/edit-password', ['as' => 'profile.editpassword', 'uses' => 'ProfileController@editpassword']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::middleware(['auth', 'admin'])->group( function () {
	//Pengaduan
	Route::resource('pengajuan', 'PengaduanController',  ['except' => ['create', 'store', 'show', 'destroy']]);
	Route::get('pengaduan/json','PengaduanController@json');
	Route::get('/pengaduan-chart-ajax', 'HomeController@pengaduanchartAjax');
	Route::get('pengaduan/export', ['as' => 'pengaduan.export', 'uses' => 'PengaduanController@export']);
	Route::get('pengajuan/{id}', ['as'     => 'pengaduan.show', 'uses' => 'PengaduanController@show']);	
	Route::get('pengaduan/destroy/{id}', 'PengaduanController@destroy');
	Route::get('pengajuan/selesai/{id}', ['as' => 'selesai', 'uses' => 'PengaduanController@selesai']);
	Route::get('pengajuan/tolak/{id}', ['as' => 'tolak', 'uses' => 'PengaduanController@tolak']);
});

Route::middleware(['auth', 'operator'])->group( function () {
	//User
	Route::resource('user', 'UserController', ['except' => ['show', 'aktivasi', 'destroy']]);
	Route::get('user/json','UserController@json');
	Route::post('user/aktivasi/{id}', ['as' => 'user.aktivasi', 'uses' => 'UserController@aktivasi']);
	Route::post('user/deaktivasi/{id}', ['as' => 'user.deaktivasi', 'uses' => 'UserController@deaktivasi']);
	Route::get('user/export', ['as' => 'user.export', 'uses' => 'UserController@export']);
	Route::get('user/destroy/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
});


