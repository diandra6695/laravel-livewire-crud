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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/post/add', 'posts.add');
Route::view('/post/list', 'posts.list');
Route::get('/post/edit/{id}', function($id){
    return view('posts.edit',['id'=>$id]);
});