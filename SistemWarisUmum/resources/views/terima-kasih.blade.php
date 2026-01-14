@extends('layouts.app')

@section('title', 'Terima Kasih - Pengajuan Ahli Waris')

@section('content')
<link rel="stylesheet" href="{{ asset('css/terima-kasih.css') }}">

<div class="container-main-terima-kasih">
    <div class="confirmation-wrapper">
        <!-- Icon Centang -->
        <div class="success-icon">
            <div class="icon-circle">
                <i class="fas fa-check"></i>
            </div>
        </div>

        <!-- Judul Utama -->
        <h2 class="main-title">Terima Kasih Atas Pengisian Form Persetujuan</h2>
        
        <!-- Pesan Konfirmasi -->
        <p class="confirmation-text">
            Formulir Anda telah berhasil dikirim dan sedang diproses
        </p>

        <!-- Kotak Informasi 1 -->
        <div class="info-box">
            <div class="info-header">
                <i class="fas fa-clock"></i>
                <h3>Silahkan Tunggu Proses Selanjutnya</h3>
            </div>
            <p class="info-text">
                Pengajuan Anda sedang diproses dan menunggu persetujuan
            </p>
            <div class="location-tag">
                <i class="fas fa-map-marker-alt"></i>
                <span>Wilayah Jakarta Selatan</span>
            </div>
        </div>

        <!-- Kotak Informasi 2 -->
        <div class="info-box process-box">
            <div class="info-header">
                <i class="fas fa-forward"></i>
                <h3>Proses Selanjutnya</h3>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="step-content">
                        <h4>Dokumen sedang diproses</h4>
                        <p>Dokumen sedang diproses oleh administrasi</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="step-content">
                        <h4>Menunggu persetujuan</h4>
                        <p>Menunggu persetujuan dari Wilayah Jakarta</p>
                    </div>
                </div>
                <div class="process-step">
                    <div class="step-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="step-content">
                        <h4>Pantau status</h4>
                        <p>Anda dapat memantau status pengajuan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Selesai -->
        <div class="action-buttons">
            <a href="{{ route('beranda') }}" class="btn-selesai">
                <i class="fas fa-check-circle"></i> Selesai
            </a>
        </div>

        <!-- Catatan Kaki -->
        <div class="footer-note">
            <p><i class="fas fa-info-circle"></i> Untuk informasi lebih lanjut, hubungi administrasi wilayah Jakarta Selatan</p>
        </div>
    </div>
</div>
@endsection