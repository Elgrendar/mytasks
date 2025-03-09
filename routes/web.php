<?php

use App\Models\Desktop;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('desktops',function(){
    return view('desktops/desktops',[
        'desktops' => Desktop::all()
    ]);
})->name('desktops');

Route::get('projects',function(){
    return view('projects/projects');
})->name('projects');

Route::get('tasks',function(){
    return view('tasks/tasks');
})->name('tasks');
