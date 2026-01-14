<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Permohonan | Sistem Ahli Waris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --dark-color: #1a1a2e;
            --light-color: #f8f9ff;
            --gray-color: #8b8c9c;
            --sidebar-width: 280px;
            --header-height: 80px;
            --border-radius: 16px;
            --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.08);
            --shadow-strong: 0 15px 50px rgba(67, 97, 238, 0.15);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--dark-color) 0%, #16213e 100%);
            color: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-medium);
            transition: var(--transition);
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding-bottom: 24px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .brand {
            font-weight: 800;
            font-size: 28px;
            letter-spacing: 1px;
            background: linear-gradient(90deg, var(--accent-color), #fff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand i {
            background: var(--primary-color);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 28px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            font-size: 15px;
            transition: var(--transition);
            position: relative;
        }
        
        .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(8px);
        }
        
        .nav-link.active {
            color: #fff;
            background: linear-gradient(90deg, rgba(67, 97, 238, 0.25), rgba(67, 97, 238, 0.1));
            border-left: 4px solid var(--primary-color);
        }
        
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: var(--primary-color);
            border-radius: 0 4px 4px 0;
        }
        
        .nav-icon {
            font-size: 20px;
            width: 24px;
            text-align: center;
        }
        
        .sidebar-footer {
            margin-top: auto;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }
        
        .content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100vw - 280px);
        }
        
        .main-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 16px 32px;
            height: var(--header-height);
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .header-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 24px;
            letter-spacing: -0.2px;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            background: rgba(67, 97, 238, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(67, 97, 238, 0.1);
        }
        
        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        
        .logout-btn {
            background: linear-gradient(135deg, var(--danger-color), #d90429);
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            cursor: pointer;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(239, 71, 111, 0.3);
        }
        
        .main-content {
            padding: 32px;
            flex: 1;
            overflow-y: auto;
            max-width: 100%;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .page-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 26px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
        }
        
        .card-form {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            border: 1px solid rgba(0, 0, 0, 0.03);
            padding: 24px 24px 28px;
        }
        
        .card-form-header {
            margin-bottom: 16px;
        }
        
        .card-form-header h5 {
            margin-bottom: 4px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .card-form-header p {
            margin-bottom: 0;
            color: var(--gray-color);
            font-size: 14px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px 12px;
            font-size: 14px;
        }
        
        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .form-text {
            font-size: 12px;
            color: var(--gray-color);
        }
        
        .alert-danger {
            border-radius: 12px;
        }
        
        .btn-outline-secondary {
            border-radius: 12px;
        }
        
        .menu-toggle {
            display: none;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 45px; width: auto; object-fit: contain;">
                <span>WARIS</span>
            </div>
            <div class="mt-2 text-muted" style="font-size: 13px; opacity: 0.7;">
                Sistem Manajemen Ahli Waris
            </div>
        </div>
        
        <nav class="flex-grow-1">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="bi bi-speedometer2 nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permohonan.index') }}" class="nav-link active">
                        <i class="bi bi-folder2-open nav-icon"></i>
                        <span>Permohonan Waris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ahli-waris.index') }}" class="nav-link">
                        <i class="bi bi-people nav-icon"></i>
                        <span>Data Ahli Waris</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="fw-medium" style="font-size: 14px;">Sistem Ahli Waris</div>
                    <small>Versi 1.0 • {{ date('Y') }}</small>
                </div>
                <div class="text-end">
                    <div class="badge bg-success bg-opacity-25 text-success px-3 py-1 rounded-pill">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Aktif
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <div class="content">
        <header class="main-header">
            <div class="d-flex align-items-center gap-4">
                <h1 class="header-title mb-0">Permohonan Waris</h1>
            </div>
            
            <div class="header-actions">
                <div class="user-profile">
                    <div class="user-avatar">AD</div>
                    <div>
                        <div class="fw-medium">Administrator</div>
                        <small class="text-muted">Admin Sistem</small>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="main-content">
            <div class="page-header">
                <div>
                    <h2 class="page-title">
                        <i class="bi bi-pencil-square text-primary"></i>
                        Edit Permohonan
                    </h2>
                    <p class="text-muted mb-0">Perbarui data permohonan waris yang dipilih</p>
                </div>
                <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-form">
                <div class="card-form-header">
                    <h5>Data Permohonan</h5>
                    <p>Pastikan informasi di bawah sudah benar sebelum disimpan.</p>
                </div>

                <form action="{{ route('permohonan.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik', $item->nik) }}" maxlength="16">
                            <div class="form-text">Harus 16 digit angka.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $item->nama_lengkap) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $item->nomor_telepon) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status Permohonan</label>
                            @php $status = old('status', $item->status); @endphp
                            <select id="status" name="status" class="form-select">
                                <option value="">Tidak diubah</option>
                                <option value="menunggu" {{ $status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="proses" {{ $status === 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="tindak_lanjut" {{ $status === 'tindak_lanjut' ? 'selected' : '' }}>Tindak Lanjut</option>
                                <option value="diterima" {{ $status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            <div class="form-text">Kosongkan jika tidak ingin mengubah status.</div>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3" class="form-control">{{ old('alamat', $item->alamat) }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="text-muted small">
                            Terakhir dibuat pada {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

