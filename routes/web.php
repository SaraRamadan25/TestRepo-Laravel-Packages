<?php

use App\Exports\UsersExport;
use App\Http\Controllers\BlogController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class,'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class,'create'])->name('blogs.create');
Route::post('/blogs', [BlogController::class,'store'])->name('blogs.store');
Route::get('/blogs/{blog}', [BlogController::class,'show'])->name('blogs.show');
Route::get('/blogs/{blog}/edit', [BlogController::class,'edit'])->name('blogs.edit');
Route::patch('/blogs/{blog}', [BlogController::class,'update'])->name('blogs.update');
Route::delete('/blogs/{blog}', [BlogController::class,'destroy'])->name('blogs.destroy');


Route::get('download', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});

Route::get('/invoice', function () {
     return view('invoice');

    $pdf = PDF::loadView('invoice');
    return $pdf->download('invoice.pdf');
});

Route::get('/invoice-pdf', function () {
     return view('invoice-pdf');

    $pdf = PDF::loadView('invoice-pdf');
    return $pdf->download('invoice.pdf');
});
