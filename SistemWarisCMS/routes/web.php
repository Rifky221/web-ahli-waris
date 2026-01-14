<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\AhliWarisController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/security-code/refresh', [LoginController::class, 'refreshSecurityCode'])->name('security_code.refresh');

Route::get('/dashboard', function () {
    $total = DB::table('ahli_waris')->count();
    $diterima = DB::table('ahli_waris')->where('status', 'diterima')->count();
    $ditolak = DB::table('ahli_waris')->where('status', 'ditolak')->count();
    $tindakLanjut = DB::table('ahli_waris')->whereIn('status', ['menunggu', 'proses', 'tindak_lanjut'])->count();

    $recentItems = DB::table('ahli_waris')
        ->orderByDesc('created_at')
        ->limit(5)
        ->get();

    $stats = [
        'permohonan' => $total,
        'tindak_lanjut' => $tindakLanjut,
        'ditolak' => $ditolak,
        'diterima' => $diterima,
    ];
    return view('dashboard', compact('stats', 'recentItems'));
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::patch('/permohonan/{id}/status', [PermohonanController::class, 'updateStatus'])->name('permohonan.status');
    Route::delete('/permohonan/{id}', [PermohonanController::class, 'destroy'])->name('permohonan.destroy');
    Route::get('/permohonan/{id}/edit', [PermohonanController::class, 'edit'])->name('permohonan.edit');
    Route::put('/permohonan/{id}', [PermohonanController::class, 'update'])->name('permohonan.update');
    Route::get('/permohonan/create', [PermohonanController::class, 'create'])->name('permohonan.create');
    Route::get('/data-ahli-waris', [AhliWarisController::class, 'index'])->name('ahli-waris.index');
    Route::get('/data-ahli-waris/{id}/dokumen/{field}', [AhliWarisController::class, 'showDokumen'])->name('ahli-waris.dokumen');
});
