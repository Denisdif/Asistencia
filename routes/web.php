<?php

use App\Http\Livewire\Nuevos\Horarios;
use App\Http\Livewire\Nuevos\HorasExtras;
use App\Http\Livewire\Nuevos\Incidencias;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('puestos', 'livewire.puestos.index')->middleware('auth');
	Route::view('departamentos', 'livewire.departamentos.index')->middleware('auth');
	Route::view('areas', 'livewire.areas.index')->middleware('auth');
	Route::view('empresas', 'livewire.empresas.index')->middleware('auth');
	Route::view('horas_extras', 'livewire.horas-extras.index')->middleware('auth');
	Route::view('incidencias', 'livewire.incidencias.index')->middleware('auth');
	//Route::view('jornadas', 'livewire.jornadas.index')->middleware('auth');
	Route::view('empleados', 'livewire.empleados.index')->middleware('auth');
	Route::view('categorias_de_horarios', 'livewire.categorias-de-horarios.index')->middleware('auth');
	Route::view('tipos_de_incidencias', 'livewire.tipos-de-incidencias.index')->middleware('auth');

Route::middleware('auth')->group(function() {
	Route::get('horarios/{id}/jornadas/', Horarios::class)->name('jornadas');
	Route::get('empleados/{id}/incidencias', Incidencias::class)->name('incidencias');
	Route::get('empleados/{id}/horas_extras', HorasExtras::class)->name('horas_extras');
});
	