<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Sistem Ahli Waris</title>
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
            min-width: 220px;
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
        
        .user-info {
            flex: 1;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 15px;
            color: var(--dark-color);
        }
        
        .user-role {
            font-size: 13px;
            color: var(--gray-color);
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
            min-width: 120px;
            justify-content: center;
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
        
        /* Welcome Banner - Full Width */
        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: var(--border-radius);
            padding: 40px;
            color: white;
            margin-bottom: 32px;
            box-shadow: var(--shadow-strong);
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        
        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }
        
        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -150px;
            right: 50px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .welcome-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }
        
        .welcome-text {
            font-size: 17px;
            opacity: 0.9;
            max-width: 800px;
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }
        
        /* Stats Grid - Fixed Columns */
        .stats-container {
            margin-bottom: 40px;
        }
        
        .section-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 22px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            width: 100%;
        }
        
        .stat-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
            height: 180px;
            display: flex;
            flex-direction: column;
        }
        
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-strong);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--primary-color);
        }
        
        .stat-card.permohonan::before {
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .stat-card.tindak-lanjut::before {
            background: linear-gradient(90deg, var(--warning-color), #ff9e00);
        }
        
        .stat-card.ditolak::before {
            background: linear-gradient(90deg, var(--danger-color), #ff6b8b);
        }
        
        .stat-card.diterima::before {
            background: linear-gradient(90deg, var(--success-color), #06d6a0);
        }
        
        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        
        .permohonan .stat-icon {
            background: linear-gradient(135deg, var(--primary-light), #e0e7ff);
            color: var(--primary-color);
        }
        
        .tindak-lanjut .stat-icon {
            background: linear-gradient(135deg, rgba(255, 209, 102, 0.2), rgba(255, 209, 102, 0.1));
            color: #e6b400;
        }
        
        .ditolak .stat-icon {
            background: linear-gradient(135deg, rgba(239, 71, 111, 0.2), rgba(239, 71, 111, 0.1));
            color: var(--danger-color);
        }
        
        .diterima .stat-icon {
            background: linear-gradient(135deg, rgba(6, 214, 160, 0.2), rgba(6, 214, 160, 0.1));
            color: var(--success-color);
        }
        
        .stat-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .stat-value {
            font-size: 36px;
            font-weight: 800;
            color: var(--dark-color);
            line-height: 1;
            margin-bottom: 8px;
        }
        
        .stat-label {
            color: var(--gray-color);
            font-weight: 500;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .stat-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            margin-top: auto;
            color: var(--gray-color);
        }
        
        /* Activity Section - Fixed Width */
        .activity-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 32px;
            width: 100%;
        }
        
        .activity-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: var(--shadow-light);
            height: 500px;
            display: flex;
            flex-direction: column;
        }
        
        .recent-activity {
            flex: 1;
            overflow-y: auto;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .card-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 16px;
            border-radius: 12px;
            background: var(--light-color);
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: var(--transition);
        }
        
        .activity-item:hover {
            background: rgba(67, 97, 238, 0.03);
            transform: translateX(4px);
        }
        
        .activity-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 4px;
            font-size: 15px;
        }
        
        .activity-desc {
            color: var(--gray-color);
            font-size: 14px;
            margin-bottom: 6px;
        }
        
        .activity-time {
            color: var(--gray-color);
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .activity-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .badge-new {
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }
        
        .badge-process {
            background: rgba(255, 209, 102, 0.1);
            color: #e6b400;
        }
        
        .badge-completed {
            background: rgba(6, 214, 160, 0.1);
            color: var(--success-color);
        }
        
        /* Status Overview Card */
        .status-overview-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: var(--shadow-light);
            height: 500px;
            display: flex;
            flex-direction: column;
        }
        
        .status-list {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        
        .status-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .status-label {
            color: var(--gray-color);
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .status-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .status-bar {
            height: 8px;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 4px;
        }
        
        .status-fill {
            height: 100%;
            border-radius: 4px;
        }
        
        .fill-permohonan { width: 100%; background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); }
        .fill-tindak { width: 60%; background: linear-gradient(90deg, var(--warning-color), #ff9e00); }
        .fill-ditolak { width: 15%; background: linear-gradient(90deg, var(--danger-color), #ff6b8b); }
        .fill-diterima { width: 25%; background: linear-gradient(90deg, var(--success-color), #06d6a0); }
        
        /* Recent Data Table */
        .recent-data {
            margin-top: 40px;
        }
        
        .data-table {
            background: white;
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: var(--shadow-light);
            margin-top: 16px;
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .table-title {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 18px;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th {
            font-weight: 600;
            color: var(--gray-color);
            text-align: left;
            padding: 12px 16px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            font-size: 14px;
        }
        
        .table td {
            padding: 16px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: var(--dark-color);
            font-size: 14px;
        }
        
        .table tbody tr:hover {
            background: rgba(67, 97, 238, 0.03);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-process {
            background: rgba(255, 209, 102, 0.1);
            color: #e6b400;
        }
        
        .status-approved {
            background: rgba(6, 214, 160, 0.1);
            color: var(--success-color);
        }
        
        .status-rejected {
            background: rgba(239, 71, 111, 0.1);
            color: var(--danger-color);
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
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
        
        /* Hide Mobile Toggle */
        .menu-toggle {
            display: none;
        }
        
        /* Fixed Layout - No Media Queries for Mobile */
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
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="bi bi-speedometer2 nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('permohonan.index') ? route('permohonan.index') : '#' }}" class="nav-link">
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

    <!-- Main Content Area -->
    <div class="content">
        <!-- Fixed Header -->
        <header class="main-header">
            <div class="d-flex align-items-center gap-4">
                <h1 class="header-title mb-0">Dashboard Sistem</h1>
                <div class="text-muted" style="font-size: 15px;">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ date('d F Y') }}
                </div>
            </div>
            
            <div class="header-actions">
                <div class="user-profile">
                    <div class="user-avatar">AD</div>
                    <div class="user-info">
                        <div class="user-name">Administrator</div>
                        <div class="user-role">Super Admin</div>
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
            <!-- Welcome Banner -->
            <div class="welcome-banner fade-in">
                <div class="position-relative z-1">
                    <h2 class="welcome-title">Selamat Datang di Sistem Ahli Waris</h2>
                    <p class="welcome-text">
                        Dashboard ini memberikan gambaran lengkap tentang semua aktivitas sistem. Pantau statistik permohonan, 
                        tindak lanjuti proses verifikasi, dan kelola data ahli waris dengan mudah melalui panel yang tersedia.
                    </p>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="stats-container">
                <h3 class="section-title">
                    <i class="bi bi-graph-up text-primary"></i>
                    Ringkasan Statistik
                </h3>
                
                <div class="stats-grid">
                    <div class="stat-card permohonan fade-in delay-1">
                        <div class="stat-icon">
                            <i class="bi bi-folder-plus"></i>
                        </div>
                        <div class="stat-content">
                            <div>
                                <div class="stat-value">{{ $stats['permohonan'] ?? 0 }}</div>
                                <div class="stat-label">Total Permohonan</div>
                            </div>
                            <div class="stat-info">
                                <i class="bi bi-clock-history"></i>
                                <span>Data real-time</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card tindak-lanjut fade-in delay-2">
                        <div class="stat-icon">
                            <i class="bi bi-arrow-clockwise"></i>
                        </div>
                        <div class="stat-content">
                            <div>
                                <div class="stat-value">{{ $stats['tindak_lanjut'] ?? 0 }}</div>
                                <div class="stat-label">Dalam Proses</div>
                            </div>
                            <div class="stat-info">
                                <i class="bi bi-hourglass-split"></i>
                                <span>Menunggu verifikasi</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card ditolak fade-in delay-3">
                        <div class="stat-icon">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <div class="stat-content">
                            <div>
                                <div class="stat-value">{{ $stats['ditolak'] ?? 0 }}</div>
                                <div class="stat-label">Permohonan Ditolak</div>
                            </div>
                            <div class="stat-info">
                                <i class="bi bi-exclamation-circle"></i>
                                <span>Dokumen tidak lengkap</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card diterima fade-in delay-4">
                        <div class="stat-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <div>
                                <div class="stat-value">{{ $stats['diterima'] ?? 0 }}</div>
                                <div class="stat-label">Permohonan Diterima</div>
                            </div>
                            <div class="stat-info">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Proses selesai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity & Status Overview -->
            <div class="activity-container">
                
                <!-- Status Overview -->
                <div class="status-overview-card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="bi bi-pie-chart text-primary"></i>
                            Status Permohonan
                        </h4>
                    </div>
                    
                    <div class="status-list">
                        <div class="status-item">
                            <div class="status-label">
                                <span>Total Permohonan</span>
                                <span>{{ $stats['permohonan'] ?? 0 }}</span>
                            </div>
                            <div class="status-value">{{ $stats['permohonan'] ?? 0 }}</div>
                            <div class="status-bar">
                                <div class="status-fill fill-permohonan"></div>
                            </div>
                        </div>
                        
                        <div class="status-item">
                            <div class="status-label">
                                <span>Dalam Tindak Lanjut</span>
                                <span>{{ $stats['tindak_lanjut'] ?? 0 }}</span>
                            </div>
                            <div class="status-value">{{ $stats['tindak_lanjut'] ?? 0 }}</div>
                            <div class="status-bar">
                                <div class="status-fill fill-tindak"></div>
                            </div>
                        </div>
                        
                        <div class="status-item">
                            <div class="status-label">
                                <span>Permohonan Ditolak</span>
                                <span>{{ $stats['ditolak'] ?? 0 }}</span>
                            </div>
                            <div class="status-value">{{ $stats['ditolak'] ?? 0 }}</div>
                            <div class="status-bar">
                                <div class="status-fill fill-ditolak"></div>
                            </div>
                        </div>
                        
                        <div class="status-item">
                            <div class="status-label">
                                <span>Permohonan Diterima</span>
                                <span>{{ $stats['diterima'] ?? 0 }}</span>
                            </div>
                            <div class="status-value">{{ $stats['diterima'] ?? 0 }}</div>
                            <div class="status-bar">
                                <div class="status-fill fill-diterima"></div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted">Ringkasan:</span>
                                <span class="fw-medium">Total: {{ $stats['permohonan'] ?? 0 }} permohonan</span>
                            </div>
                            <div class="text-muted small">
                                <i class="bi bi-info-circle me-1"></i>
                                Data diperbarui secara real-time dari database
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Permohonan Table -->
            <div class="recent-data">
                <div class="table-header">
                    <h4 class="table-title">
                        <i class="bi bi-list-ul text-primary me-2"></i>
                        Permohonan Terbaru
                    </h4>
                    <a href="{{ Route::has('permohonan.index') ? route('permohonan.index') : '#' }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-eye me-1"></i>
                        Lihat Semua
                    </a>
                </div>
                
                <div class="data-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Permohonan</th>
                                    <th>Nama Pemohon</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($recentItems) && count($recentItems))
                                    @foreach($recentItems as $r)
                                        @php $st = $r->status ?? 'menunggu'; @endphp
                                        <tr>
                                            <td>{{ $r->nik ?? '-' }}</td>
                                            <td>{{ $r->nama_lengkap ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($r->created_at)->format('d M Y') }}</td>
                                            <td>
                                                @if($st === 'diterima')
                                                    <span class="status-badge status-approved">Disetujui</span>
                                                @elseif($st === 'ditolak')
                                                    <span class="status-badge status-rejected">Ditolak</span>
                                                @else
                                                    <span class="status-badge status-process">Dalam Proses</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-muted">Belum ada data terbaru.</td>
                                    </tr>
                                @endif
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
