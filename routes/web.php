<?php

use App\Http\Controllers\EncadrementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FieldController;
use App\Http\Middleware\Authenticate;

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

// Route::get('/', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('students', StudentController::class)->middleware(Authenticate::class);
// Route::resource('students', StudentController::class);
Route::get('/search', [StudentController::class, 'search'])->name('search')->middleware(Authenticate::class);
// Route::get('/search', [StudentController::class, 'search'])->name('search');


//Route::get('/cherche', [ProduitController::class, 'cherche'])->name('cherche');

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('fields', FieldController::class);
Route::resource('encadrements', EncadrementController::class)->middleware(Authenticate::class);
