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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('pages.about');
});

Route::get('/login', function () {
    return view('pages.login1');
});

Route::get('/template', function () {
    return view('layoutTemplate');
});

/* leave */
Route::get('/createleave', function () {
    return view('pages.leave.create');
});

Route::get('/leavedetails', function () {
    return view('pages.leave.viewdetails');
});

Route::get('/mylistofleave', function () {
    return view('pages.leave.mylistofleave');
});

Route::get('/alllistofleave', function () {
    return view('pages.leave.alllistofleave');
});

Route::get('/editleave', function () {
    return view('pages.leave.editleave');
}); 

/* ini form aslinya guys*/
Route::get('/forms', function () {
    return view('pages.formsTemplate');
});

Route::get('/createAccount', function () {
    return view('pages.user.createAccount');
});

