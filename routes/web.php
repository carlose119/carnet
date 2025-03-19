<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //$paneles = Filament::getPanels();
    $panelId = 'admin';
    return redirect(route("filament.{$panelId}.auth.login"));
});


/* Route::get('/carnet-pdf', function () {
    return view('pdf.carnet');
}); */