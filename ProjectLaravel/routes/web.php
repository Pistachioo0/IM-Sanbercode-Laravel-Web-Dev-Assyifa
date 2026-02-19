<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));
Route::get('/register', fn () => view('register'));
Route::get('/welcome', fn () => view('welcome'));
