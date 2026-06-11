<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Blog - GovtAlerts</title>

    <!-- CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
    <!-- Custom CSS Variables & Admin Stylesheet -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
                <div class="form-box-jobyaari">
                    <h5 class="widget-title mb-4 fw-bold">Edit Organisation</h5>

                    <form action="/admin/blogs/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Title Input -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                            </div>

                            <!-- Category Selection -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Categories</label>
                                <select name="category" class="form-control">
                                    <option value="Jobs" {{ $blog->category == 'Jobs' ? 'selected' : '' }}>Jobs</option>
                                    <option value="Result" {{ $blog->category == 'Result' ? 'selected' : '' }}>Result</option>
                                    <option value="Admit Card" {{ $blog->category == 'Admit Card' ? 'selected' : '' }}>Admit Card</option>
                                    <option value="Answer Key" {{ $blog->category == 'Answer Key' ? 'selected' : '' }}>Answer Key</option>
                                    <option value="Information" {{ $blog->category == 'Information' ? 'selected' : '' }}>Information</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tag Field -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Tag</label>
                                <input type="text" class="form-control" placeholder="Type and press Enter">
                            </div>

                            <!-- Published Date Picker -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Published Date <span class="text-danger">*</span></label>
                                <input type="date" name="published_date" class="form-control" value="{{ $blog->published_date ? \Carbon\Carbon::parse($blog->published_date)->format('Y-m-d') : $blog->created_at->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <!-- Image File Upload Zone showing Current Thumbnail -->
                        <div class="mb-4">
                            <label class="form-label">Upload The image <i class="bi bi-question-circle text-muted" title="Featured thumbnail image"></i></label>
                            
                            <div class="row align-items-center g-3">
                                @if($blog->image)
                                <div class="col-md-3 text-center">
                                    <div class="border rounded-3 p-1 bg-light shadow-sm d-inline-block" style="width: 100%; max-width: 150px; height: 100px;">
                                        <img src="{{ asset('uploads/'.$blog->image) }}" class="w-100 h-100 rounded-2" style="object-fit: cover;" alt="Current Image">
                                    </div>
                                    <div class="text-muted mt-1" style="font-size: 11.5px;">Current Image</div>
                                </div>
                                @endif
                                <div class="{{ $blog->image ? 'col-md-9' : 'col-12' }}">
                                    <div class="dashed-upload-zone py-4" onclick="document.getElementById('image-file-input').click()">
                                        <div class="cloud-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                                        <div class="upload-text">Choose a file to replace</div>
                                        <div class="text-muted" style="font-size: 13px;" id="file-name-display">or drag and drop here</div>
                                    </div>
                                    <input type="file" name="image" id="image-file-input" class="d-none" onchange="displayFileName(this)">
                                </div>
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-4">
                            <label class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea name="short_description" rows="3" class="form-control" required>{{ $blog->short_description }}</textarea>
                        </div>

                        <!-- Full Rich Text Editor -->
                        <div class="mb-4">
                            <label class="form-label">Blog Content <span class="text-danger">*</span></label>
                            <div id="editor" style="min-height: 300px; font-size: 16px;">{!! $blog->content !!}</div>
                            <input type="hidden" name="content" id="content">
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4 py-2" style="background-color: var(--admin-primary); border-color: var(--admin-primary); border-radius: 6px; font-weight: 600;">
                                Update Blog
                            </button>
                            <a href="/admin/blogs" class="btn btn-light border px-4 py-2" style="color: #475569; font-weight: 600; border-radius: 6px;">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Quill Rich Text Editor JS & file display script -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'font': [] }, { 'size': [] }],
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'align': [] }],
            ['blockquote', 'code-block'],
            ['link', 'image', 'video'],
            ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Write the full blog post content here...'
        });

        document.querySelector('form').onsubmit = function() {
            document.getElementById('content').value = quill.root.innerHTML;
        };

        function displayFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : "Choose a file to replace";
            document.getElementById('file-name-display').innerText = fileName;
        }
    </script>

</body>

</html>