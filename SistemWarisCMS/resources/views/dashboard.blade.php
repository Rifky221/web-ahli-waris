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
            gap: 10px;
            padding: 8px 12px;
            background: linear-gradient(135deg, rgba(67,97,238,0.08), rgba(76,201,240,0.08));
            border-radius: 14px;
            border: 1px solid rgba(67, 97, 238, 0.25);
            box-shadow: 0 10px 24px rgba(67,97,238,0.12);
            min-width: 200px;
            backdrop-filter: saturate(120%) blur(6px);
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
            min-width: 120px;
            justify-content: center;
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
        
        .dashboard-filter {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        
        .dashboard-filter .input-group-text {
            background: rgba(67, 97, 238, 0.08);
            color: var(--primary-color);
            border: 1px solid rgba(67, 97, 238, 0.2);
        }
        
        .dashboard-filter .form-select {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: var(--transition);
        }
        
        .dashboard-filter .form-select:focus {
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.15);
            border-color: rgba(67, 97, 238, 0.5);
            transform: translateY(-1px);
        }
        
        .dashboard-filter .btn-filter {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 8px 16px;
            transition: var(--transition);
        }
        
        .dashboard-filter .btn-filter:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 10px 24px rgba(67, 97, 238, 0.35);
        }
        
        .dashboard-filter .btn-reset {
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--dark-color);
            border-radius: 10px;
            padding: 8px 16px;
            transition: var(--transition);
        }
        
        .dashboard-filter .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
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
            grid-template-columns: 1fr;
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
            transition: width 0.8s ease;
        }
        
        .status-bars {
            display: flex;
            align-items: flex-end;
            gap: 24px;
            height: 300px;
            margin-top: 8px;
            width: 100%;
        }
        
        .bar-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            flex: 1;
        }
        
        .bar {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.06);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            box-shadow: var(--shadow-light);
        }
        
        .bar-fill {
            width: 100%;
            transition: height 0.8s ease;
            border-radius: 10px 10px 0 0;
            min-height: 4px;
        }
        
        .bar-label {
            color: var(--gray-color);
            font-size: 14px;
            text-align: center;
        }
        
        .bar-value {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark-color);
            line-height: 1;
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

        /* Mobile Responsive Styles */
        @media (max-width: 991px) {
            /* Sidebar Mobile */
            .sidebar {
                transform: translateX(-100%);
                width: 100%;
                max-width: 280px;
                z-index: 1050;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            /* Overlay for mobile sidebar */
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

            /* Content Adjustment */
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
            
            /* Stats Grid */
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            /* Activity Container */
            .activity-container {
                grid-template-columns: 1fr;
            }
            
            .activity-card, .status-overview-card {
                height: auto;
                min-height: 400px;
            }
            
            /* Header Adjustments */
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
            
            .user-profile {
                min-width: auto;
                padding: 8px;
            }
            
            .user-info {
                display: none;
            }
            
            .user-name, .user-role {
                display: none;
            }
            
            /* Mobile Toggle Button */
            .mobile-toggle {
                display: block !important;
                font-size: 24px;
                color: var(--dark-color);
                background: none;
                border: none;
                cursor: pointer;
                margin-right: 0;
                padding: 0;
            }

            .welcome-banner::before, .welcome-banner::after {
                display: none;
            }
            
            .welcome-title {
                font-size: 24px;
            }
            
            .main-content {
                padding: 16px;
            }
            
            /* Logout Button Mobile */
            .logout-btn {
                min-width: auto;
                padding: 8px 12px;
                font-size: 0;
                gap: 0;
            }
            .logout-btn i {
                margin-right: 0;
                font-size: 1.2rem;
            }
        }

        /* Default state for mobile toggle */
        .mobile-toggle {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Mobile Sidebar Overlay -->
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
            <div class="d-flex align-items-center gap-4">
                <button class="mobile-toggle" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="header-title mb-0">Dashboard Sistem</h1>
               
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
                
                @php $tahunSekarang = date('Y'); @endphp
                <form action="{{ route('dashboard') }}" method="GET" class="dashboard-filter">
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
                    <button type="submit" class="btn btn-filter btn-sm">
                        <i class="bi bi-funnel"></i>
                        Filter
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn btn-reset btn-sm">Reset</a>
                </form>
                
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
                        
                        <div style="width: 100%; height: 360px;">
                            <canvas id="statusBarChart" style="width: 100%; height: 100%;"></canvas>
                        </div>
                    </div>
                </div>

            <!-- Recent Permohonan Table -->
            <div id="recent-data" class="recent-data">
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
                                                <a href="{{ route('ahli-waris.index', ['focus_id' => $r->id ?? null]) }}#data-ahli-waris" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const el = document.getElementById('statusBarChart');
        if (el) {
            const ctx = el.getContext('2d');
            const stats = @json($stats ?? []);
            const labels = ['Total', 'Tindak Lanjut', 'Ditolak', 'Diterima'];
            const data = [
                stats.permohonan || 0,
                stats.tindak_lanjut || 0,
                stats.ditolak || 0,
                stats.diterima || 0
            ];
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        data,
                        backgroundColor: ['#4361ee', '#ffd166', '#ef476f', '#06d6a0'],
                        borderRadius: 10,
                        maxBarThickness: 80
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { grid: { display: false }, ticks: { font: { weight: '600' } } },
                        y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }

        // Sidebar Toggle for Mobile
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
