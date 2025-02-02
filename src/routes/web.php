<?php

use CoderManjeet\LaravelContactForm\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;

Route::get('contact', [ContactFormController::class, 'index'])->name('contact.index');
Route::get('contact/create', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactFormController::class, 'store'])->name('contact.store');
Route::delete('contact/{id}', [ContactFormController::class, 'destroy'])->name('contact.destroy');
