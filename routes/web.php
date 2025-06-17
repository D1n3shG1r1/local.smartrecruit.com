<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Candidate\Register as CandidateRegister;
use App\Http\Controllers\Candidate\Dashboard as CandidateDashboard;
use App\Http\Controllers\Candidate\Profile as CandidateProfile;
use App\Http\Controllers\Candidate\Resume as CandidateResume;

use App\Http\Controllers\Employer\Register as EmployerRegister;
use App\Http\Controllers\Employer\Dashboard as EmployerDashboard;
use App\Http\Controllers\Employer\Profile as EmployerProfile;


Route::get('/', function () {
    return view('content');
});


Route::prefix('employer')->name('employer.')->group(function () {
    Route::post('/login',[EmployerRegister::class, 'login']);
    Route::post('/register',[EmployerRegister::class, 'register']);  
    Route::get('/dashboard ',[EmployerDashboard::class, 'dashboard']);  
    Route::get('/myprofile ',[EmployerProfile::class, 'myprofile']);  
    Route::post('/saveprofile ',[EmployerProfile::class, 'saveprofile']);  
});

Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::post('/login',[CandidateRegister::class, 'login']);
    Route::post('/register',[CandidateRegister::class, 'register']);   
    Route::get('/dashboard ',[CandidateDashboard::class, 'dashboard']);  
    Route::get('/myprofile ',[CandidateProfile::class, 'myprofile']);  
    Route::post('/saveprofile ',[CandidateProfile::class, 'saveprofile']);  
    Route::get('/myresume ',[CandidateResume::class, 'resumeform']); 
    Route::post('/updateresume ',[CandidateProfile::class, 'updateresume']);  
});