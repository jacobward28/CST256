<?php

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

// view for login page.
Route::get('/loginpage', function () {
    return view("login");
    });
//points the view to the controller to process the function and send back to the view
Route::post('/login', 'loginController@log');

// view for registration page
Route::get('/registrationpage', function () {
    return view ("register");
});

//points the view to the controller to process the function and send back to the view
Route::post('/register', 'registrationController@register');

Route::get('/logout', function()
{
    return view('logout');
});

route::post('/doLogout', 'loginController@onLogout');