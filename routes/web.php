<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::get('/', [MainController::class, 'index']);
Route::get('/full_image/{img}', [MainController::class, 'show']);

Route::resource('/article', ArticleController::class);

Route::post('save_comment/{article}', [CommentController::class, 'store']) -> name('save_comment');
Route::delete('article/{article}/{comment}', [CommentController::class, 'destroy']) -> name('comment.destroy');
Route::get('article/{article}/{comment}/edit', [CommentController::class, 'edit']) -> name('comment.edit');
Route::put('article/{article}/{comment}', [CommentController::class, 'update']) -> name('comment.update');

Route::get('/auth/signin', [AuthController::class, 'signIn']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('auth/login/', [AuthController::class, 'login']) -> name('login');
Route::post('auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('auth/logout/', [AuthController::class, 'logout']) -> name('logout');


Route::get('/main', function() {
    return view('layout');
});

Route::get('/about', function() {
    return view('main/about');
});

Route::get('/contacts', function(){
    $array = [
        'name' => 'MosPolytech',
        'address' => 'Bolshaya Semenovskaya',
        'email' => 'q@mospoly.ru',
        'phone' => '+7 (910) 950 13-28',
    ];

    return view('main/contacts', ['contact' => $array]);
});