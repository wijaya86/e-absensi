<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionAuth;
use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Artisan;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth.session')->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class)->middleware('auth');
Route::resource('kehadiran', \App\Http\Controllers\KehadiranController::class)->middleware('auth');
Route::resource('siswa', \App\Http\Controllers\SiswaController::class)->middleware('auth');
Route::resource('absensi', \App\Http\Controllers\AbsensiController::class)->middleware('auth');
Route::resource('kelasi', \App\Http\Controllers\KelasiController::class)->middleware('auth');
Route::resource('walikel', \App\Http\Controllers\WalikelController::class)->middleware('auth');
Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('rekap', \App\Http\Controllers\RekapController::class)->middleware('auth');
Route::resource('manual', \App\Http\Controllers\ManualController::class)->middleware('auth');
Route::resource('import', \App\Http\Controllers\SiswaImportController::class)->middleware('auth');
Route::resource('import1', \App\Http\Controllers\WalikelImportController::class)->middleware('auth');
Route::resource('card', \App\Http\Controllers\CardController::class)->middleware('auth');
Route::resource('chart', \App\Http\Controllers\GrafikController::class)->middleware('auth');
Route::resource('rekapkehadiran', \App\Http\Controllers\RekapkehadiranController::class)->middleware('auth');

Route::get('/backup-sekarang', function () {
    $db   = env('DB_DATABASE');
    $user = env('DB_USERNAME');
    $pass = env('DB_PASSWORD');
    $host = env('DB_HOST', '127.0.0.1');

    $fileName = $db . '_backup_' . date('Y-m-d_H-i-s') . '.sql';

    $command = "mysqldump -h {$host} -u {$user}";
    if (!empty($pass)) {
        $command .= " -p\"{$pass}\"";
    }
    $command .= " {$db}";

    $dumpOutput = shell_exec($command);

    if (!$dumpOutput) {
        return "❌ Gagal membuat backup, cek konfigurasi database.";
    }

    return Response::make($dumpOutput, 200, [
        'Content-Type' => 'application/sql',
        'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
    ]);
});
