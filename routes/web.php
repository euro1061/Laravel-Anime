<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=> 'guest'], function(){
    Route::get('/admin/login', [\App\Http\Livewire\Admin\Login::class, '__invoke'])->name('login');
});

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/admin', [\App\Http\Livewire\Admin\Index::class, '__invoke'])->name('admin');
    Route::get('/admin/tags', [\App\Http\Livewire\Admin\Tags::class, '__invoke'])->name('tags');
    Route::get('/admin/anime', [\App\Http\Livewire\Admin\CAnime::class, '__invoke'])->name('cAnime');
    Route::get('/admin/anime/add', [\App\Http\Livewire\Admin\AAnime::class, '__invoke'])->name('aAnime');
    Route::get('/admin/anime/update/{id}', [\App\Http\Livewire\Admin\UAnime::class, '__invoke'])->name('uAnime');
});

Route::get('/', [\App\Http\Livewire\Home\Index::class, '__invoke'])->name('home');
Route::get('/anime/{id}', [\App\Http\Livewire\Anime\Index::class, '__invoke'])->name('anime');
Route::get('/search/{text}', [\App\Http\Livewire\Home\Search::class, '__invoke'])->name('search');

Route::get('/anime/{id}/play/{epid}', [\App\Http\Livewire\Play::class, '__invoke'])->name('play');