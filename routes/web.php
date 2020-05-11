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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return "Hello world";
    
//     });

// Route::get('/users/{id}',function($id){
//     return "this is " .$id;
// });

// Route::get('/users/{id}/{name}',function($id,$name){
//     return "this is " . $name . ' with an id ' .$id;
// });

// Route::get('/about',function(){
//     return view('pages.about');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::Resource('posts','PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
