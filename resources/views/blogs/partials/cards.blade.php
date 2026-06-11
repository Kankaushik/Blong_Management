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
    <div class="text-muted fs-4">No blogs found matching the search/filter criteria.</div>
</div>
@endforelse
