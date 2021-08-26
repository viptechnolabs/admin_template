<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/test', function () {
//    return view('test');
//});

Route::middleware(['no-auth'])->group(function () {
    Route::get('login', [\App\Http\Controllers\IndexConroller::class, 'login'])->name('login');
    Route::post('do_login', [\App\Http\Controllers\IndexConroller::class, 'doLogin'])->name('do_login');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\IndexConroller::class, 'index'])->name('index');

    Route::get('add_university', [\App\Http\Controllers\IndexConroller::class, 'addUniversity'])->name('add_university');
    Route::post('submit_university', [\App\Http\Controllers\IndexConroller::class, 'SubmitUniversity'])->name('submit_university');
    Route::get('university', [\App\Http\Controllers\IndexConroller::class, 'University'])->name('university');

    Route::get('/add_college', [\App\Http\Controllers\IndexConroller::class, 'addCollege'])->name('add_college');
    Route::post('/add_college', [\App\Http\Controllers\IndexConroller::class, 'submitCollage'])->name('submit_college');
    Route::get('college', [\App\Http\Controllers\IndexConroller::class, 'College'])->name('college');

    Route::get('add_school', [\App\Http\Controllers\IndexConroller::class, 'addSchool'])->name('add_school');
    Route::post('submit_school', [\App\Http\Controllers\IndexConroller::class, 'SubmitSchool'])->name('submit_school');
    Route::get('school', [\App\Http\Controllers\IndexConroller::class, 'School'])->name('school');

    Route::get('add_student', [\App\Http\Controllers\IndexConroller::class, 'addStudent'])->name('add_student');
    Route::post('submit_college', [\App\Http\Controllers\IndexConroller::class, 'SubmitStudent'])->name('submit_student');
    Route::get('student', [\App\Http\Controllers\IndexConroller::class, 'Student'])->name('student');

    Route::get('add_certificate', [\App\Http\Controllers\IndexConroller::class, 'addCertificate'])->name('add_certificate');
    Route::post('submit_certificate', [\App\Http\Controllers\IndexConroller::class, 'submitCertificate'])->name('submit_certificate');
    Route::get('certificate', [\App\Http\Controllers\IndexConroller::class, 'Certificate'])->name('certificate');

    Route::get('activity', [\App\Http\Controllers\IndexConroller::class, 'activity'])->name('activity');
    Route::get('profile', [\App\Http\Controllers\IndexConroller::class, 'profile'])->name('profile');
    Route::get('claim/{id}', [\App\Http\Controllers\IndexConroller::class, 'certificateClaim'])->name('claim');

    Route::get('logout', [\App\Http\Controllers\IndexConroller::class, 'logout'])->name('logout');

});
