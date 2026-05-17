<?php

use App\Http\Controllers\ContactController;

// SoftDelete routes for contacts
Route::get('contacts/trashed', [ContactController::class, 'trashed'])->name('contacts.trashed');
Route::post('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
Route::delete('contacts/{id}/forceDelete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');

// Main resource routes
Route::resource('contacts', ContactController::class);
