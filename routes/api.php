<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\LoginController;



Route::POST('/login' , [LoginController::class ,'Login']);
