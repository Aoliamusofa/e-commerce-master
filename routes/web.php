<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ExpedisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatProdukController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananPelanggan;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'GetProduk']);
Route::get('/detailproduk/{id}', [HomeController::class, 'DetailProduk']);

Route::get('/login', [AuthController::class, 'LoginView']);
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/register', [AuthController::class, 'RegisterView']);
Route::post('/auth', [AuthController::class, 'LoginAuth']);
Route::post('/registerpost', [AuthController::class, 'RegisterPost']);

Route::get('/dashboard', [DashboardController::class, 'DataDashboard']);

Route::get('/home', [ClientController::class, 'HomeClient']);

Route::get('/kategori', [KatProdukController::class, 'GetAllKategori']);
Route::post('/addkategori', [KatProdukController::class, 'AddKategori']);
Route::post('/updtkategori', [KatProdukController::class, 'UpdateKategori']);
Route::get('/deletekategori/{id}', [KatProdukController::class, 'DeleteKategori']);


Route::get('/expedisi', [ExpedisiController::class, 'GetAllExpedisi']);
Route::post('/addekspedisi', [ExpedisiController::class, 'AddExpedisi']);
Route::post('/updateekspedisi', [ExpedisiController::class, 'UpdateExpedisi']);
Route::get('/deleteekspedisi/{id}', [ExpedisiController::class, 'DeleteExpedisi']);

Route::get('/payment', [PaymentController::class, 'GetAllPayment']);
Route::post('/addpayment', [PaymentController::class, 'AddPayment']);
Route::post('/updatepayment', [PaymentController::class, 'UpdatePayment']);
Route::get('/deletepayment/{id}', [PaymentController::class, 'DeletePayment']);

Route::get('/produk', [ProdukController::class, 'GetAllProduk']);
Route::post('/addproduk', [ProdukController::class, 'AddProduk']);
Route::post('/updateproduk', [ProdukController::class, 'UpdateProduk']);
Route::get('/deleteproduk/{id}', [ProdukController::class, 'DeleteProduk']);

Route::get('/detail/{id}', [ClientController::class, 'DetailSebelumCekout']);

Route::get('/pesanan', [PesananController::class, 'GetAllPesanan']);
Route::post('/addpesanan', [PesananController::class, 'AddPesanan'])->name('addpesanan');
Route::post('/updatepesanan', [PesananController::class, 'UpdatePesanan']);
Route::get('/deletepesanan/{id}', [PesananController::class, 'DeletePesanan']);

Route::get('/users', [UserController::class, 'GetAllUser']);
Route::post('/adduser', [UserController::class, 'AddUser']);
Route::post('/updateuser', [UserController::class, 'UpdateUser']);
Route::get('/deleteuser/{id}', [UserController::class, 'DeleteUser']);


// role client
Route::get('pesanansaya', [PesananPelanggan::class, 'GetPesananSaya']);
Route::post('uploadbukti', [PesananPelanggan::class, 'UploadBuktiPembayaran']);
