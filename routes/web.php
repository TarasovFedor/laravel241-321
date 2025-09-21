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

Route::get('/auth/signin', [AuthController::class, 'signIn']);
Route::get('/auth/register', [AuthController::class, 'register']);


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