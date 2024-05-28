<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\SendEmailJob;

Route::get('/', function () {
    return response()->json(['message' => 'You did it!']);
});

Route::get('/send-email', function () {
    $email = 'test@example.com';
    SendEmailJob::dispatch($email);
    return 'Email has been sent!';
});

