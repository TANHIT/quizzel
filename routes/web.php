<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppUserController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Typecontroller;
use App\Http\Controllers\Wordcontroller;


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

Route::get('/',[Homecontroller::class ,'home'])->name('home');
Route::get('/login',[Usercontroller::class ,'login'])->name('login');
Route::post('/login',[Usercontroller::class ,'postlogin'])->name('postlogin');
Route::get('/register',[Usercontroller::class ,'register'])->name('register');//name để gọi qua route
Route::post('/register',[Usercontroller::class ,'postregister']);
Route::get('/logout',[Usercontroller::class ,'logout'])->name('logout');

//retset-password
Route::get('/forget-password',[Usercontroller::class ,'forgetpassword'])->name('forgetpassword');
Route::post('/forget-password',[Usercontroller::class ,'postforgetpassword']);//lấy dữ liệu từ from

Route::get('/get-password',[Usercontroller::class ,'getresetpassword'])->name('getresetpassword');//from pass mới
Route::post('/get-password',[Usercontroller::class ,'postresetpassword']);//xử lý from

//điều hướng quan lý user
Route::get('/quanly', [UserController::class, 'quanlyuser'])->name('quanly');
Route::delete('/quanly/delete/{id}', [UserController::class, 'delete'])->name('quanly.delete');
Route::get('/quanly/edit/{id}', [UserController::class, 'edit'])->name('quanly.edit');
Route::put('/quanly/update/{id}', [UserController::class, 'update'])->name('quanly.update');

Route::get('quanly/add', [UserController::class, 'quanlyadd'])->name('quanly.add');
Route::post('quanly/store', [UserController::class, 'store'])->name('quanly.store');


Route::get('/now',[Usercontroller::class ,'now'])->name('now');


Route::get('/search',[Wordcontroller::class,'index'])->name('word.search');
Route::get('/word-detail',[Wordcontroller::class,'detail'])-> name('word.detail');

Route::group(['prefix' => 'admin'],function(){
    Route::get('/',[Admincontroller::class ,'dashboard'])->name('admin.dashboard');

    Route::resources([
        'type'=> Typecontroller::class,
        'word'=> Wordcontroller::class,
        'user'=> Usercontroller::class
    ]);
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/loginadmin',[Admincontroller::class ,'loginadmin'])->name('loginadmin');
    Route::get('/users', [ManageUserController::class, 'index'])->name('usersIndex');

    Route::get('/adminhome', [AdminController::class, 'adminhome'])->name('adminhome');

    Route::get('/globalQuizzes', [AdminController::class, 'globalQuizzes'])->name('globalQuizzes');

    Route::get('/createSection', [SectionsController::class, 'createSection'])
        ->name('createSection');

    Route::post('/deleteSection/{id}', [SectionsController::class, 'deleteSection'])
        ->name('deleteSection');

    Route::post('/storeSection/section', [SectionsController::class, 'storeSection'])
        ->name('storeSection');

    Route::get('/editSection/{section}', [SectionsController::class, 'editSection'])
        ->name('editSection');

    Route::post('/updateSection/{section}', [SectionsController::class, 'updateSection'])
        ->name('updateSection');

    Route::get('/listSection', [SectionsController::class, 'listSection'])
        ->name('listSection');

    Route::get('/detailSection/{section}', [SectionsController::class, 'detailSection'])
        ->name('detailSection');

    Route::get('/createQuestion/{section}', [QuestionsController::class, 'createQuestion'])
        ->name('createQuestion');

    Route::get('/detailQuestion/{question}', [QuestionsController::class, 'detailQuestion'])
        ->name('detailQuestion');

    Route::post('/storeQuestion/{section}', [QuestionsController::class, 'storeQuestion'])
        ->name('storeQuestion');
    Route::post('/deleteQuestion/{id}', [QuestionsController::class, 'deleteQuestion'])
        ->name('deleteQuestion');
});

//Route::middleware(['auth', 'verified', 'role:admin|user'])->prefix('appuser')->group(function () {

    Route::get('/userQuizHome', [AppUserController::class, 'userQuizHome'])
        ->name('userQuizHome');

    Route::get('/userQuizDetails/{id}', [AppUserController::class, 'userQuizDetails'])
        ->name('userQuizDetails');

    Route::post('/deleteUserQuiz/{id}', [AppUserController::class, 'deleteUserQuiz'])
        ->name('deleteUserQuiz');

    Route::get('/startQuiz', [AppUserController::class, 'startQuiz'])
        ->name('startQuiz');
//});
