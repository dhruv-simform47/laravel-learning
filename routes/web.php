<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/base/{name?}',function($name = null){
    return view('base',['name'=>$name]);

});

Route::view("welcome","welcome");

Route::redirect("/root","/home");