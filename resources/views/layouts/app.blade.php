<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduAdmin - Dashboard')</title>
    @vite('resources/css/app.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 200px;
            height: 100vh;
            background: #1a1a2e;
            color: white;
            padding: 20px;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
        }

        .sidebar-logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-logo svg {
            width: 32px;
            height: 32px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #a0a0b0;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #0066ff;
            color: white;
        }

        .main-content {
            margin-left: 200px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border-bottom: 1px solid #e5e7eb;
        }

        .topbar-search {
            display: flex;
            align-items: center;
            background: #f0f2f5;
            border-radius: 8px;
            padding: 8px 12px;
            width: 250px;
        }

        .topbar-search input {
            border: none;
            background: transparent;
            width: 100%;
            outline: none;
            font-size: 14px;
        }

        .topbar-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .topbar-right > div {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .page-header p {
            color: #666;
            font-size: 14px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-left: 4px solid #0066ff;
        }

        .stat-card.blue {
            border-left-color: #0066ff;
        }

        .stat-card.orange {
            border-left-color: #ff9800;
        }

        .stat-card.red {
            border-left-color: #f44336;
        }

        .stat-card.green {
            border-left-color: #4caf50;
        }

        .stat-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a2e;
        }

        .stat-change {
            font-size: 12px;
            color: #999;
            margin-top: 8px;
        }

        .stat-change.up {
            color: #4caf50;
        }

        .stat-change.down {
            color: #f44336;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 15px;
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .card-header .view-all {
            color: #0066ff;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f9fafb;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            color: #666;
            border-bottom: 1px solid #e5e7eb;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .progress-bar {
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
            width: 100%;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #0066ff, #00d4ff);
            border-radius: 3px;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-blue {
            background: #e3f2fd;
            color: #0066ff;
        }

        .badge-orange {
            background: #fff3e0;
            color: #ff9800;
        }

        .badge-red {
            background: #ffebee;
            color: #f44336;
        }

        .badge-green {
            background: #e8f5e9;
            color: #4caf50;
        }

        .chart-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            text-decoration: none;
            color: #666;
            cursor: pointer;
        }

        .pagination a:hover, .pagination a.active {
            background: #0066ff;
            color: white;
            border-color: #0066ff;
        }

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .chart-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 10px;
            }
            .sidebar-logo span {
                display: none;
            }
            .sidebar-menu a span {
                display: none;
            }
            .main-content {
                margin-left: 70px;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
            </svg>
            <span>EduAdmin</span>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" class="@if(Route::is('dashboard')) active @endif">📊 Dashboard</a></li>
            <li><a href="{{ route('dashboard.courses') }}" class="@if(Route::is('dashboard.courses')) active @endif">📚 Courses</a></li>
            <li><a href="{{ route('dashboard.students') }}" class="@if(Route::is('dashboard.students')) active @endif">👥 Students</a></li>
            <li><a href="{{ route('dashboard.analytics') }}" class="@if(Route::is('dashboard.analytics')) active @endif">📈 Analytics</a></li>
            <li><a href="{{ route('dashboard.settings') }}" class="@if(Route::is('dashboard.settings')) active @endif">⚙️ Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-search">
                <input type="text" placeholder="Search...">
                <span>🔍</span>
            </div>
            <div class="topbar-right">
                <div>🔔</div>
                <div>🌙</div>
                <div>👤</div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
