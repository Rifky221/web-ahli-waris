@extends('layouts.app')

@section('title', ' Pengajuan Ahli Waris')

@section('content')

<div class="container-ahli-waris">
    <!-- Header -->
    <header class="header-ahli-waris">
        <h1>Ahli Waris</h1>
        <div class="status-check">
            <h2>Cek Status Permohonan Anda :</h2>
            <div class="status-inputs">
                <div class="input-group">
                    <label for="cek_nik">Masukkan NIK</label>
                    <input type="text" id="cek_nik" placeholder="Nomor Induk Kependudukan">
                </div>
                <div class="input-group">
                    <button type="button" id="btnCekStatus" class="btn-modern">
                        <i class="fas fa-search"></i>
                        <span class="btn-label">Cek Status</span>
                        <span class="spinner" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div id="statusResult" class="alert" style="display:none;margin-top:15px;"></div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content-ahli-waris">
        <div class="title-section">
            <h2>AHLI WARIS</h2>
            <p>Sistem pendaftaran ahli waris</p>
        </div>

        <!-- Download Form Section -->
        <div class="card-ahli-waris mb-4">
            <div class="card-header-ahli-waris green">
                <h3><i class="fas fa-download"></i> Download Form Permohonan</h3>
            </div>
            <div class="card-body-ahli-waris">
                <p>Sebelum mengajukan permohonan, silakan download dan isi form permohonan surat keterangan waris terlebih dahulu.</p>
                <a href="{{ route('download.surat') }}" class="btn btn-success">
                    <i class="fas fa-file-download"></i> Download Form Permohonan
                </a>
            </div>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning" style="background-color: #fff3cd; color: #856404; border-color: #ffeeba;">
            <i class="fas fa-exclamation-circle"></i> {{ session('warning') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i> Mohon perbaiki kesalahan berikut:
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" id="formAhliWaris">
    @csrf
    


            <!-- Informasi Pribadi -->
            <div class="card-ahli-waris">
                <div class="card-header-ahli-waris blue">
                    <h3>Informasi Pribadi</h3>
                </div>
                <div class="card-body-ahli-waris">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nik">NIK *</label>
                            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                                placeholder="Masukkan NIK" required maxlength="16" pattern="\d{16}">
                            <small class="form-text">Harus 16 digit angka</small>
                            @error('nik')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap *</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" required>
                            @error('nama_lengkap')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon *</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon"
                                value="{{ old('nomor_telepon') }}" placeholder="Contoh: 081234567890" required>
                            @error('nomor_telepon')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat *</label>
                            <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dokumen yang Diperlukan -->
            <div class="card-ahli-waris">
                <div class="card-header-ahli-waris red">
                    <h3>Dokumen yang Diperlukan</h3>
                    <p class="subtitle">Upload dokumen dengan format PDF, JPG, JPEG, PNG, atau WEBP. Maksimal 5MB per file.</p>
                    <p class="note"><i class="fas fa-exclamation-circle"></i> Catatan: Dokumen dengan tanda * wajib diunggah.</p>
                </div>
                <div class="card-body-ahli-waris">
                    @php
                    $dokumen = [
                    [
                    'name' => 'surat_pengantar_rt_rw',
                    'label' => '1. Surat Pengantar RT/RW *',
                    'required' => true,
                    'description' => 'Surat pengantar yang telah ditandatangani oleh Ketua RT dan RW setempat.'
                    ],
                    [
                    'name' => 'surat_pernyataan_ahli_waris',
                    'label' => '2. Surat Pernyataan Ahli Waris *',
                    'required' => true,
                    'description' => 'Surat pernyataan dari ahli waris yang ditandatangani oleh Permohon, 2 orang saksi, dan RT/RW setempat.'
                    ],
                    [
                    'name' => 'foto_bukti_penandatanganan',
                    'label' => '3. Foto Bukti Penandatanganan *',
                    'required' => true,
                    'description' => 'Foto sebagai bukti penandatanganan Surat Pernyataan Ahli Waris.'
                    ],
                    [
                    'name' => 'surat_keterangan_kematian',
                    'label' => '4. Surat Keterangan Kematian *',
                    'required' => true,
                    'description' => 'Surat keterangan kematian dari pihak berwenang.'
                    ],
                    [
                    'name' => 'surat_buku_nikah',
                    'label' => '5. Surat/Buku Nikah *',
                    'required' => true,
                    'description' => 'Surat atau buku nikah yang sah.'
                    ],
                    [
                    'name' => 'ktp_kk_penerima_manfaat',
                    'label' => '6. KTP & KK Penerima Manfaat *',
                    'required' => true,
                    'description' => 'KTP dan Kartu Keluarga penerima manfaat.'
                    ],
                    [
                    'name' => 'akta_kelahiran_ijazah',
                    'label' => '7. Akta Kelahiran/Ijazah Ahli Waris *',
                    'required' => true,
                    'description' => 'Akta kelahiran atau ijazah ahli waris.'
                    ],
                    [
                    'name' => 'surat_nikah_ahli_waris',
                    'label' => '8. Surat Nikah Ahli Waris *',
                    'required' => true,
                    'description' => 'Surat nikah ahli waris (jika sudah menikah).'
                    ],
                    [
                    'name' => 'akta_perceraian',
                    'label' => '9. Akta Perceraian',
                    'required' => false,
                    'description' => 'Akta perceraian (jika pernah bercerai).'
                    ],
                    [
                    'name' => 'akta_kematian_ahli_waris',
                    'label' => '10. Akta Kematian Ahli Waris *',
                    'required' => true,
                    'description' => 'Akta kematian ahli waris (jika ada).'
                    ],
                    [
                    'name' => 'ktp_keluarga_ahli_waris',
                    'label' => '11. KTP Suami/Istri/Anak Ahli Waris *',
                    'required' => true,
                    'description' => 'KTP anggota keluarga ahli waris.'
                    ],
                    [
                    'name' => 'surat_pernyataan_keabsahan',
                    'label' => '12. Surat Pernyataan Keabsahan Dokumen *',
                    'required' => true,
                    'description' => 'Surat pernyataan keabsahan dokumen.'
                    ],
                    [
                    'name' => 'surat_kuasa',
                    'label' => '13. Surat Kuasa *',
                    'required' => true,
                    'description' => 'Surat kuasa (jika dikuasakan).'
                    ]
                    ];
                    @endphp

                    @foreach($dokumen as $doc)
                    <div class="document-item">
                        <div class="doc-content">
                            <h4>{{ $doc['label'] }}</h4>
                            <p>{{ $doc['description'] }}</p>
                            <div class="upload-area">
                                <input type="file"
                                    id="{{ $doc['name'] }}"
                                    name="{{ $doc['name'] }}"
                                    class="file-input"
                                    {{ $doc['required'] ? 'required' : '' }}
                                    accept=".pdf,.jpg,.jpeg,.png,.webp">
                                <label for="{{ $doc['name'] }}" class="upload-btn">
                                    <i class="fas fa-cloud-upload-alt"></i> Pilih File
                                </label>
                                <span class="file-info" id="{{ $doc['name'] }}_info">Belum ada file dipilih</span>
                                @error($doc['name'])
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons d-flex gap-3 justify-content-center">
                <a href="{{ route('beranda') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <!-- ... form fields ... -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Kirim Permohonan
                </button>
            </div>
        </form>
    </main>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle file input change
        const fileInputs = document.querySelectorAll('.file-input');

        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const fileInfo = document.getElementById(this.id + '_info');
                const uploadArea = this.closest('.upload-area');
                const uploadBtn = uploadArea.querySelector('.upload-btn');
                const originalBtnText = '<i class="fas fa-cloud-upload-alt"></i> Pilih File';

                // Reset classes and styles
                uploadArea.classList.remove('has-file', 'error');
                fileInfo.style.color = '';
                fileInfo.style.fontWeight = '';

                if (this.files && this.files[0]) {
                    const fileName = this.files[0].name;
                    const fileSize = (this.files[0].size / 1024 / 1024).toFixed(2);

                    // Validate file size (5MB max)
                    if (this.files[0].size > 5 * 1024 * 1024) {
                        fileInfo.innerHTML = `<i class="fas fa-exclamation-triangle"></i> File terlalu besar (maks 5MB)`;
                        uploadArea.classList.add('error');
                        this.value = '';
                        uploadBtn.innerHTML = originalBtnText;
                        return;
                    }

                    // Validate file type
                    const allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png|\.webp)$/i;
                    if (!allowedExtensions.exec(fileName)) {
                        fileInfo.innerHTML = `<i class="fas fa-exclamation-triangle"></i> Format tidak didukung (PDF, JPG, PNG, WEBP)`;
                        uploadArea.classList.add('error');
                        this.value = '';
                        uploadBtn.innerHTML = originalBtnText;
                        return;
                    }

                    fileInfo.innerHTML = `<i class="fas fa-check-circle"></i> ${fileName} (${fileSize} MB)`;
                    uploadArea.classList.add('has-file');
                    uploadBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Ganti File';
                } else {
                    fileInfo.textContent = 'Belum ada file dipilih';
                    uploadBtn.innerHTML = originalBtnText;
                }
            });
        });

        // NIK validation
        const nikInput = document.getElementById('nik');
        if (nikInput) {
            nikInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 16);
            });
        }

        // Phone number validation
        const phoneInput = document.getElementById('nomor_telepon');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '');
            });
        }
    });
</script>
@endpush
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('btnCekStatus');
    var input = document.getElementById('cek_nik');
    var box = document.getElementById('statusResult');
    if (btn && input && box) {
        btn.addEventListener('click', async function() {
            var nik = (input.value || '').trim();
            btn.classList.add('loading');
            btn.setAttribute('disabled', 'disabled');
            if (!nik) {
                box.className = 'alert alert-warning';
                box.textContent = 'NIK tidak ada';
                box.style.display = 'block';
                btn.classList.remove('loading');
                btn.removeAttribute('disabled');
                return;
            }
            var url = '{{ route('status-permohonan') }}' + '?nik=' + encodeURIComponent(nik);
            try {
                var res = await fetch(url, { headers: { 'Accept': 'application/json' } });
                var data = await res.json();
                var cls = 'alert ';
                if (data.status === 'diterima') cls += 'alert-success';
                else if (data.status === 'ditolak') cls += 'alert-danger';
                else if (data.status === 'proses') cls += 'alert-info';
                else cls += 'alert-warning';
                box.className = cls;
                box.textContent = data.message || '';
                box.style.display = 'block';
            } catch (e) {
                box.className = 'alert alert-danger';
                box.textContent = 'Terjadi kesalahan';
                box.style.display = 'block';
            }
            btn.classList.remove('loading');
            btn.removeAttribute('disabled');
        });
    }
});
</script>
@endpush
@endsection
