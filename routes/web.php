<?php

use App\Http\Controllers\Admin\PromptController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::view('/welcome', 'welcome');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.prompts.index'));
    Route::get('prompts', [PromptController::class, 'index'])->name('prompts.index');
    Route::post('prompts', [PromptController::class, 'store'])->name('prompts.store');
    Route::get('prompts/{prompt}/edit', [PromptController::class, 'edit'])->name('prompts.edit');
    Route::put('prompts/{prompt}', [PromptController::class, 'update'])->name('prompts.update');
    Route::delete('prompts/{prompt}', [PromptController::class, 'destroy'])->name('prompts.destroy');
    Route::post('prompts/{prompt}/activate', [PromptController::class, 'activate'])->name('prompts.activate');
    Route::post('prompts/main', [PromptController::class, 'updateMainPrompt'])->name('prompts.main.update');
});
