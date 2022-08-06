<?php

use App\Models\Exam;
use App\Http\Controllers\GetChoice;
use App\Http\Controllers\GetAnswered;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamCheckPoint;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\TestPsikologController;

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



Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('actionLogin', [AuthController::class, 'actionLogin'])->name('actionLogin');
Route::post('actionRegister', [AuthController::class, 'actionRegister'])->name('actionRegister');
Route::get('logout', [AuthController::class, 'actionLogout'])->name('logout');

Route::get('/', function () {
    return view('user.home');
});

// Route::resource('/login', LoginController::class);


Route::group(['middleware' => 'authCheck:admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    });

    Route::resource('/answer', AnswerController::class);
    Route::resource('/exam', ExamController::class);
    Route::resource('/quiz', QuizController::class);
});
Route::get('/get-choice/{id}', [GetChoice::class, 'getChoice'])->name('get-choice');

Route::group(['middleware' => 'authCheck:user'], function(){
    Route::resource('/tes-psikologi', TestPsikologController::class, ['except' => 'index']);
    Route::resource('/exam-checkpoint', ExamCheckPoint::class);
    Route::get('/get-answered/{quiz_id}/{user_id}', [GetAnswered::class, 'getLisan'])->name('get-answered');
});

Route::get('/tes-psikologi', [TestPsikologController::class, 'index']);


// Route::get('/tes-psikologi', function () {
//     $tahap = Exam::get();
//     return view('user.tes-psikologi', compact('tahap'));
// });


// Route::group(['middleware' => ''])
Route::get('/kerjasama', function () {
    return view('user.kerjasama');
});

Route::get('/tentang-kami', function () {
    return view('user.tentang-kami');
});





