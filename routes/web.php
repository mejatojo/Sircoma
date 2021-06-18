<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'pageController@index');
Route::resource('partenaire','partenaireController')->middleware('auth'); 
Route::resource('product_controller','productLangueController')->middleware('auth');
Route::get('abouts','aboutController@list');
Route::get('categories','categorieController@list');
Route::get('products/{slug}','productController@show');
Route::resource('about','aboutController')->middleware('auth'); 
Route::resource('product','productController')->middleware('auth');
Route::resource('category','categorieController')->middleware('auth'); 
Route::post('/categories/store','categorieController@modifierLangue')->middleware('auth');
Route::put('langues/updateName/{id}','langueController@updateName')->name('updateLang');
Route::resource('langues','langueController')->middleware('auth');
Route::get('/back', function () {
    return view('back-office.includePage');
}); 
Route::get('/changeLang/{lang}','langueController@changeLang');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/foo', function () {
    Artisan::call('storage:link');
});