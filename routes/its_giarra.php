<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/salve', function(Request $request){

    if ($request->header('Accept') == "application/json") {
        return response(json_encode(["message" => "mannaggina"]));
    } else {
        return response("<h1>mannaggina</h1>");
    }


});
