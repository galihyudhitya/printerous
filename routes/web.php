<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/master', function () {
    return view('master');
});

// Route::get('/', [Controllers\LoginController::class, 'index']);

Route::get('/homes', [Controllers\LoginController::class, 'home']);

Route::get('/', [Controllers\LoginController::class, 'index']);
Route::get('/login', [Controllers\LoginController::class, 'index']);
Route::post('/login/validate', [Controllers\LoginController::class, 'validate_credetial']);
Route::get('/logout', [Controllers\LoginController::class, 'logout']);

Route::get('/organization', [Controllers\OrganizationController::class, 'index']);
Route::get('/organization_search', [Controllers\OrganizationController::class, 'search']);
Route::get('/organization/add', [Controllers\OrganizationController::class, 'add_organization']);
Route::post('/organization/store', [Controllers\OrganizationController::class, 'store']);
Route::get('/organization/edit/{id}', [Controllers\OrganizationController::class, 'edit_organization']);
Route::post('/organization/update',[Controllers\OrganizationController::class, 'update']);
Route::get('/organization/delete/{id}', [Controllers\OrganizationController::class, 'delete_organization']);


Route::get('/detail/{org_id}', [Controllers\DetailController::class, 'index']);
Route::get('/detailpic/add/{org_id}', [Controllers\DetailController::class, 'add_detail']);
Route::post('/detailpic/store', [Controllers\DetailController::class, 'store']);
Route::get('/detailpic/edit/{org_id}/{id}', [Controllers\DetailController::class, 'edit_detail']);
Route::post('/detailpic/update',[Controllers\DetailController::class, 'update']);
Route::get('/detailpic/delete/{org_id}/{id}', [Controllers\DetailController::class, 'delete_detail']);


Route::get('/blog', 'BlogController@home');
Route::get('/blog/tentang', 'BlogController@tentang');
Route::get('/blog/kontak', 'BlogController@kontak');

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');

Route::get('/adminpage', [Controllers\AdminController::class, 'index']);
Route::get('/editam', [Controllers\AdminController::class, 'editam']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
