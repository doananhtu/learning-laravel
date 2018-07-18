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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');

Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');
Route::post('/ticket/{slug?}/edit', 'TicketsController@update');
Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::get('send-email', function () {
    $data = [
        'name' => 'Learning Laravel',
    ];

    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('trantien13395@gmail.com', 'Learning Laravel');
        $message->to('doananhtu13395@gmail.com')->subject('Learning Laravel test emails');
    });
    return 'Your emails has been sent successfully';
});

Route::post('/comment', 'CommentsController@newComment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
