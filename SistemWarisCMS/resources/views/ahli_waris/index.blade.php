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
            padding: 8px 12px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
        }

        .user-profile:hover {
            background: var(--light-color);
        }
        
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 600; font-size: 14px;
        }

        .user-avatar-img {
            width: 36px; height: 36px; border-radius: 50%;
            object-fit: cover; border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 12px;
            color: var(--gray-color);
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
            cursor: pointer;
            box-shadow: 0 10px 24px rgba(239, 71, 111, 0.25);
        }
        
        .logout-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 32px rgba(239, 71, 111, 0.35);
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
            background: linear-gradient(135deg, var(--danger-color), #ff6b8b);
            color: #fff;
            border-radius: 12px;
            font-size: 12px;
            padding: 2px 6px;
            box-shadow: var(--shadow-light);
            animation: badgeBounce 2s ease-in-out infinite;
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
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.08), rgba(76, 201, 240, 0.08));
        }
        .table thead th.sticky {
            position: sticky;
            top: 0;
            z-index: 2;
        }
        .table thead th {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.06), rgba(76, 201, 240, 0.06));
            border-bottom: 2px solid rgba(67, 97, 238, 0.18);
        }
        .table tbody tr:nth-child(odd) {
            background: rgba(67, 97, 238, 0.025);
        }
        .table tbody tr:nth-child(even) {
            background: rgba(76, 201, 240, 0.02);
        }
        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.08), rgba(76, 201, 240, 0.06));
            box-shadow: inset 0 -1px 0 rgba(67, 97, 238, 0.15);
        }
        .row-pending {
            background: linear-gradient(90deg, rgba(255, 209, 102, 0.22), rgba(255, 209, 102, 0.1));
            box-shadow: inset 4px 0 0 #ffb938;
        }
        .row-pending:hover {
            background: linear-gradient(90deg, rgba(255, 209, 102, 0.32), rgba(255, 209, 102, 0.16));
        }
        .row-accepted:hover { background: rgba(6, 214, 160, 0.08); }
        .row-rejected:hover { background: rgba(239, 71, 111, 0.08); }
        .status-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }
        .chip-pending { background: linear-gradient(135deg, rgba(255, 209, 102, 0.35), rgba(255, 209, 102, 0.15)); color: #b07900; }
        .chip-accepted { background: linear-gradient(135deg, rgba(6, 214, 160, 0.35), rgba(6, 214, 160, 0.15)); color: #0a9f77; }
        .chip-rejected { background: linear-gradient(135deg, rgba(239, 71, 111, 0.35), rgba(239, 71, 111, 0.15)); color: #b3123a; }
        
        .filter-toolbar {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .filter-toolbar .input-group-text {
            background: rgba(67, 97, 238, 0.08);
            color: var(--primary-color);
            border: 1px solid rgba(67, 97, 238, 0.2);
        }
        .filter-toolbar .form-select, .filter-toolbar .form-control {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: var(--transition);
        }
        .filter-toolbar .form-select:focus, .filter-toolbar .form-control:focus {
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.15);
            border-color: rgba(67, 97, 238, 0.5);
            transform: translateY(-1px);
        }
        .btn-filter {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 8px 16px;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 6px;
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

            /* Logout Button Mobile */
            .logout-btn span {
                display: none;
            }
            .logout-btn {
                min-width: auto;
                padding: 8px 12px;
            }
            .logout-btn i {
                margin-right: 0;
                font-size: 1.2rem;
            }
            
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1040;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s;
                backdrop-filter: blur(4px);
            }
            
            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
            
            .content {
                margin-left: 0;
                width: 100%;
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
            
            .menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 24px;
                color: var(--dark-color);
                cursor: pointer;
                padding: 0;
                margin-right: 12px;
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

            .user-info {
                display: none;
            }
            
            .user-profile {
                min-width: auto;
                padding: 8px;
            }
        }

        @media (max-width: 768px) {
            .table-card-header .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 16px;
            }
            
            .filter-toolbar {
                width: 100%;
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .filter-toolbar .input-group {
                max-width: 100% !important;
                width: 100%;
                flex: 1 1 100%;
            }

            .filter-toolbar .btn {
                flex: 1;
                justify-content: center;
            }

            .table-card-header > .d-flex > div:first-child {
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px dashed rgba(0,0,0,0.1);
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
                <h1 class="header-title mb-0">Data Ahli Waris</h1>
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
                        <div class="user-role">Admin Sistem</div>
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
                        <i class="bi bi-people text-primary"></i>
                        Data Ahli Waris
                    </h2>
                    <p class="text-muted mb-0">Daftar semua data ahli waris yang terdaftar dalam sistem</p>
                </div>
            </div>

            <!-- Table Card -->
            <div id="data-ahli-waris" class="table-card">
                <div class="table-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Daftar Ahli Waris</h5>
                            <small class="text-muted">Total {{ $totalCount ?? count($ahliWaris) }} data</small>
                        </div>
                        <form action="{{ route('ahli-waris.index') }}" method="GET" class="filter-toolbar">
                            <div class="input-group input-group-sm" style="max-width: 220px;">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" name="q" class="form-control" placeholder="Cari NIK/Nama/Telepon/Alamat" value="{{ request('q') }}">
                            </div>
                            <div class="input-group input-group-sm" style="max-width: 180px;">
                                <span class="input-group-text"><i class="bi bi-filter"></i></span>
                                <select name="status" class="form-select">
                                    <option value="">Semua Status</option>
                                    <option value="pending" {{ request('status')==='pending' ? 'selected' : '' }}>Belum Diproses</option>
                                    <option value="diterima" {{ request('status')==='diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ request('status')==='ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            @php $tahunSekarang = date('Y'); @endphp
                            <div class="input-group input-group-sm" style="max-width: 160px;">
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
                            <div class="input-group input-group-sm" style="max-width: 140px;">
                                <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                <select name="tahun" class="form-select">
                                    <option value="">Tahun</option>
                                    @for ($t = $tahunSekarang; $t >= $tahunSekarang - 10; $t--)
                                        <option value="{{ $t }}" {{ (string)$t === (string)request('tahun') ? 'selected' : '' }}>{{ $t }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-filter btn-sm">
                                <i class="bi bi-funnel"></i> Filter
                            </button>
                            <a href="{{ route('ahli-waris.index') }}" class="btn btn-reset btn-sm">Reset</a>
                            <a href="{{ route('ahli-waris.export') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-file-earmark-excel"></i> Export Excel
                            </a>
                        </form>
                    </div>
                </div>
                
                <div class="table-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="sticky">#</th>
                                    <th class="sticky">NIK</th>
                                    <th class="sticky">Nama Lengkap</th>
                                    <th class="sticky">Nomor Telepon</th>
                                    <th class="sticky">Alamat</th>
                                    <th class="sticky">Status</th>
                                    <th class="sticky">Dokumen</th>
                                    <th class="sticky">Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ahliWaris as $item)
                                    @php
                                        $isAccepted = ($item->status == '1' || $item->status == 'diterima');
                                        $isRejected = ($item->status == '2' || $item->status == 'ditolak');
                                        $rowClass = $isAccepted ? 'row-accepted' : ($isRejected ? 'row-rejected' : 'row-pending');
                                    @endphp
                                    <tr class="{{ $rowClass }}">
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
                                            @if($isAccepted)
                                                <span class="status-chip chip-accepted"><i class="bi bi-check-circle"></i> Diterima</span>
                                            @elseif($isRejected)
                                                <span class="status-chip chip-rejected"><i class="bi bi-x-circle"></i> Ditolak</span>
                                            @else
                                                <span class="status-chip chip-pending"><i class="bi bi-hourglass-split"></i> Belum Diproses</span>
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
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
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
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            @if(Auth::user() && Auth::user()->avatar)
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="Current Avatar" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #eee;">
                            @else
                                <div class="rounded-circle mb-3 d-inline-flex align-items-center justify-content-center bg-light text-primary fw-bold" style="width: 100px; height: 100px; font-size: 32px; border: 3px solid #eee;">
                                    {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Pilih Foto Baru</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
