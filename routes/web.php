<?php

use App\Http\Controllers\Logic\CandidateController;
use App\Http\Controllers\Logic\NomineeController;
use App\Http\Controllers\Logic\SessionController;
use Illuminate\Support\Facades\Route;

/* ----------------| Web Routes |---------------- */

Route::get('/', [SessionController::class, 'index'])->name('home');
Route::post('mes-choix', [SessionController::class, 'openSession'])->name('session.open');
Route::get('mes-choix', [SessionController::class, 'statusSession'])->name('session.status');
Route::post('restart', [SessionController::class, 'restartSession'])->name('session.restart');
Route::post('quitter', [SessionController::class, 'endSession'])->name('session.end');


Route::get('candidats', [CandidateController::class, 'index'])->name('candidats.index');
Route::post('candidats', [CandidateController::class, 'store'])->name('candidats.store');
Route::post('return-candidats', [CandidateController::class, 'destroy'])->name('candidats.back');


Route::get('nominees', [NomineeController::class, 'index'])->name('nominees.index');
Route::post('nominees', [NomineeController::class, 'update']);
