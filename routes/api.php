<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/etudiant",[EtudiantController::class, "index"])->name('etudiant');
Route::get("/etudiant/create",[EtudiantController::class, "create"])->name('etudiant.create');

Route::get("/etudiant/{etudiant}",[EtudiantController::class, "edit"])->name('etudiant.edit');

Route::post("/etudiant/create",[EtudiantController::class, "store"])->name('etudiant.ajouter');
Route::delete("/etudiant/{etudiant}",[EtudiantController::class, "delete"])->name('etudiant.supprimer');
Route::put("/etudiant/{etudiant}",[EtudiantController::class, "update"])->name('etudiant.update');
