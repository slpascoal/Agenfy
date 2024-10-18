<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post(‘register’, ‘UserController@store’)->name(‘users.store’);
