<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GovtAlerts</title>

    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS Variables & Admin Stylesheet -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <style>
        .dashboard-card {
            border: none;
            border-radius: 16px;
            color: white;
            padding: 24px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card .card-icon {
            position: absolute;
            right: 20px;
            bottom: 10px;
            font-size: 56px;
            opacity: 0.15;
        }

        .card-emerald {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        }

        .card-indigo {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .card-amber {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        }

        .action-btn {
            border-radius: 8px;
            padding: 10px 18px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="d-flex" style="min-height: 100vh;">
        <!-- Left Sidebar Layout (JobYaari Style) -->
        <aside class="admin-sidebar d-flex flex-column text-nowrap">
            <!-- Sidebar Brand Header -->
            <div class="sidebar-header-brand">
                <div>
                    <h5 class="sidebar-brand-title">Govt Alerts</h5>
                    <div class="sidebar-status-seo">
                        <span class="status-dot"></span>Seo
                    </div>
                </div>
                <div class="sidebar-logo-box">
                    G
                </div>
            </div>

            <!-- Sidebar Links -->
            <div class="py-3 grow">
                <a class="nav-link active-sublink" href="/admin/dashboard" style="background-color: #f1f5f9; color: var(--admin-primary) !important; font-weight: 700; border-radius: 6px; margin: 0 10px 6px;">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-newspaper"></i> Headlines
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-play-btn"></i> Help Videos
                </a>
                
                <div>
                    <a class="nav-link d-flex align-items-center justify-content-between" href="/admin/blogs">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-currency-dollar"></i> Manage Blog
                        </span>
                        <i class="bi bi-chevron-down text-muted" style="font-size: 11px;"></i>
                    </a>
                    <ul class="sub-nav">
                        <li>
                            <a class="nav-link" href="/admin/blogs">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                Tags
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar Footer Log Out -->
            <div class="p-3 border-top">
                <a href="/admin/logout" class="nav-link text-danger py-2 px-3 d-flex align-items-center gap-2">
                    <i class="bi bi-power fs-5"></i> Logout
                </a>
            </div>
        </aside>

        <!-- Right Content Area -->
        <div class="grow d-flex flex-column">
            <!-- Top Navbar Path -->
            <header class="admin-top-navbar">
                <div class="admin-breadcrumb">
                    <span class="admin-breadcrumb-main">Dashboard</span> Home &bull; Summary
                </div>
                <div class="d-flex align-items-center gap-2" style="font-weight: 500;">
                    <span class="text-muted" style="font-size: 13.5px;">Authorized:</span>
                    <span class="badge bg-success" style="background-color: var(--color-primary) !important; padding: 6px 12px; border-radius: 6px;">
                        <i class="bi bi-person-fill me-1"></i>{{ Auth::user()->name }}
                    </span>
                </div>
            </header>

            <!-- Page Body Content -->
            <main class="p-4 grow">
                <!-- Dashboard Statistics Grid -->
                <div class="row g-4">
                    <!-- Total Blogs -->
                    <div class="col-md-4">
                        <div class="dashboard-card card-indigo">
                            <span class="card-icon"><i class="bi bi-file-earmark-post"></i></span>
                            <h2 class="display-5 fw-bold mb-1">{{ $totalBlogs }}</h2>
                            <h5 class="mb-0 text-white-50" style="font-size: 14.5px;">Total Articles Published</h5>
                        </div>
                    </div>

                    <!-- Recent Blogs -->
                    <div class="col-md-4">
                        <div class="dashboard-card card-emerald">
                            <span class="card-icon"><i class="bi bi-check2-circle"></i></span>
                            <h2 class="display-5 fw-bold mb-1">{{ $recentBlogs->count() }}</h2>
                            <h5 class="mb-0 text-white-50" style="font-size: 14.5px;">Recent Updates (Active)</h5>
                        </div>
                    </div>

                    <!-- Admin Status -->
                    <div class="col-md-4">
                        <div class="dashboard-card card-amber">
                            <span class="card-icon"><i class="bi bi-person-badge"></i></span>
                            <h2 class="display-5 fw-bold mb-1">Active</h2>
                            <h5 class="mb-0 text-white-50" style="font-size: 14.5px;">Administrator Mode</h5>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Panel -->
                <div class="d-flex flex-wrap gap-2 mt-4 bg-white p-3 rounded-3 border border-light shadow-sm">
                    <a href="/admin/blogs" class="btn btn-dark action-btn">
                        <i class="bi bi-list-task"></i> Manage Blogs
                    </a>
                    <a href="/admin/blogs/create" class="btn btn-success action-btn" style="background-color: var(--color-primary); border-color: var(--color-primary);">
                        <i class="bi bi-plus-circle"></i> Add Blog Post
                    </a>
                    <a href="/" target="_blank" class="btn btn-primary action-btn">
                        <i class="bi bi-globe"></i> View Live Site
                    </a>
                    <a href="/admin/logout" class="btn btn-danger action-btn ms-md-auto">
                        <i class="bi bi-box-arrow-right"></i> Log Out
                    </a>
                </div>

                <!-- Recent Blog Posts Table -->
                <div class="bg-white p-4 rounded-3 border mt-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Recently Published Updates</h5>
                        <a href="/admin/blogs" class="btn btn-outline-primary btn-sm rounded-3">View All <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-jobyaari">
                            <thead>
                                <tr>
                                    <th style="width: 80px; background-color: #222222 !important; color: white !important;">ID</th>
                                    <th style="background-color: #222222 !important; color: white !important;">Title</th>
                                    <th style="background-color: #222222 !important; color: white !important;">Category</th>
                                    <th style="width: 180px; background-color: #222222 !important; color: white !important;">Published Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentBlogs as $blog)
                                <tr>
                                    <td class="fw-semibold text-muted">#{{ $blog->id }}</td>
                                    <td class="fw-bold">{{ $blog->title }}</td>
                                    <td>
                                        <span class="badge" style="background-color: var(--color-primary-light); color: var(--color-primary-dark); font-weight: 600; font-size: 12px; padding: 6px 12px; border-radius: 6px;">
                                            {{ $blog->category }}
                                        </span>
                                    </td>
                                    <td class="text-muted text-nowrap">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('d M Y') : $blog->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No blog posts available. Click "Add Blog Post" to publish one!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>