<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\EstadoLogController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TipoDocumentacionController;
use App\Http\Controllers\CategoriaDocumentacionController;
use App\Http\Controllers\EstadoDocumentacionController;
use App\Http\Controllers\ReporteInsumoConsumibleController;
use App\Http\Controllers\ReporteInsumoFungibleController;
use App\Http\Controllers\ReporteInsumoInventariadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EquipoItController;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
Route::get('/error-500', function () {
    throw new HttpException(500);
});

Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::view('/auth-logout-basic', 'auth-logout-basic')->name('auth-logout-basic');
Route::view('/auth-offline', 'auth-offline')->name('auth-offline');

Route::get('/auth-lockscreen-basic', [App\Http\Controllers\LockScreenController::class, 'showLockScreenForm'])->name('lockscreen');
Route::post('/auth-lockscreen-basic', [App\Http\Controllers\LockScreenController::class, 'unlockScreen'])->name('unlockscreen');
Route::post('/tareas/{tarea}', [TareaController::class, 'completarTarea'])->name('tareas.completar');
Route::post('/tareas/{tarea}/revertir', [TareaController::class, 'revertirTarea'])->name('tareas.revertir');
Route::post('/tareas/{tarea}/borrar', [TareaController::class, 'borrarTarea'])->name('tareas.borrar');


Auth::routes();
//Language Translation
Route::middleware(['auth', 'lockscreen'])->group(function () {
    Route::post('/logs/{id}/remove-file', [App\Http\Controllers\LogController::class, 'removeFile'])->name('logs.remove-file');
    Route::post('/documentacions/{id}/remove-file', [App\Http\Controllers\DocumentacionController::class, 'removeFile'])->name('documentacions.remove-file');
    Route::get('/equipo_its/detalles/{id}', [EquipoItController::class, 'detalles'])->name('equipo_its.detalles');
    Route::get('/equipo_its/dashboard', [EquipoItController::class, 'dashboard'])->name('equipo_its.dashboard');
    Route::get('/equipo_its/status', [EquipoItController::class, 'getEquipoItStatus'])->name('equipo_its.status');
    Route::get('/documentacions/dashboard', [DocumentacionController::class, 'dashboard'])->name('documentacions.dashboard');
    Route::get('/documentacions/status', [DocumentacionController::class, 'getDocumentacionStatus'])->name('documentacions.status');
    Route::get('/documentacions/status-by-month-and-status', [DocumentacionController::class, 'getDocumentacionByMonthAndStatus'])->name('documentacions.getDocumentacionByMonthAndStatus');
    Route::get('/logs/dashboard', [LogController::class, 'dashboard'])->name('logs.dashboard');
    Route::get('/logs/status', [LogController::class, 'getLogStatus'])->name('logs.status');
    Route::get('/logs/status-by-month-and-status', [LogController::class, 'getLogByMonthAndStatus'])->name('logs.getLogByMonthAndStatus');
    Route::get('/logs/filter-by-status', [LogController::class, 'filterLogsByStatus'])->name('logs.filterByStatus');
    Route::get('/logs/filter-by-status1', [LogController::class, 'filterLogsByStatus1'])->name('logs.filterByStatus1');
    Route::get('/tareas/dashboard', [TareaController::class, 'dashboard'])->name('tareas.dashboard');
    Route::get('/tareas/status', [TareaController::class, 'getTareaStatus'])->name('tareas.status');
    Route::get('/tareas/status-by-month-and-status', [TareaController::class, 'getTareaByMonthAndStatus'])->name('tareas.getLogByMonthAndStatus');
    Route::get('/tareas/filter-by-status', [TareaController::class, 'filterTareasByStatus'])->name('tareas.filterByStatus');
    Route::get('/tareas/filter-by-status1', [TareaController::class, 'filterTareasByStatus1'])->name('tareas.filterByStatus1');

    Route::resource('/documentacions', DocumentacionController::class);
    Route::resource('/estado_logs',EstadoLogController::class);
    Route::resource('/logs', LogController::class);
    Route::resource('/tipo_documentacions', TipoDocumentacionController::class);
    Route::resource('/categoria_documentacions', CategoriaDocumentacionController::class);
    Route::resource('/estado_documentacions', EstadoDocumentacionController::class);

    Route::resource('/tareas', TareaController::class);
    Route::resource('/equipo_its', EquipoItController::class)->only(['index', 'show']);
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details


    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
});
Route::post('/estado_documentacions', [App\Http\Controllers\EstadoDocumentacionController::class, 'store1'] )->name('estado_documentacions.store1');
Route::post('/tipo_documentacions', [App\Http\Controllers\TipoDocumentacionController::class, 'store1'] )->name('tipo_documentacions.store1');
Route::post('/categoria_documentacions', [App\Http\Controllers\CategoriaDocumentacionController::class, 'store1'] )->name('categoria_documentacions.store1');





Route::get('equipo_its/{search}', [EquipoItController::class, 'filter']);


//DOCUMENTACION
Route::put('documentacions/{documentacion}/toggle-complete', [DocumentacionController::class, 'toggle'])->name('documentacions.toggle-complete');
//ESTADO_LOG
Route::put('estado_logs/{estado_log}/toggle-complete', [EstadoLogController::class, 'toggle'])->name('estado_logs.toggle-complete');
//LOG
Route::put('logs/{log}/toggle-complete', [LogController::class, 'toggle'])->name('logs.toggle-complete');
//TIPO_DOCUMENTACION
Route::put('tipo_documentacions/{tipo_documentacion}/toogle-complete', [TipoDocumentacionController::class, 'toggle'])->name('tipo_documentacions.toggle-complete');
//UBICACION
//TASK
Route::put('tasks/{task}/toggle-complete', [TaskController::class, 'toggle'])->name('tasks.toggle-complete');
//CATEGORIA DOCUMENTACION
Route::put('categoria_documentacions/{categoria_documentacion}/toggle-complete', [CategoriaDocumentacionController::class, 'toggle'])->name('categoria_documentacions.toggle-complete');
Route::put('reporte_insumo_consumibles/{reporte_insumo_consumible}/toggle-complete', [ReporteInsumoConsumibleController::class, 'toggle'])->name('reporte_insumo_consumibles.toggle-complete');
