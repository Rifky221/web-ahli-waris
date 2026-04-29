<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\AhliWarisController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/security-code/refresh', [LoginController::class, 'refreshSecurityCode'])->name('security_code.refresh');

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $bulan = $request->input('bulan');
    $tahun = $request->input('tahun');
    $lastSeen = session('last_seen_permohonan_at');
    if (!$lastSeen) {
        $lastSeen = now();
        session(['last_seen_permohonan_at' => $lastSeen]);
    }

    $qTotal = DB::table('ahli_waris');
    if ($bulan) $qTotal->whereMonth('created_at', $bulan);
    if ($tahun) $qTotal->whereYear('created_at', $tahun);
    $total = $qTotal->count();

    $qDiterima = DB::table('ahli_waris')->where('status', 'diterima');
    if ($bulan) $qDiterima->whereMonth('created_at', $bulan);
    if ($tahun) $qDiterima->whereYear('created_at', $tahun);
    $diterima = $qDiterima->count();

    $qDitolak = DB::table('ahli_waris')->where('status', 'ditolak');
    if ($bulan) $qDitolak->whereMonth('created_at', $bulan);
    if ($tahun) $qDitolak->whereYear('created_at', $tahun);
    $ditolak = $qDitolak->count();

    $tindakLanjut = max(0, $total - $diterima - $ditolak);

    $recentItems = DB::table('ahli_waris')
        ->when($bulan, fn($q) => $q->whereMonth('created_at', $bulan))
        ->when($tahun, fn($q) => $q->whereYear('created_at', $tahun))
        ->orderByDesc('created_at')
        ->limit(5)
        ->get();

    $pendingCount = DB::table('ahli_waris')->whereNotIn('status', ['diterima', 'ditolak'])->count();

    $stats = [
        'permohonan' => $total,
        'tindak_lanjut' => $tindakLanjut,
        'ditolak' => $ditolak,
        'diterima' => $diterima,
    ];
    return view('dashboard', compact('stats', 'recentItems', 'pendingCount'));
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');
    Route::patch('/permohonan/{id}/status', [PermohonanController::class, 'updateStatus'])->name('permohonan.status');
    Route::delete('/permohonan/{id}', [PermohonanController::class, 'destroy'])->name('permohonan.destroy');
    Route::get('/permohonan/{id}/edit', [PermohonanController::class, 'edit'])->name('permohonan.edit');
    Route::put('/permohonan/{id}', [PermohonanController::class, 'update'])->name('permohonan.update');
    Route::get('/permohonan/create', [PermohonanController::class, 'create'])->name('permohonan.create');
    Route::get('/data-ahli-waris/export', [AhliWarisController::class, 'export'])->name('ahli-waris.export');
    Route::get('/data-ahli-waris', [AhliWarisController::class, 'index'])->name('ahli-waris.index');
    Route::get('/data-ahli-waris/{id}/dokumen/{field}', [AhliWarisController::class, 'showDokumen'])->name('ahli-waris.dokumen');
    
    Route::get('/permohonan/notifikasi', function () {
        session(['last_seen_permohonan_at' => now()]);
        return redirect()->to(route('ahli-waris.index') . '#data-ahli-waris');
    })->name('permohonan.notify');

    Route::resource('berita', BeritaController::class);
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
