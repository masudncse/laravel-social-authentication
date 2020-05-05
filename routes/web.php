<?php


use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/github', 'Auth\LoginController@github');
Route::get('/login/github/callback', 'Auth\LoginController@githubRedirect');

Route::get('/login/facebook', 'Auth\LoginController@facebook');
Route::get('/login/facebook/callback', 'Auth\LoginController@facebookRedirect');

Route::get('/login/twitter', 'Auth\LoginController@twitter');
Route::get('/login/twitter/callback', 'Auth\LoginController@twitterRedirect');

Route::get('/login/google', 'Auth\LoginController@google');
Route::get('/login/google/callback', 'Auth\LoginController@googleRedirect');
