<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//note Routeları

Route::get("/notes",[NoteController::class,"index"])->name("notes_index");
Route::get("/notes/createPage",[NoteController::class,"createPage"])->name("notes_createPage");
Route::post("/notes/addNote",[NoteController::class,"addNote"])->name("notes_addNote"); //store gibi

//jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get("/masterTest",function (){
   return view("front.layouts.master");
});
