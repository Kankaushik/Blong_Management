<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - GovtAlerts</title>
    
    <!-- Meta tags for SEO -->
    <meta name="description" content="Read latest updates on Government Jobs, Results, Admit Cards, and Answer Keys on GovtAlerts.">
    <meta name="keywords" content="Government Jobs, Sarkari Result, Admit Card, Answer Key, Blog">

    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">

    <!-- Custom local styles -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
                        <a class="nav-link ajax-nav-cat" href="#" data-category="Jobs">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ajax-nav-cat" href="#" data-category="Admit Card">Admit Cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ajax-nav-cat" href="#" data-category="Result">Results</a>
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
                <h1>Government Blogs & Info</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Live Search & Date Filters Container -->
    <div class="container mb-4">
        <div class="row g-3 justify-content-center">
            <!-- Title/Content Search -->
            <div class="col-md-5">
                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" id="ajax-search" class="form-control border-start-0 py-2.5" placeholder="Search blogs by title or content...">
                </div>
            </div>
            <!-- Date Filter -->
            <div class="col-md-3">
                <div class="input-group shadow-sm rounded-3 overflow-hidden">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar-event text-muted"></i></span>
                    <input type="date" id="ajax-date" class="form-control border-start-0 py-2.5" placeholder="Filter by date">
                </div>
            </div>
            <!-- Reset Button -->
            <div class="col-md-2">
                <button id="reset-filters" class="btn btn-secondary w-100 py-2.5 shadow-sm fw-semibold" style="border-radius: 8px;">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Category Pill Filter Section -->
    <div class="container mb-5 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-2" id="category-pills">
            <button class="btn btn-primary category-btn-pill px-4 ajax-cat-btn active" data-category="all">All Updates</button>
            <button class="btn btn-outline-primary category-btn-pill px-4 ajax-cat-btn" data-category="Jobs">Jobs</button>
            <button class="btn btn-outline-primary category-btn-pill px-4 ajax-cat-btn" data-category="Result">Result</button>
            <button class="btn btn-outline-primary category-btn-pill px-4 ajax-cat-btn" data-category="Admit Card">Admit Card</button>
            <button class="btn btn-outline-primary category-btn-pill px-4 ajax-cat-btn" data-category="Answer Key">Answer Key</button>
            <button class="btn btn-outline-primary category-btn-pill px-4 ajax-cat-btn" data-category="Information">Information</button>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="container mb-5">
        <div class="row">
            <!-- Blog Cards List (Left Column) -->
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="row" id="blog-container">
                    @forelse($blogs as $blog)
                    <div class="col-lg-12 col-md-12 mb-4">
                        <article class="dz-card style-1 blog-half">
                            <!-- Card Media / Image -->
                            <div class="dz-media">
                                <a href="/blog/{{ $blog->id }}">
                                    @if($blog->image)
                                    <img src="{{ asset('uploads/'.$blog->image) }}" alt="{{ $blog->title }}">
                                    @else
                                    <img src="https://via.placeholder.com/600x400?text=No+Image" alt="Placeholder Image">
                                    @endif
                                </a>
                            </div>

                            <!-- Card Info -->
                            <div class="dz-info">
                                <!-- Top badge for category -->
                                <div class="mb-2">
                                    <span class="badge" style="background-color: var(--color-primary-light); color: var(--color-primary-dark); font-weight: 600; font-size: 12.5px; padding: 6px 12px; border-radius: 6px;">
                                        {{ $blog->category }}
                                    </span>
                                </div>

                                <!-- Card Title -->
                                <h4 class="dz-title">
                                    <a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a>
                                </h4>

                                <!-- Card Description -->
                                <p>{{ $blog->short_description }}</p>

                                <!-- Bottom Section: Read More on left, Date on bottom-right -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="/blog/{{ $blog->id }}" class="btn btn-primary px-4 py-2">
                                        Read More
                                    </a>
                                    <span style="font-size: 13.5px; font-weight: 600; background: var(--color-primary-light); color: var(--color-primary-dark); padding: 6px 12px; border-radius: 8px;">
                                        <i class="bi bi-calendar3 me-1" style="color: var(--color-primary);"></i>
                                        {{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('d M Y') : $blog->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <div class="text-muted fs-4">No blogs found in this category.</div>
                    </div>
                    @endforelse
                </div>

                <!-- Defensive Pagination Links Wrapper -->
                <div class="pagination-wrapper d-flex justify-content-center mt-4">
                    @if(method_exists($blogs, 'links'))
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    @endif
                </div>
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

                    <!-- Categories Grid Widget -->
                    <div class="widget sidebar-card mb-4">
                        <h5 class="widget-title mb-4 fw-bold">Categories</h5>
                        <div class="category-grid better-ui">
                            <a class="cat-card ajax-side-cat" href="#" data-category="Jobs">
                                <div class="icon">
                                    <i class="bi bi-briefcase fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">Jobs</span>
                            </a>
                            <a class="cat-card ajax-side-cat" href="#" data-category="Result">
                                <div class="icon">
                                    <i class="bi bi-award fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">Results</span>
                            </a>
                            <a class="cat-card ajax-side-cat" href="#" data-category="Admit Card">
                                <div class="icon">
                                    <i class="bi bi-file-earmark-text fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">Admit Cards</span>
                            </a>
                            <a class="cat-card ajax-side-cat" href="#" data-category="Answer Key">
                                <div class="icon">
                                    <i class="bi bi-key fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">Answer Keys</span>
                            </a>
                            <a class="cat-card ajax-side-cat" href="#" data-category="Information">
                                <div class="icon">
                                    <i class="bi bi-info-circle fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">Info</span>
                            </a>
                            <a class="cat-card ajax-side-cat" href="#" data-category="all">
                                <div class="icon">
                                    <i class="bi bi-grid-3x3-gap fs-3" style="color: var(--color-primary);"></i>
                                </div>
                                <span class="title">All</span>
                            </a>
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
                        We provide latest job notifications, internships, admit cards, exam alerts, and results to help students and job seekers stay updated.
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
                        <li class="mb-2"><a href="#" class="ajax-side-cat text-decoration-none text-muted" data-category="Jobs">Latest Jobs</a></li>
                        <li class="mb-2"><a href="#" class="ajax-side-cat text-decoration-none text-muted" data-category="Admit Card">Admit Cards</a></li>
                        <li class="mb-2"><a href="#" class="ajax-side-cat text-decoration-none text-muted" data-category="Result">Exam Results</a></li>
                        <li class="mb-2"><a href="#" class="ajax-side-cat text-decoration-none text-muted" data-category="Jobs">Government Jobs</a></li>
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
        <a href="#" class="mob-tab text-center text-decoration-none text-muted ajax-nav-cat" data-category="Jobs">
            <span class="icon d-block"><i class="bi bi-briefcase fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Jobs</span>
        </a>
        <a href="#" class="mob-tab text-center text-decoration-none text-muted ajax-nav-cat" data-category="Admit Card">
            <span class="icon d-block"><i class="bi bi-file-earmark-text fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Admit Card</span>
        </a>
        <a href="#" class="mob-tab text-center text-decoration-none text-muted ajax-nav-cat" data-category="Result">
            <span class="icon d-block"><i class="bi bi-award fs-5"></i></span>
            <span class="label" style="font-size: 11px;">Result</span>
        </a>
    </div>

    <!-- jQuery and Bootstrap Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AJAX Filtering + Search Javascript -->
    <script>
        $(document).ready(function() {
            let activeCategory = 'all';

            // Function to perform AJAX requests
            function filterBlogs() {
                let searchVal = $('#ajax-search').val();
                let dateVal = $('#ajax-date').val();

                $.ajax({
                    url: '/blogs/filter',
                    type: 'GET',
                    data: {
                        search: searchVal,
                        category: activeCategory,
                        date: dateVal
                    },
                    beforeSend: function() {
                        $('#blog-container').html(`
                            <div class="col-12 text-center py-5">
                                <div class="spinner-border text-success" role="status" style="width: 3rem; height: 3rem; color: var(--color-primary) !important;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        `);
                        $('.pagination-wrapper').hide();
                    },
                    success: function(response) {
                        $('#blog-container').html(response);
                        
                        // Show pagination wrapper only if filters are reset to default 'all', empty search and empty date
                        if (activeCategory === 'all' && !searchVal && !dateVal) {
                            $('.pagination-wrapper').show();
                        } else {
                            $('.pagination-wrapper').hide();
                        }
                    },
                    error: function() {
                        $('#blog-container').html(`
                            <div class="col-12 text-center py-5 text-danger">
                                <i class="bi bi-exclamation-triangle fs-1"></i>
                                <p class="mt-2">An error occurred while loading content. Please check your connection.</p>
                            </div>
                        `);
                    }
                });
            }

            // Bind Category Pills clicks
            $('.ajax-cat-btn').on('click', function(e) {
                e.preventDefault();
                $('.ajax-cat-btn').removeClass('btn-primary active').addClass('btn-outline-primary');
                $(this).removeClass('btn-outline-primary').addClass('btn-primary active');
                
                activeCategory = $(this).data('category');
                filterBlogs();
            });

            // Bind Sidebar / Navigation / Footer category links
            $('.ajax-side-cat, .ajax-nav-cat').on('click', function(e) {
                e.preventDefault();
                activeCategory = $(this).data('category');
                
                // Highlight correct pill button
                $('.ajax-cat-btn').removeClass('btn-primary active').addClass('btn-outline-primary');
                $(`.ajax-cat-btn[data-category="${activeCategory}"]`).removeClass('btn-outline-primary').addClass('btn-primary active');
                
                // Scroll to top of listing/search section
                $('html, body').animate({
                    scrollTop: $('#ajax-search').offset().top - 100
                }, 400);

                filterBlogs();
            });

            // Bind Live Search text changes (with debounce)
            let debounceTimer;
            $('#ajax-search').on('keyup input', function() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function() {
                    filterBlogs();
                }, 300);
            });

            // Bind Datepicker change
            $('#ajax-date').on('change', function() {
                filterBlogs();
            });

            // Bind Reset Filters Button
            $('#reset-filters').on('click', function() {
                $('#ajax-search').val('');
                $('#ajax-date').val('');
                activeCategory = 'all';

                $('.ajax-cat-btn').removeClass('btn-primary active').addClass('btn-outline-primary');
                $(`.ajax-cat-btn[data-category="all"]`).removeClass('btn-outline-primary').addClass('btn-primary active');

                filterBlogs();
            });
        });
    </script>
</body>

</html>
