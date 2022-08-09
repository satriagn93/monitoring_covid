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

Route::get('/', [App\Http\Controllers\CovidController::class, 'index_report']);

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::post('employee/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/show_delete/{id}',  [App\Http\Controllers\EmployeeController::class, 'showdelete'])->name('employee.show_delete');
Route::delete('employee/{id}/delete', [App\Http\Controllers\EmployeeController::class, 'destroy']);
Route::get('employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit']);
Route::post('employee/{id}/update', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::get('employee/{id}/detail', [App\Http\Controllers\EmployeeController::class, 'detail']);

Route::get('/covid', [App\Http\Controllers\CovidController::class, 'index'])->name('covid');
Route::post('covid/store', [App\Http\Controllers\CovidController::class, 'store'])->name('covid.store');
Route::get('covid/show_delete/{id}',  [App\Http\Controllers\CovidController::class, 'showdelete'])->name('covid.show_delete');
Route::delete('covid/{id}/delete', [App\Http\Controllers\CovidController::class, 'destroy']);
Route::get('covid/{id}/edit', [App\Http\Controllers\CovidController::class, 'edit']);
Route::get('covid/{id}/monitoring', [App\Http\Controllers\CovidController::class, 'monitoring']);
Route::post('covid/{id}/update', [App\Http\Controllers\CovidController::class, 'update']);
Route::post('covid/store_monitoring', [App\Http\Controllers\CovidController::class, 'store_monitoring'])->name('covid.store_monitoring');
Route::get('covid/{id}/detail', [App\Http\Controllers\CovidController::class, 'detail']);

Route::get('/vaksin', [App\Http\Controllers\VaksinEmployeeController::class, 'index'])->name('vaksin');
Route::post('vaksin/store', [App\Http\Controllers\VaksinEmployeeController::class, 'store'])->name('vaksin.store');
Route::get('vaksin/show_delete/{id}',  [App\Http\Controllers\VaksinEmployeeController::class, 'showdelete'])->name('vaksin.show_delete');
Route::delete('vaksin/{id}/delete', [App\Http\Controllers\VaksinEmployeeController::class, 'destroy']);
Route::get('vaksin/{id}/edit', [App\Http\Controllers\VaksinEmployeeController::class, 'edit']);
Route::post('vaksin/{id}/update', [App\Http\Controllers\VaksinEmployeeController::class, 'update'])->name('vaksin.update');
Route::get('vaksin/{id}/detail', [App\Http\Controllers\VaksinEmployeeController::class, 'detail']);
Route::get('vaksin/{id}/delete_vaksin_kel', [App\Http\Controllers\VaksinEmployeeController::class, 'delete_vaksin_kel']);

Route::get('/report', [App\Http\Controllers\CovidController::class, 'index_report']);
Route::get('report/pdfcovid', [App\Http\Controllers\CovidController::class, 'pdfcovid'])->name('report.pdfcovid');
Route::get('report/pdfvaksin', [App\Http\Controllers\VaksinEmployeeController::class, 'pdfvaksin'])->name('report.pdfvaksin');

Route::get('/member', [App\Http\Controllers\EmployeeController::class, 'member'])->name('member');
