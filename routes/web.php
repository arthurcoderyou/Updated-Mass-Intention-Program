<?php

use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\IntentionTypeController;
use App\Http\Controllers\MassIntentionController;
use App\Http\Controllers\RequestTimeOptionController;

//Here, throttle:60,1 allows 60 requests per minute per IP address.
Route::middleware('throttle:60,1')->group(function () {
    Route::view('/', 'welcome')->name('home');

    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth','role_or_permission:Super Admin|profile manage'])
        ->name('profile');





    Route::middleware(['auth'])->group(function(){

        Route::resource('permissions', App\Http\Controllers\PermissionController::class)
            ->middleware(['role_or_permission:Super Admin|permission manage']);


        Route::resource('roles', App\Http\Controllers\RoleController::class)
            ->middleware(['role_or_permission:Super Admin|role manage']);
            // ->middleware('permission:role manage');

        Route::get('roles/add-permissions/{role}',[RoleController::class,'addPermissionToRole'])->name('roles.add_permission')
            ->middleware(['role_or_permission:Super Admin|role add_permission']);

        Route::resource('user', UserController::class)
            ->middleware(['role_or_permission:Super Admin|user manage']);


        Route::resource('activity_logs',ActivityLogsController::class)
            ->middleware(['role_or_permission:Super Admin|activity_log manage']);


        Route::resource('intention_types', IntentionTypeController::class)
            ->middleware(['role_or_permission:Super Admin|type manage']);


        Route::resource('request_time_options', RequestTimeOptionController::class)
            ->middleware(['role_or_permission:Super Admin|time manage']);

        Route::resource('mass_intentions', MassIntentionController::class)
            ->middleware(['role_or_permission:Super Admin|mass_intention manage']);

    });

});
// Route::get('/pdf',function(){

//     // Browsershot::url('https://laravel.com')
//     //     ->save('laravel.pdf');

//     Browsershot::html('https://laravel.com')
//         ->timeout(600) // Set timeout to 600 seconds
//         ->setOption('no-sandbox', true) // If running in a sandboxed environment
//         ->save(storage_path('app'));

//         return view('dashboard');

// });

require __DIR__.'/auth.php';
