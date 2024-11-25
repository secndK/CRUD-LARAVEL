<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

Route::get('/', function () {
    $contact = Contact::all();
    return view('contact.index', compact('contact'));
});




Route::resource('contact', ContactController::class);
