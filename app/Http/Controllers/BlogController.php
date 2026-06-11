<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()
    ->paginate(6);

        return view('blogs.index', compact('blogs'));
    }

    public function filter(Request $request)
    {
        $query = Blog::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('short_description', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->where(function($q) use ($request) {
                $q->whereDate('published_date', '=', $request->date)
                  ->orWhere(function($q2) use ($request) {
                      $q2->whereNull('published_date')
                         ->whereDate('created_at', '=', $request->date);
                  });
            });
        }

        $blogs = $query->latest()->get();

        return view('blogs.partials.cards', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

   public function store(Request $request)
{
    $imageName = '';

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );
    }

    Blog::create([
        'title' => $request->title,
        'category' => $request->category,
        'short_description' => $request->short_description,
        'content' => $request->content,
        'image' => $imageName,
        'published_date' => $request->published_date
    ]);

    return redirect('/');
}

public function show($id)
{
    $blog = Blog::findOrFail($id);

    $latestBlogs = Blog::latest()
        ->take(5)
        ->get();

    return view(
        'blogs.show',
        compact(
            'blog',
            'latestBlogs'
        )
    );
}

public function adminIndex(Request $request)
{
    $blogs = Blog::query();

    if ($request->search) {
        $blogs->where(
            'title',
            'LIKE',
            '%'.$request->search.'%'
        );
    }

    $blogs = $blogs->latest()->paginate(10);

    return view('admin.blogs.index', compact('blogs'));
}
public function edit($id)
{
    $blog = Blog::findOrFail($id);

    return view('admin.blogs.edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $imageName = $blog->image;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads'),
            $imageName
        );
    }

    $blog->update([
        'title' => $request->title,
        'category' => $request->category,
        'short_description' => $request->short_description,
        'content' => $request->content,
        'image' => $imageName,
        'published_date' => $request->published_date
    ]);

    return redirect('/admin/blogs');
}

public function destroy($id)
{
    $blog = Blog::findOrFail($id);

    $blog->delete();

    return redirect('/admin/blogs');
}

public function category($category)
{
    $blogs = Blog::where(
        'category',
        $category
    )->get();

    return view(
        'blogs.index',
        compact('blogs')
    );
}

public function loginForm()
{
    return view('admin.login');
}

public function login(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {

        return redirect('/admin/dashboard');
    }

    return back()->with('error', 'Invalid Email or Password');
}

public function dashboard()
{
    $totalBlogs = Blog::count();

    $recentBlogs = Blog::latest()
        ->take(5)
        ->get();

    return view(
        'admin.dashboard',
        compact(
            'totalBlogs',
            'recentBlogs'
        )
    );
}

public function logout()
{
    Auth::logout();

    return redirect('/admin/login');
}
    }
