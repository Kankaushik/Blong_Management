<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blogs - GovtAlerts</title>

    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS Variables & Admin Stylesheet -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

    <div class="d-flex" style="min-height: 100vh;">
        <!-- Left Sidebar Layout (JobYaari Style) -->
        <aside class="admin-sidebar d-flex flex-column">
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
                <a class="nav-link" href="/admin/dashboard">
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
                            <a class="nav-link active-sublink" href="/admin/blogs">
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
                    <span class="admin-breadcrumb-main">Manage Blogs</span> Home &bull; Blog &bull; Manage Blogs
                </div>
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-grid text-muted fs-5 cursor-pointer"></i>
                    <i class="bi bi-bell text-muted fs-5 cursor-pointer"></i>
                    <a href="/admin/logout" class="text-danger text-decoration-none" title="Logout"><i class="bi bi-power fs-5"></i></a>
                </div>
            </header>

            <!-- Page Body Content -->
            <main class="p-4 grow">
                <div class="bg-white p-4 rounded-3 border" style="box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);">
                    
                    <!-- Search bar and Action Buttons -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                        <!-- Search Box (Left) -->
                        <div style="width: 320px;">
                            <form method="GET" action="/admin/blogs">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0" style="border-radius: 8px 0 0 8px;"><i class="bi bi-search text-muted"></i></span>
                                    <input type="text" name="search" class="form-control border-start-0 py-2" placeholder="Start typing to search" style="border-radius: 0 8px 8px 0; font-size: 14.5px;" value="{{ request('search') }}">
                                </div>
                            </form>
                        </div>

                        <!-- Buttons (Right) -->
                        <div class="d-flex gap-2">
                            <a href="/admin/blogs/create" class="btn btn-primary px-4 d-flex align-items-center gap-2" style="background-color: var(--admin-primary); border-color: var(--admin-primary); font-weight: 600; border-radius: 6px;">
                                <i class="bi bi-plus"></i> Add Blogs
                            </a>
                            <button class="btn btn-light border px-4 d-flex align-items-center gap-2" style="color: #475569; font-weight: 600; border-radius: 6px;">
                                <i class="bi bi-box-arrow-up"></i> Export
                            </button>
                        </div>
                    </div>

                    <!-- Blog Posts List Table (JobYaari Style) -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle table-jobyaari">
                            <thead>
                                <tr>
                                    <th style="width: 40px; text-align: center;"><input type="checkbox"></th>
                                    <th style="width: 50px; text-align: center;"><i class="bi bi-eye"></i></th>
                                    <th style="width: 90px; text-align: center;">Blog ID</th>
                                    <th>Blog Title</th>
                                    <th>Slug</th>
                                    <th style="width: 120px;">Category</th>
                                    <th style="width: 140px;">Published Date</th>
                                    <th style="width: 100px;">image</th>
                                    <th style="width: 90px; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                <tr>
                                    <!-- Checkbox -->
                                    <td class="text-center"><input type="checkbox"></td>
                                    
                                    <!-- View Link -->
                                    <td class="text-center">
                                        <a href="/blog/{{ $blog->id }}" target="_blank" class="action-icon-link text-secondary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                    
                                    <!-- Blog ID -->
                                    <td class="text-center text-muted fw-semibold">{{ $blog->id }}</td>
                                    
                                    <!-- Blog Title -->
                                    <td class="fw-semibold">{{ $blog->title }}</td>
                                    
                                    <!-- Slug (Red Style) -->
                                    <td class="text-danger" style="font-size: 13.5px; max-width: 250px; word-break: break-all;">
                                        {{ Str::slug($blog->title) }}
                                    </td>
                                    
                                    <!-- Category -->
                                    <td>{{ $blog->category }}</td>
                                    
                                    <!-- Published Date -->
                                    <td class="text-nowrap text-muted" style="font-size: 13.5px;">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('d M Y') : $blog->created_at->format('d M Y') }}
                                    </td>
                                    
                                    <!-- Image Thumbnail -->
                                    <td>
                                        @if($blog->image)
                                        <div class="rounded overflow-hidden" style="width: 75px; height: 50px;">
                                            <img src="{{ asset('uploads/'.$blog->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="thumbnail">
                                        </div>
                                        @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 75px; height: 50px; font-size: 10px;">
                                            No image
                                        </div>
                                        @endif
                                    </td>
                                    
                                    <!-- Action (Edit, Delete icons) -->
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <a href="/admin/blogs/edit/{{ $blog->id }}" class="action-icon-link text-secondary" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="/admin/blogs/delete/{{ $blog->id }}" class="action-icon-link text-danger" onclick="return confirm('Delete this blog?')" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5 text-muted">
                                        <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                                        No blogs found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
                        <div class="text-muted" style="font-size: 13.5px;">Show {{ $blogs->count() }} entries</div>
                        <div>
                            {{ $blogs->links() }}
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

</body>

</html>