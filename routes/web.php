<?php

use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MyApplicationController;
use App\Http\Controllers\ApplicationmanagerController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    
    Route::middleware('role:employer')->group(function(){

        Route::get('/employer/create', [PositionController::class,'create'])
        ->name('employer.create');

    Route::post('/employer/store', [PositionController::class, 'store'])
        ->name('employer.store');

    Route::get('/employer/edit/{position}', [PositionController::class,'edit'])
        ->name('employer.edit');

    Route::post('/employer/update/{position}', [PositionController::class,'update'])
        ->name('employer.update');

    Route::delete('/employer/destroy/{position}', [PositionController::class,'destroy'])
        ->name('employer.destroy');

    Route::get('/employer/dashboard', function () {
        $positions = Position::where('employer_id', Auth::id())->get();
        return view('employer.dashboard', compact('positions'));
    })->name('employer.dashboard');

    Route::get('/positions/{position}/applications',[ApplicationmanagerController::class, 'index'])
            ->name('employer.positions.applications');

    Route::patch('/applications/{application}',[ApplicationmanagerController::class, 'update'])
            ->name('employer.applications.update');
    });

    


    Route::middleware('role:applicant')->group(function(){

    Route::get('/applicant/dashboard', function () {
        $positions = Position::get();
        return view('applicant.dashboard', compact('positions'));
    })->name('applicant.dashboard');

    Route::get('/applicant/positions/{position}', [ApplicantController::class, 'show'])
            ->name('applicant.positions.show');

    Route::post('/positions/{position}/apply', [ApplicationController::class, 'store'])
            ->name('applicant.positions.apply');

    Route::get('/applications',
            [MyApplicationController::class, 'index']
        )->name('applications.index');
    });
    

});



