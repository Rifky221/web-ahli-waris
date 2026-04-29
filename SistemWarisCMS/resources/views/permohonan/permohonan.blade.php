<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permohonan | Sistem Ahli Waris</title>
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
        .header-actions .user-profile {
            background: linear-gradient(135deg, rgba(67,97,238,0.08), rgba(76,201,240,0.08));
            border: 1px solid rgba(67,97,238,0.25);
            box-shadow: 0 10px 24px rgba(67,97,238,0.12);
            border-radius: 14px;
            padding: 6px 12px;
            backdrop-filter: saturate(120%) blur(6px);
        }
        .header-actions .user-name { font-weight: 700; color: var(--dark-color); }
        .header-actions .user-role { color: var(--gray-color); }
        
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
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }

        .user-avatar-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .logout-btn {
            background: linear-gradient(135deg, #ff3b55, #d90429);
            border: none;
            padding: 12px 20px;
            border-radius: 14px;
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            box-shadow: 0 10px 24px rgba(239, 71, 111, 0.25);
        }
        
        .logout-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 32px rgba(239, 71, 111, 0.35);
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
        .pagination-wrapper {
            padding: 24px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background: var(--light-color);
        }

        /* Override Bootstrap Pagination Layout */
        .pagination-wrapper nav > div.d-sm-flex {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 16px !important;
        }
        
        /* Hide redundant simple mobile pagination */
        .pagination-wrapper nav > div.d-sm-none {
            display: none !important;
        }

        .pagination-wrapper .small.text-muted {
            margin-bottom: 0 !important;
            text-align: center;
            font-size: 14px;
        }

        .pagination-wrapper .pagination {
            gap: 6px;
            margin-bottom: 0;
            justify-content: center !important;
            flex-wrap: wrap;
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
        
        .filter-toolbar {
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background: var(--light-color);
            padding: 16px 20px;
            animation: fadeSlide 0.3s var(--transition);
        }
        
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
        }
        
        .filter-fields {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            gap: 12px;
        }
        
        .filter-actions {
            margin-left: auto;
        }
        
        .filter-fields .search-input {
            flex: 1 1 360px;
            max-width: 520px;
            min-width: 320px;
        }
        
        .filter-toolbar .form-control::placeholder {
            opacity: 0.9;
        }
        
        @media (max-width: 768px) {
            .filter-fields {
                flex-wrap: wrap;
            }
            .filter-fields .search-input {
                min-width: 100%;
                max-width: 100%;
                flex: 1 1 100%;
            }
            .filter-actions {
                margin-left: 0;
                width: 100%;
                justify-content: flex-start;
            }
        }
        
        .filter-toolbar .input-group-text {
            background: rgba(67, 97, 238, 0.08);
            color: var(--primary-color);
            border: 1px solid rgba(67, 97, 238, 0.2);
        }
        
        .filter-toolbar .form-control,
        .filter-toolbar .form-select {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: var(--transition);
        }
        
        .filter-toolbar .form-control:focus,
        .filter-toolbar .form-select:focus {
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.15);
            border-color: rgba(67, 97, 238, 0.5);
            transform: translateY(-1px);
        }
        
        .filter-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-filter {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 8px 16px;
            transition: var(--transition);
        }
        
        .btn-filter:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 24px rgba(67, 97, 238, 0.35);
        }
        
        .btn-filter:hover .bi {
            transform: rotate(10deg);
        }
        
        .btn-reset {
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--dark-color);
            border-radius: 10px;
            padding: 8px 16px;
            transition: var(--transition);
        }
        
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        
        .notify-btn {
            position: relative;
            background: rgba(67, 97, 238, 0.08);
            border: 1px solid rgba(67, 97, 238, 0.2);
            padding: 10px 14px;
            border-radius: 12px;
            color: var(--primary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }
        .notify-btn:hover { transform: translateY(-2px); }
        .notify-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: var(--danger-color);
            color: #fff;
            border-radius: 12px;
            font-size: 12px;
            padding: 2px 6px;
            box-shadow: var(--shadow-light);
        }
        .notify-btn.active {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: #fff;
            border: none;
            box-shadow: 0 12px 28px rgba(67, 97, 238, 0.35);
            animation: notifyPulse 1.6s ease-in-out infinite;
        }
        .notify-btn.active .bi {
            animation: bellRing 1.4s ease-in-out infinite;
        }
        .notify-badge {
            background: linear-gradient(135deg, var(--danger-color), #ff6b8b);
            animation: badgeBounce 2s ease-in-out infinite;
        }
        @keyframes notifyPulse {
            0% { box-shadow: 0 0 0 0 rgba(67,97,238,0.35); }
            70% { box-shadow: 0 0 0 14px rgba(67,97,238,0); }
            100% { box-shadow: 0 0 0 0 rgba(67,97,238,0); }
        }
        @keyframes bellRing {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(12deg); }
            50% { transform: rotate(0deg); }
            75% { transform: rotate(-12deg); }
            100% { transform: rotate(0deg); }
        }
        @keyframes badgeBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-2px); }
        }
        
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: 100%;
                max-width: 280px;
                z-index: 1050;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
                display: none;
                backdrop-filter: blur(2px);
            }
            
            .sidebar-overlay.active {
                display: block;
            }
            
            .content {
                margin-left: 0;
                width: 100%;
            }
            
            .menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 24px;
                color: var(--dark-color);
                cursor: pointer;
                margin-right: 16px;
            }
            
            .main-header {
                padding: 16px;
                justify-content: space-between;
            }
            
            .main-header > .d-flex {
                flex: 1;
                gap: 12px !important;
                min-width: 0;
            }

            .header-title {
                font-size: 18px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .header-actions {
                gap: 8px;
                flex-shrink: 0;
            }

            .notify-btn {
                padding: 0;
                width: 40px;
                height: 40px;
                justify-content: center;
                border-radius: 10px;
            }

            .logout-btn {
                font-size: 0;
                padding: 0;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: unset;
                border-radius: 10px;
            }

            .logout-btn i {
                font-size: 18px;
                margin: 0;
            }
            
            .user-info {
                display: none;
            }
            
            .user-profile {
                min-width: auto;
                padding: 8px;
            }
            
            .main-content {
                padding: 16px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .filter-toolbar {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-toolbar .input-group {
                max-width: 100% !important;
                width: 100%;
            }

            .filter-actions {
                display: flex;
                gap: 10px;
                width: 100%;
            }
            
            .filter-actions .btn {
                flex: 1;
                justify-content: center;
            }
            
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
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
                <li class="nav-item">
                    <a href="{{ route('berita.index') }}" class="nav-link">
                        <i class="bi bi-newspaper nav-icon"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start border-0" style="cursor: pointer; background: linear-gradient(135deg, #ff3b55, #d90429); color: white;">
                            <i class="bi bi-box-arrow-right nav-icon" style="color: white;"></i>
                            <span>Logout</span>
                        </button>
                    </form>
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
            <button class="menu-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div class="d-flex align-items-center gap-4">
                <h1 class="header-title mb-0">Permohonan Waris</h1>
            </div>
            
            <div class="header-actions">
                <a href="{{ route('permohonan.notify') }}" class="notify-btn {{ (isset($pendingCount) && $pendingCount > 0) ? 'active' : '' }}" title="Permohonan belum diproses">
                    <i class="bi bi-bell"></i>
                    @if(isset($pendingCount) && $pendingCount > 0)
                        <span class="notify-badge">{{ $pendingCount }}</span>
                    @endif
                </a>
                <div class="user-profile" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer;">
                    @if(Auth::user() && Auth::user()->avatar)
                        <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar" class="user-avatar-img">
                    @else
                        <div class="user-avatar">{{ substr(Auth::user()->name ?? 'AD', 0, 2) }}</div>
                    @endif
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name ?? 'Administrator' }}</div>
                        <div class="user-role">Super Admin</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="page-title">
                        <i class="bi bi-folder2-open text-primary"></i>
                        Data Permohonan
                    </h2>
                    <p class="text-muted mb-0">Kelola semua permohonan waris yang masuk</p>
                </div>
                <a href="{{ Route::has('permohonan.create') ? route('permohonan.create') : '#' }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Permohonan
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table Card -->
            <div id="permohonan-terbaru" class="table-card">
                <div class="table-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Daftar Permohonan</h5>
                            <small class="text-muted">Total {{ $items->total() }} data permohonan</small>
                        </div>
                    </div>
                </div>
            
            <div class="filter-toolbar">
                @php $tahunSekarang = date('Y'); @endphp
                <form action="{{ route('permohonan.index') }}" method="GET" class="filter-form">
                    <div class="filter-fields">
                        <div class="input-group input-group-sm search-input">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" name="q" class="form-control" placeholder="Cari NIK atau No Telepon" value="{{ request('q') }}">
                        </div>
                        <div class="input-group input-group-sm" style="max-width: 220px;">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
                        </div>
                        <div class="input-group input-group-sm" style="max-width: 200px;">
                            <span class="input-group-text"><i class="bi bi-calendar2"></i></span>
                            <select name="bulan" class="form-select">
                                <option value="">Bulan</option>
                                @for ($b = 1; $b <= 12; $b++)
                                    <option value="{{ $b }}" {{ (string)$b === (string)request('bulan') ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($b)->locale('id')->isoFormat('MMMM') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="input-group input-group-sm" style="max-width: 160px;">
                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                            <select name="tahun" class="form-select">
                                <option value="">Tahun</option>
                                @for ($t = $tahunSekarang; $t >= $tahunSekarang - 10; $t--)
                                    <option value="{{ $t }}" {{ (string)$t === (string)request('tahun') ? 'selected' : '' }}>{{ $t }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-filter btn-sm">
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>
                        <a href="{{ route('permohonan.index') }}" class="btn btn-reset btn-sm">Reset</a>
                    </div>
                </form>
            </div>
            
                <div class="table-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama Pemohon</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Waktu Permohonan</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $i)
                                    <tr>
                                        <td>{{ ($items->currentPage()-1)*$items->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <div class="fw-medium">{{ $i->nik }}</div>
                                        </td>
                                        <td>
                                            <div class="fw-medium">{{ $i->nama_lengkap }}</div>
                                        </td>
                                        <td>
                                            <div class="text-muted">{{ $i->nomor_telepon }}</div>
                                        </td>
                                        <td style="max-width: 250px;">
                                            <div class="text-truncate" title="{{ $i->alamat }}">
                                                {{ $i->alamat }}
                                            </div>
                                        </td>
                                        <td>
                                            @php $st = $i->status; @endphp
                                            @if($st === 'diterima')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>
                                                    Diterima
                                                </span>
                                            @elseif($st === 'ditolak')
                                                <span class="badge bg-danger">
                                                    <i class="bi bi-x-circle me-1"></i>
                                                    Ditolak
                                                </span>
                                            @else
                                                <span class="badge bg-warning">
                                                    <i class="bi bi-clock me-1"></i>
                                                    Menunggu
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="fw-medium">{{ \Carbon\Carbon::parse($i->created_at)->format('d/m/Y') }}</div>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($i->created_at)->format('H:i') }}</small>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ Route::has('permohonan.edit') ? route('permohonan.edit', $i->id) : '#' }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ Route::has('permohonan.destroy') ? route('permohonan.destroy', $i->id) : '#' }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus permohonan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                @if($st !== 'diterima')
                                                    <form action="{{ Route::has('permohonan.status') ? route('permohonan.status', $i->id) : '#' }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="diterima">
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if($st !== 'ditolak')
                                                    <form action="{{ Route::has('permohonan.status') ? route('permohonan.status', $i->id) : '#' }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="ditolak">
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="empty-state">
                                                <i class="bi bi-folder-x"></i>
                                                <h5 class="text-muted mb-2">Belum ada data permohonan</h5>
                                                <p class="text-muted">Mulai dengan menambahkan permohonan baru</p>
                                                <a href="{{ Route::has('permohonan.create') ? route('permohonan.create') : '#' }}" class="btn btn-primary">
                                                    <i class="bi bi-plus-circle"></i>
                                                    Tambah Permohonan
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($items->hasPages())
                        <div class="pagination-wrapper">
                            {{ $items->links() }}
                        </div>
                    @endif
                </div>
            </div>

            
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.sidebar-overlay').classList.toggle('active');
        }
    </script>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Pilih Foto</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                            <div class="form-text">Format: JPG, PNG, JPEG. Maks: 2MB.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
