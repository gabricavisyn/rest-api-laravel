<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/salve', function(Request $request){
    return response("<h1>Evviva</h1>");
});
