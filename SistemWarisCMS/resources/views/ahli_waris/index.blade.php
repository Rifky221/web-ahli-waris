<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Ahli Waris | Sistem Ahli Waris</title>
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
        
        /* Sidebar Fixed Width */
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
        
        /* Main Content Area - Full Width */
        .content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100vw - 280px);
        }
        
        /* Fixed Header */
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
        
        /* Main Content with Fixed Layout */
        .main-content {
            padding: 32px;
            flex: 1;
            overflow-y: auto;
            max-width: 100%;
        }
        
        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        
        .page-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 28px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
        }
        
        /* Alert Styling */
        .alert-success {
            background: linear-gradient(135deg, rgba(6, 214, 160, 0.1), rgba(6, 214, 160, 0.05));
            border: 1px solid rgba(6, 214, 160, 0.2);
            color: var(--success-color);
            border-radius: var(--border-radius);
            padding: 16px 20px;
            margin-bottom: 24px;
        }
        
        /* Table Card */
        .table-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 0;
            box-shadow: var(--shadow-light);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .table-card-header {
            padding: 24px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            background: var(--light-color);
        }
        
        .table-card-body {
            padding: 0;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }
        
        .table thead th {
            background: var(--light-color);
            color: var(--gray-color);
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: var(--dark-color);
            font-size: 14px;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background: rgba(67, 97, 238, 0.03);
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Badge Styling */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .bg-success {
            background: linear-gradient(135deg, var(--success-color), #05b384) !important;
        }
        
        .bg-danger {
            background: linear-gradient(135deg, var(--danger-color), #d91e53) !important;
        }
        
        .bg-warning {
            background: linear-gradient(135deg, var(--warning-color), #ffb938) !important;
        }
        
        .bg-info {
            background: linear-gradient(135deg, var(--accent-color), #4361ee) !important;
        }
        
        /* Button Group Styling */
        .btn-group-vertical {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .btn-sm {
            padding: 8px 16px;
            font-size: 13px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color), #ffb938);
            border: none;
            color: #000;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 209, 102, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #d91e53);
            border: none;
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(239, 71, 111, 0.3);
        }
        
        .btn-outline-danger {
            border: 2px solid var(--danger-color);
            color: var(--danger-color);
            background: transparent;
        }
        
        .btn-outline-danger:hover {
            background: var(--danger-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(239, 71, 111, 0.3);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #05b384);
            border: none;
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(6, 214, 160, 0.3);
        }
        
        /* Pagination Styling */
        .pagination {
            display: flex;
            gap: 8px;
            padding: 24px;
            justify-content: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background: var(--light-color);
        }
        
        .page-link {
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--gray-color);
            font-weight: 500;
            transition: var(--transition);
        }
        
        .page-link:hover {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            border-color: rgba(67, 97, 238, 0.2);
        }
        
        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-color: var(--primary-color);
            color: white;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: var(--gray-color);
        }
        
        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.3;
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(67, 97, 238, 0.3);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(67, 97, 238, 0.5);
        }
        
        /* Hide Mobile Toggle */
        .menu-toggle {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Sidebar Fixed -->
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
                    <a href="{{ route('permohonan.index') }}" class="nav-link">
                        <i class="bi bi-folder2-open nav-icon"></i>
                        <span>Permohonan Waris</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ahli-waris.index') }}" class="nav-link active">
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

    <!-- Main Content Area -->
    <div class="content">
        <!-- Fixed Header -->
        <header class="main-header">
            <div class="d-flex align-items-center gap-4">
                <h1 class="header-title mb-0">Data Ahli Waris</h1>
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

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="page-title">
                        <i class="bi bi-people text-primary"></i>
                        Data Ahli Waris
                    </h2>
                    <p class="text-muted mb-0">Daftar semua data ahli waris yang terdaftar dalam sistem</p>
                </div>
            </div>

            <!-- Table Card -->
            <div class="table-card">
                <div class="table-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Daftar Ahli Waris</h5>
                            <small class="text-muted">Total {{ count($ahliWaris) }} data</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-download"></i>
                                Export Data
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="table-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Dokumen</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ahliWaris as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="fw-medium">{{ $item->nik }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-medium">{{ $item->nama_lengkap }}</div>
                                        </td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            @if($item->status == '1' || $item->status == 'diterima')
                                                <span class="badge bg-success">Diterima</span>
                                            @elseif($item->status == '2' || $item->status == 'ditolak')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @else
                                                <span class="badge bg-warning">Proses</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $exts = ['pdf','doc','docx','xls','xlsx','jpg','jpeg','png','gif','webp'];
                                                $docs = [];
                                                foreach ((array)$item as $k => $v) {
                                                    if (is_string($v)) {
                                                        $e = strtolower(pathinfo($v, PATHINFO_EXTENSION));
                                                        if (in_array($e, $exts)) { $docs[$k] = $v; }
                                                    }
                                                }
                                                $mid = 'docsModal_'.$item->id ?? 'docsModal_'.$loop->iteration;
                                            @endphp
                                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $mid }}">
                                                <i class="bi bi-paperclip"></i> Lihat
                                            </button>
                                            <div class="modal fade" id="{{ $mid }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Dokumen Terunggah</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if(count($docs))
                                                                <div class="list-group">
                                                                @foreach($docs as $key => $val)
                                                                        @php
                                                                            $isUrl = \Illuminate\Support\Str::startsWith($val, ['http://','https://']);
                                                                            $url = $isUrl ? $val : route('ahli-waris.dokumen', ['id' => $item->id, 'field' => $key]);
                                                                            $ext = strtolower(pathinfo($val, PATHINFO_EXTENSION));
                                                                            $icon = 'file-earmark';
                                                                            if(in_array($ext,['pdf'])) $icon = 'file-earmark-pdf';
                                                                            elseif(in_array($ext,['doc','docx'])) $icon = 'file-earmark-word';
                                                                            elseif(in_array($ext,['xls','xlsx'])) $icon = 'file-earmark-spreadsheet';
                                                                            elseif(in_array($ext,['jpg','jpeg','png','gif','webp'])) $icon = 'file-earmark-image';
                                                                        @endphp
                                                                        <a href="{{ $url }}" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                                                                            <div class="d-flex align-items-center gap-3">
                                                                                <i class="bi bi-{{ $icon }} text-primary" style="font-size: 20px;"></i>
                                                                                <div>
                                                                                    <div class="fw-medium text-capitalize">{{ str_replace('_',' ', $key) }}</div>
                                                                                    <small class="text-muted">{{ $val }}</small>
                                                                                </div>
                                                                            </div>
                                                                            <i class="bi bi-box-arrow-up-right"></i>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div class="text-center text-muted py-4">
                                                                    <i class="bi bi-inbox" style="font-size: 32px;"></i>
                                                                    <div class="mt-2">Tidak ada dokumen terdeteksi</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="empty-state">
                                                <i class="bi bi-inbox"></i>
                                                <h5>Belum ada data</h5>
                                                <p>Data ahli waris belum tersedia saat ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
