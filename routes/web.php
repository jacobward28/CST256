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
    return view('login');
});
Route::post('/updateUser', 'userController@updateUser');
route::post('/doLogout', 'loginController@onLogout');

Route::get('/profile', function()
{
    return view('profile');
});
Route::get('/getUser', 'userController@getUserById');

Route::get('/doDisplay', function() {

    return view('displayUser');
});

route::post('/doDisplay', 'userController@doDisplayUser');

Route::get('/suspended', function()
{
    return view('suspended');
});


// route for update button the display user page
Route::get('/displayUserUpdate', function () {
    return view("displayUser");
});

//points the view to the controller to process the function and send back to the view
Route::post('/doUpdate', 'userController@DoUpdateUser');
Route::post('/updateUser', 'userController@UpdateUser');
    
// Route for the delete button on the display user page
Route::get('/displayUserDelete', function () {
    return view("displayUser");
});
//points the view to the controller to process the function and send back to the view
Route::post('/doDelete', 'userController@DoDeleteUser');

