<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\DB;

Route::get('/db', function () {
    try {
        DB::connection()->getPdo();
        return '✅ DB connected successfully.';
    } catch (\Exception $e) {
        return '❌ Connection failed: ' . $e->getMessage();
    }
});
