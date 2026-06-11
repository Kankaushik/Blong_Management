<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - GovtAlerts</title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="{{ $blog->short_description }}">
    <meta name="keywords" content="{{ $blog->category }}, GovtAlerts Blog, Job Updates">

    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">

    <!-- Custom local styles -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <style>
        .blog-content-body {
            font-size: 16.5px;
            line-height: 1.8;
            color: #334155;
        }
        .blog-content-body p {
            margin-bottom: 20px;
        }
        .blog-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 20px 0;
        }
        .hover-primary:hover {
            color: var(--color-primary) !important;
        }
    </style>
</head>

<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
                <div class="logo-text" style="font-size: 24px; font-weight: 800; color: var(--color-primary-dark); letter-spacing: -0.5px;">
                    <i class="bi bi-shield-check me-1" style="color: var(--color-primary);"></i>GovtAlerts
                </div>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
                <ul class="navbar-nav gap-3 ms-auto me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category/Jobs">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category/Admit Card">Admit Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/category/Result">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Blogs</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="https://whatsapp.com/channel/0029Vb6ewxeBqbrEjLgEyJ1S" target="_blank" class="spl-btn d-none d-lg-block">
                        <img src="https://www.jobyaari.com/img/icons/so-what.png" alt="WhatsApp Icon" style="width: 42px; height: 42px; filter: hue-rotate(60deg);">
                    </a>
                    <a href="/admin/blogs" class="btn btn-outline-primary">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Breadcrumb Banner -->
    <div class="page-breadcrumb bblog text-center">
        <div class="container">
            <div class="dz-bnr-inr-entry">
                <h1 style="max-width: 800px; margin: 0 auto 12px; font-size: 26px; line-height: 1.4;">{{ $blog->title }}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->category }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="container mb-5">
        <div class="row">
            <!-- Blog Main Content (Left Column) -->
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <article class="bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light">
                    <!-- Meta info -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <span class="badge" style="background-color: var(--color-primary-light); color: var(--color-primary-dark); font-weight: 600; font-size: 13.5px; padding: 8px 16px; border-radius: 8px;">
                            {{ $blog->category }}
                        </span>
                        <span style="font-size: 13.5px; font-weight: 600; background: var(--color-primary-light); color: var(--color-primary-dark); padding: 8px 16px; border-radius: 8px;">
                            <i class="bi bi-calendar3 me-1" style="color: var(--color-primary);"></i>
                            {{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('d M Y') : $blog->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <!-- Blog Title -->
                    <h1 class="fw-bold mb-4" style="color: #0f172a; font-size: 32px; line-height: 1.3; letter-spacing: -0.5px;">
                        {{ $blog->title }}
                    </h1>

                    <!-- Featured Image -->
                    @if($blog->image)
                    <div class="mb-4 text-center rounded-4 overflow-hidden" style="max-height: 480px;">
                        <img src="{{ asset('uploads/'.$blog->image) }}" class="img-fluid w-100" alt="{{ $blog->title }}" style="object-fit: cover; max-height: 480px;">
                    </div>
                    @endif

                    <!-- Blog Excerpt / Short Description Box -->
                    <div class="p-3 bg-light rounded-3 mb-4 border-start border-success border-4" style="border-left-color: var(--color-primary) !important;">
                        <strong class="text-secondary">Summary:</strong>
                        <p class="mb-0 mt-1 text-secondary" style="font-size: 15px; font-style: italic;">
                            {{ $blog->short_description }}
                        </p>
                    </div>

                    <!-- Blog Content Body -->
                    <div class="blog-content-body mb-5">
                        {!! $blog->content !!}
                    </div>

                    <!-- Navigation Action Button -->
                    <div class="border-top pt-4">
                        <a href="/" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Back to Blogs
                        </a>
                    </div>
                </article>
            </div>

            <!-- Sidebar (Right Column) -->
            <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                <aside class="side-bar right ms-lg-3 mt-4 mt-lg-0">
                    
                    <!-- WhatsApp Invitation Ad Widget -->
                    <div class="widget mb-4">
                        <a href="https://whatsapp.com/channel/0029Vb6ewxeBqbrEjLgEyJ1S" target="_blank" class="d-block border-0 rounded-4 overflow-hidden shadow-sm hover-up">
                            <img src="https://www.jobyaari.com/public/user-uploads/ads_images/whatsapp_adv.png" class="w-100" alt="WhatsApp Channel Ad" style="height: auto; filter: hue-rotate(60deg);">
                        </a>
                    </div>

                    <!-- Latest Posts Sidebar Card -->
                    <div class="widget sidebar-card mb-4">
                        <h5 class="widget-title mb-4 fw-bold">Latest Posts</h5>
                        <div class="latest-posts-list">
                            @foreach($latestBlogs as $item)
                            <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="badge" style="background-color: var(--color-primary-light); color: var(--color-primary-dark); font-size: 11px; padding: 2px 8px; border-radius: 4px;">
                                        {{ $item->category }}
                                    </span>
                                    <span class="text-muted" style="font-size: 11.5px; font-weight: 500;">
                                        {{ $item->published_date ? \Carbon\Carbon::parse($item->published_date)->format('d M Y') : $item->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <a href="/blog/{{ $item->id }}" class="fw-bold text-decoration-none text-dark hover-primary" style="font-size: 14.5px; line-height: 1.4; display: block; transition: color 0.2s ease;">
                                    {{ $item->title }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </main>

    <!-- Site Footer (Desktop) -->
    <footer class="site-footer d-none d-lg-block">
        <div class="container py-5">
            <div class="row gy-4">
                <!-- Logo + About Section -->
                <div class="col-lg-5 col-md-6 col-6 order-md-1">
                    <div class="d-flex align-items-center mb-3">
                        <a href="/">
                            <div class="logo-text" style="font-size: 26px; font-weight: 800; color: var(--color-primary-dark); letter-spacing: -0.5px;">
                                <i class="bi bi-shield-check me-1" style="color: var(--color-primary);"></i>GovtAlerts
                            </div>
                        </a>
                    </div>
                    <h6 class="footer-title d-none d-md-block">About Us</h6>
                    <p class="footer-text">
                        We provide latest job notifications, admit cards, exam alerts, and results to help students and job seekers stay updated.
                    </p>
                    <div class="social-icons d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/" target="_blank" class="social-img"><img src="https://www.jobyaari.com/img/icons/fb.png" alt="Facebook" style="width: 30px;"></a>
                        <a href="https://www.instagram.com/" target="_blank" class="social-img"><img src="https://www.jobyaari.com/img/icons/intg.png" alt="Instagram" style="width: 30px;"></a>
                        <a href="https://www.linkedin.com/" target="_blank" class="social-img"><img src="https://www.jobyaari.com/img/icons/ldn.png" alt="LinkedIn" style="width: 30px;"></a>
                        <a href="https://www.youtube.com/" target="_blank" class="social-img"><img src="https://www.jobyaari.com/img/icons/yt.png" alt="YouTube" style="width: 30px;"></a>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-2 col-md-6 col-6 order-3 order-md-2">
                    <h6 class="footer-title">Quick Links</h6>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="/category/Jobs" class="text-decoration-none text-muted">Latest Jobs</a></li>
                        <li class="mb-2"><a href="/category/Admit Card" class="text-decoration-none text-muted">Admit Cards</a></li>
                        <li class="mb-2"><a href="/category/Result" class="text-decoration-none text-muted">Exam Results</a></li>
                        <li class="mb-2"><a href="/category/Jobs" class="text-decoration-none text-muted">Government Jobs</a></li>
                    </ul>
                </div>

                <!-- Support Section -->
                <div class="col-lg-2 col-md-6 col-6 order-4 order-md-3">
                    <h6 class="footer-title">Support</h6>
                    <ul class="footer-links list-unstyled">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Contact Us</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- App Download Coming Soon Section -->
                <div class="col-lg-3 col-md-6 col-6 last-column order-2 order-md-4">
                    <h6 class="footer-title">Launching soon!<br>Stay Tuned!</h6>
                    <div class="app-buttons mt-3 d-flex flex-column gap-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play Store" style="height: 38px; max-width: 130px;">
                        <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" style="height: 38px; max-width: 130px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Info -->
        <div class="footer-bottom text-center py-3 border-top bg-light">
            &copy; 2026 GovtAlerts. All Rights Reserved. | Made with <i class="fa-solid fa-heart" style="color: var(--color-primary-dark);"></i> in India
        </div>
    </footer>

    <!-- Mobile Fixed Footer Tab Bar -->
    <div class="mobile-footer d-flex d-lg-none justify-content-around align-items-center bg-white border-top fixed-bottom py-2 shadow">
        <a href="/" class="mob-tab text-center text-decoration-none text-muted active">
            <span class="icon d-block"><i class="bi bi-house-door fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Home</span>
        </a>
        <a href="/category/Jobs" class="mob-tab text-center text-decoration-none text-muted">
            <span class="icon d-block"><i class="bi bi-briefcase fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Jobs</span>
        </a>
        <a href="/category/Admit Card" class="mob-tab text-center text-decoration-none text-muted">
            <span class="icon d-block"><i class="bi bi-file-earmark-text fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Admit Card</span>
        </a>
        <a href="/category/Result" class="mob-tab text-center text-decoration-none text-muted">
            <span class="icon d-block"><i class="bi bi-award fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Result</span>
        </a>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>