<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClearLoginController;
use App\Http\Controllers\LoginController;

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
    return redirect(route('login'));
});

Route::get('/debug', function () {
    ClearLoginController::debug();
});

Route::get('/logout', function(){
    LoginController::logout();
    return redirect(route('login'));
});

Route::get('/login', function(){
    ClearLoginController::updateUser();
    return LoginController::login_check();
})->name('login');
Route::post('/login', function(Request $request){
    return LoginController::login($request);
});

Route::get('/admin', function (Request $request) {
    if (!($request->get('part')) || ($request->get('part') == 'users')) {
        return AdminController::users($request);
    } elseif ($request->get('part') == 'test') {
        return AdminController::test($request);
    } elseif ($request->get('part') == 'stats') {
        return AdminController::stats($request);
    }
})->middleware('auth')->name('admin');

Route::get('/admin/add_empl', function (Request $request) {
    return AdminController::add_empl_view();
})->middleware('auth')->name('add_empl');
Route::post('/admin/add_empl', function (Request $request) {
    return AdminController::add_empl($request);
});

Route::get('/coordinator', function (Request $request) {
    return view('coordinator.coordinator');
})->middleware('auth')->name('coordinator');

Route::get('/ppe_worker', function (Request $request) {
    return view('ppe_worker.ppe_worker');
})->middleware('auth')->name('ppe_worker');