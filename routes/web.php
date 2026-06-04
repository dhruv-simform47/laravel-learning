<?php

use App\Http\Controllers\BulkOrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AgeChecker;
use App\Http\Middleware\CheckPrimiumStatus;

// susbscription manager
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::view('welcome', 'welcome');

Route::redirect('/root', '/home');



// Route::get('/base/{name?}',function($name = "guest"){
//     return view('base',['name'=>$name]);  });

// ===== moving view logic to controller =====

Route::get('/base/{email?}', [UserController::class, 'getUser']);

// Route::get("/admin/login",[UserController::class,'getLogin']);
// Route::post("/admin/login",[UserController::class,'login']);

Route::prefix('/admin')->group(function () {
    Route::get('/login', [UserController::class, 'getLogin']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/add-user', [UserController::class, 'addUser']);

    // ============= Middleware practice =================
    // to use this commented route comment the below group middleware route of this same number 11
    // Route::get('/dashboard/{email}', function($email){
    //     return view('admin.dashboard', ['email' => $email]);
    // })->middleware('Agecheck');
});

// number 11  from app.php uncomment middleware registration
Route::middleware('Agecheck')->group(function () {

    Route::get('/admin/dashboard/{email}', function ($email) {
        return view('admin.dashboard', ['email' => $email]);
    });

    Route::post('admin/add-user', [UserController::class, 'addUser']);

});

Route::match(['get', 'post'], '/add-details', [UserController::class, 'addDetail'])->middleware([AgeChecker::class]);

// ============  Database ==================

Route::get('/users', [UserController::class, 'user']);

    
Route::middleware('throttle:procesing-limit')->group(function(){
Route::get('/students', [StudentController::class, 'getStudents']);
});


// Route::get('/students', [StudentController::class, 'demoS']);


// ===========(Subsription Manager)  service provider use with middleware =========

Route::get('/primium-content', function () {
    return view('subscribers.primium');
})->middleware(CheckPrimiumStatus::class);

// ============= Shipment practice ==============

Route::view('/shipment','shipping.shipment');

Route::post('/shipment', [CheckoutController::class, 'getCost']);


// bulk order 
Route::view('/bulkOrder','shipping.bulkOrder');

Route::post('/bulkOrder', [BulkOrderController::class, 'getCost']);

Route::fallback(function(){
return view('index',['status'=>404,'message'=>'page not found']);
});










// apply name.prefix,middleware on subdomain of admin group route
    // Route::prefix('/admin')
    // ->name('admin.')
    // ->middleware(['auth', 'log'])
    // ->group(function () {
        
    //     // Generates: GET /admin/dashboard  (Named: admin.dashboard)
    //     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        
    //     // Generates: GET /admin/metrics    (Named: admin.metrics)
    //     Route::get('/metrics', [UserController::class, 'metrics'])->name('metrics');
        
    // });

    // ==============  vite practice route =====================

    Route::get('/vite', function () {
    return view('vite.home');
});