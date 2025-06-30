<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $featuredPosts = Blog::whereNotNull('title')
            ->whereNotNull('description')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $featuredIds = $featuredPosts->pluck('id')->toArray();
        $allPosts = Blog::whereNotIn('id', $featuredIds)
            ->whereNotNull('title')
            ->whereNotNull('description')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('blog', compact('featuredPosts', 'allPosts'), ['title' => __('messages.navbar.blog')]);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $title = $blog->title ?? 'Detail Blog';

        $relatedBlogs = Blog::where('id', '!=', $id)
            ->whereNotNull('title')
            ->whereNotNull('description')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'title', 'relatedBlogs'));
    }

    public function showDetail($id)
    {
        $blog = Blog::findOrFail($id);
        $title = $blog->title ?? 'Detail Blog';

        $relatedBlogs = Blog::where('id', '!=', $id)
            ->whereNotNull('title')
            ->whereNotNull('description')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('show', compact('blog', 'title', 'relatedBlogs'));
    }

    public function showImage($id)
    {
        $blog = Blog::findOrFail($id);

        if (!$blog->image) {
            abort(404, 'Image not found');
        }

        $imageData = $blog->image;
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($imageData);

        return response($imageData)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=3600');
    }

    public function getExcerpt($text, $limit = 150)
    {
        if (strlen($text) <= $limit) {
            return $text;
        }

        return substr($text, 0, $limit) . '...';
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $title = "Hasil Pencarian: " . $query;

        if (empty($query)) {
            return redirect()->route('blog.index');
        }

        $blogs = Blog::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%');
        })
            ->whereNotNull('title')
            ->whereNotNull('description')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('blog.search', compact('blogs', 'title', 'query'));
    }
}
