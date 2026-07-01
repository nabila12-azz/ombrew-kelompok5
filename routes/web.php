<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Admin\DashboardController;
use App\Http\Admin\UserController;
use App\Http\Admin\PesananController;
use App\Http\Admin\MenuAdminController; // ← alias untuk hindari konflik
use App\Http\Admin\LaporanController;
use App\Http\Admin\PengaturanController;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
Route::middleware('guest')->group(function () {
    Route::get('/login',     [LoginController::class,    'showLogin'])->name('login');
    Route::post('/login',    [LoginController::class,    'login']);
    Route::get('/register',  [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// FRONTEND ROUTES
Route::get('/',          [HomeController::class,    'index'])->name('home');
Route::get('/menu',      [MenuController::class,    'index'])->name('menu');
Route::get('/about',     [HomeController::class,    'about'])->name('about');
Route::get('/contact',   [ContactController::class, 'index'])->name('contact');
Route::post('/contact',  [ContactController::class, 'send'])->name('contact.send');
Route::post('/order',    [OrderController::class,   'store'])->name('order.store');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::patch('pesanan/{order}/status', [PesananController::class, 'updateStatus'])->name('pesanan.status');
    Route::delete('pesanan/{order}',       [PesananController::class, 'destroy'])->name('pesanan.destroy');
    Route::resource('menu', MenuAdminController::class); // ← sekarang resolved dengan benar
    Route::get('laporan',    [LaporanController::class,    'index'])->name('laporan.index');
    Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
    Route::post('pengaturan',[PengaturanController::class, 'update'])->name('pengaturan.update');
});