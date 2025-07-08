<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = DB::table('blogs')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['status' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa input Anda.');
        }

        try {
            $imageData = null;
            
            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageData = file_get_contents($image->getRealPath());
            }

            // Insert to database
            DB::table('blogs')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $imageData,
                'created_at' => now(),
            ]);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan blog. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $blog = DB::table('blogs')->where('id', $id)->first();
            
            if (!$blog) {
                return response()->json(['error' => 'Blog tidak ditemukan'], 404);
            }

            // Convert image to base64 if exists
            if ($blog->image) {
                $blog->image = base64_encode($blog->image);
            }

            return response()->json($blog);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat blog'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $blog = DB::table('blogs')->where('id', $id)->first();
            
            if (!$blog) {
                return response()->json(['error' => 'Blog tidak ditemukan'], 404);
            }

            return response()->json($blog);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data blog'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa input Anda.');
        }

        try {
            // Check if blog exists
            $existingBlog = DB::table('blogs')->where('id', $id)->first();
            if (!$existingBlog) {
                return redirect()->route('admin.blogs.index')
                    ->with('error', 'Blog tidak ditemukan.');
            }

            $updateData = [
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
            ];

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $updateData['image'] = file_get_contents($image->getRealPath());
            }

            // Update database
            DB::table('blogs')
                ->where('id', $id)
                ->update($updateData);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui blog. Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Check if blog exists
            $blog = DB::table('blogs')->where('id', $id)->first();
            if (!$blog) {
                return redirect()->route('admin.blogs.index')
                    ->with('error', 'Blog tidak ditemukan.');
            }

            // Delete blog
            DB::table('blogs')->where('id', $id)->delete();

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Blog berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->route('admin.blogs.index')
                ->with('error', 'Gagal menghapus blog. Error: ' . $e->getMessage());
        }
    }

    /**
     * Get image for display
     */
    public function getImage($id)
    {
        try {
            $blog = DB::table('blogs')->where('id', $id)->first();
            
            if (!$blog || !$blog->image) {
                return response()->json(['error' => 'Image not found'], 404);
            }

            return response($blog->image)->header('Content-Type', 'image/jpeg');

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load image'], 500);
        }
    }
}