<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/* Route::get('/carnet-pdf', function () {
    return view('pdf.carnet');
}); */