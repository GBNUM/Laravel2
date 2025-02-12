<?php

use App\Http\Controllers\AuthCOntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthCOntroller::class, 'register']);
Route::post('/login', [AuthCOntroller::class, 'login']);
