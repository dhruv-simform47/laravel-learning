<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});


Route::view("welcome","welcome");

Route::redirect("/root","/home");


// Route::get('/base/{name?}',function($name = "guest"){
//     return view('base',['name'=>$name]);  });


// ===== moving view logic to controller =====

Route::get("/base/{email?}",[UserController::class,'getUser']);

Route::get("/admin/login",[UserController::class,'getLogin']);
Route::post("/login",[UserController::class,'login']);

Route::get("admin/add-user",[UserController::class,'addUser']);
Route::post("admin/add-user",[UserController::class,'addUser']);




Route::get('/admin/dashboard/{email}', function($email){
    return view('admin.dashboard', ['email' => $email]);
});

Route::match(['get','post'],'/add-details',[UserController::class,'addDetail']);