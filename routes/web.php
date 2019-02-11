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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    if(isset(Auth::user()->id)) {
        if(Auth::user()->role_id == 2) {
            return view('student/welcome');
        } else {
            return view('home');
        }
    } else {
        return view('welcome');
    }
})->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('user', 'UserController');

Route::post('student/get_marks', 'StudentDetailController@get_marks');

