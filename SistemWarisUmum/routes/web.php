<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/informasi', function () {
    return view('informasi');
})->name('informasi');

// Pengajuan - GET: Menampilkan form
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');

// Pengajuan - POST: Proses form
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Halaman terima kasih
Route::get('/terima-kasih', [PengajuanController::class, 'showTerimaKasih'])->name('terima-kasih');

Route::get('/status-permohonan', [PengajuanController::class, 'cekStatus'])->name('status-permohonan');

// Alihkan ke SistemWarisCMS login dari Umum
Route::get('/logincms', function () {
    return redirect()->away('http://localhost/SistemWebWaris/SistemWarisCMS/public');
})->name('logincms');

// Unduh dokumen surat permohonan
Route::get('/download-surat-permohonan', function () {
    $path = base_path('..\\Dokumen_SuratPermohonan\\Form Permohonan Surat Keterangan Waris .docx');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->download($path, 'Form Permohonan Surat Keterangan Waris .docx', [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ]);
})->name('download.surat');
