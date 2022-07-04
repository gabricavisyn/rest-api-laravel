<?php

// This function will rickroll you

use Illuminate\Support\Facades\Route;

Route::get('/rickroll', function(Request $request){
    return response("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
});
