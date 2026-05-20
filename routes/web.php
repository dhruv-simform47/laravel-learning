<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeChecker;
// susbscription manager
use App\Http\Middleware\CheckPrimiumStatus;
use App\Services\SubscriptionManager;

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


// Route::get("/admin/login",[UserController::class,'getLogin']);
// Route::post("/admin/login",[UserController::class,'login']);

Route::prefix('/admin')->group(function(){
Route::get("/login",[UserController::class,'getLogin']);
Route::post("/login",[UserController::class,'login']);
Route::get("/add-user",[UserController::class,'addUser']);

// =============Middleware practice =================
//to use this commented route comment the below group middleware route of this same number 11
// Route::get('/dashboard/{email}', function($email){
//     return view('admin.dashboard', ['email' => $email]);
// })->middleware('Agecheck');
});


// number 11  from app.php uncomment middleware registration
Route::middleware('Agecheck')->group(function(){
Route::get('/admin/dashboard/{email}', function($email){
    return view('admin.dashboard', ['email' => $email]);
});


Route::post("admin/add-user",[UserController::class,'addUser']);

});


Route::match(['get','post'],'/add-details',[UserController::class,'addDetail'])->middleware([AgeChecker::class]);

// ============  Database ==================

Route::get("/users",[UserController::class,'user']);

Route::get("/students",[StudentController::class,'getStudents']);




// ===========(Subsription Manager)  service provider use with middleware =========

    Route::get("/primium-content",function(){
        return view('subscribers.primium');
    })->middleware(CheckPrimiumStatus::class);