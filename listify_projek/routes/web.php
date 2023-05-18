<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListifyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;
use App\Models\Listify;
use Carbon\Carbon;

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

Route::get('/', function () {
    $jumlahtugas = Listify::count();
    $jumlahtodolist = Listify::where('status','ToDo')->count();
    $jumlahdoinglist = Listify::where('status','Doing')->count();
    $jumlahdonelist = Listify::where('status','Done')->count();
    $data = Listify::get();
    $notif = Listify::where('deadline', 'LIKE', '%'.Carbon::now()->addDay()->format('Y-m-d').'%')->orWhere('deadline', 'LIKE', '%'.Carbon::now()->format('Y-m-d').'%')->get();    

    return view('welcome',compact('notif', 'jumlahtugas','jumlahtodolist','jumlahdoinglist','jumlahdonelist', 'data'));
})->name('home')->middleware('auth');

Route::get('landingpage', function(){
    return view('landingpage');
});

Route::get('/tugas',[ListifyController::class, 'index'])->name('tugas')->middleware('auth');

Route::get('/tambahtugas',[ListifyController::class, 'tambahtugas'])->name('tambahtugas');
Route::post('/insertdata',[ListifyController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[ListifyController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[ListifyController::class, 'updatedata'])->name('updatedata');
Route::post('/updatecalendar',[ListifyController::class, 'updatecalendar'])->name('updatecalendar');
Route::post('/deletecalendar',[ListifyController::class, 'deletecalendar'])->name('deletecalendar');


Route::get('/delete/{id}',[ListifyController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf',[ListifyController::class, 'exportpdf'])->name('exportpdf');


Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');


Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




Route::get('/datareligion',[ReligionController::class, 'index'])->name('datareligion')->middleware('auth');

Route::post('/insertdatareligion',[ReligionController::class, 'store'])->name('insertdatareligion');