<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function (): JsonResponse {
    return response()->json(['message' => 'Hello, World!']);
});
