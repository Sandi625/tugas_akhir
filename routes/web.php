<?php

use App\Http\Controllers\admin1Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Models\Products;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\DasborController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TampilController;
use App\Http\Controllers\TransferController;

use App\Http\Controllers\BCAController;
use App\Http\Controllers\BNIController;
use App\Http\Controllers\BRIController;
use App\Http\Controllers\BuktiTFCstmr;
use App\Http\Controllers\PesananController;

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

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/dashboard', [DasborController::class, 'tampilkanDasbor'])->middleware('userAkses:marketing');

// Route::get('/dabor', [DasborController::class, 'tampilkanDasbor'])->middleware('auth');

Route::get('/login2',[LoginController::class, 'login'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


// Route::get('/home', [HomeController::class,'index'])->name('index');

Route::get('/hello', [HomeController::class,'abc'])->name('home');

Route::get('/biodata', [HomeController::class,'biodata'])->name('home');

Route::get('/admin', [adminController::class,'admin'])->name('admin');

Route::get('/anime', [adminController::class, 'anime'])->name('anime');

Route::get('/postlogin', [loginController::class, 'halamanlogin'])->name('halamanlogin');

Route::post('/postlogin', [loginController::class, 'postlogin'])->name('postlogin');

// Route::get('/registrasi', [loginController::class, 'registrasi'])->name('registrasi');


Route::get('/pesanbarang', [EmployeeController::class, 'index'])->name('pegawai');

Route::get('/tambahbarang', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');




Route::get('/produk', [ProductsController::class, 'products'])->name('products')->middleware('auth');

Route::get('/tambahproduk', [ProductsController::class, 'tambahproduk'])->name('tambahproduk')->middleware('auth');

Route::post('/insertproduk', [ProductsController::class, 'insertproduk'])->name('insertproduk');

Route::get('/tampilproduk/{id}', [ProductsController::class, 'tampilproduk'])->name('tampilproduk')->middleware('auth');

Route::post('/updateproduk/{id}', [ProductsController::class, 'updateproduk'])->name('updateproduk');

Route::get('/deleteproduk/{id}', [ProductsController::class, 'deleteproduk'])->name('deleteproduk')->middleware('auth');


Route::get('/pencarian', [ProductsController::class, 'cari'])->name('cari')->middleware('auth');



Route::get('/login3',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register',[loginController::class, 'register'])->name('register');
Route::post('/registeruser',[loginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[loginController::class, 'logout'])->name('logout');

Route::get('/charts',[ChartController::class, 'chart'])->name('chart')->middleware('auth');



Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class, 'index'])->name('login');

Route::post('/',[SesiController::class, 'login']);

});
Route::get('/home',function(){
return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[admin1Controller::class, 'index']);
    Route::get('/logout',[SesiController::class,'logout']);
    Route::get('/admin/operator',[admin1Controller::class, 'operator'])->middleware('userAkses:operator');
    Route::get('/admin/keuangan',[admin1Controller::class, 'keuangan'])->middleware('userAkses:keuangan');
    Route::get('/admin/marketing',[admin1Controller::class, 'marketing'])->middleware('userAkses:marketing');


});



Route::get('/tampil', [TampilController::class, 'index'])->name('tampil.index');

Route::get('/transfer',[TransferController::class,'index'])->name('index');

Route::get('/bca',[BCAController::class,'index'])->name('index');
Route::get('/bni',[BNIController::class,'index'])->name('index');
Route::get('/bri',[BRIController::class,'index'])->name('index');
Route::post('/upload', [TransferController::class, 'store'])->name('upload.store');

Route::post('/transfer', [TransferController::class, 'store'])->name('transfer.store');




Route::get('/buktiTF', [BuktiTFCstmr::class, 'index'])->name('buktiTF.index');



Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');












//  Route::group(['middleware' => ['auth']], function () {
//      Route::get('/home', [HomeController::class,''])->name('home');
//  });










