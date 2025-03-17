<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesktopController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// Página principal (solo accesible para invitados)
Route::get('/', function () { return view('home'); });

/*Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');*/

// Rutas de los escritorios (DesktopController)
Route::middleware('auth')->controller(DesktopController::class)->group(function () {
    Route::get('desktops', 'index')->name('desktops.index');
    Route::get('desktops/create', 'create')->name('desktops.create');
    Route::post('desktops', 'store')->name('desktops.store');
    Route::post('/desktop/{id}/upload', 'uploadFile')->name('desktop.upload');
    Route::delete('/desktops/{desktop}', 'destroy')->name('desktops.destroy');

});

// Rutas de los proyectos (ProjectController)
Route::middleware('auth')->controller(ProjectController::class)->group(function () {
    Route::get('projects', 'index')->name('projects.index');
    Route::get('projects/create', 'create')->name('projects.create');
    Route::post('projects', 'store')->name('projects.store');
});

// Rutas de las tareas (TaskController)
Route::middleware('auth')->controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index')->name('tasks.index');
    Route::get('tasks/create', 'create')->name('tasks.create');
    Route::get('tasks/{project}/{task}/edit', 'edit')->name('tasks.edit');
    Route::put('tasks/update', 'update')->name('tasks.update');
    Route::post('tasks', 'store')->name('tasks.store');
    Route::post('/tasks/{task}/complete', 'markAsCompleted')->name('tasks.markAsCompleted');
    Route::post('/tasks/{task}/incomplete', 'markAsIncompleted')->name('tasks.markAsIncompleted');
    Route::post('tasks/{task}/update-status', 'updateStatus')->name('tasks.updateStatus');
    Route::delete('/tasks/{task}/destroy', 'destroy')->name('tasks.destroy');
});

// Dashboard (solo accesible para usuarios autenticados)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home'); // Asegúrate de que esta vista existe
    })->name('dashboard');
});
