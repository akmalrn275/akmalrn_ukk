<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use App\Models\Backend\CategoryBlog;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('backend.blogs.index', compact('configuration', 'blogs'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        $category_blog = CategoryBlog::all();
        return view('backend.blogs.create', compact('configuration', 'category_blog'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:category_blog,id',
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_descriptions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageblog = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(('uploads/blogs'), $imageName);
            $imageblog = 'uploads/blogs/' . $imageName;
        }

        Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'meta_keywords' => $request->meta_keywords,
            'meta_descriptions' => $request->meta_descriptions,
            'image' => $imageblog,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog saved successfully.');
    }

    public function edit($id)
    {
        $configuration = Configuration::first();
        $blog = BLog::findOrFail($id);
        $category_blog = CategoryBlog::all();
        return view('backend.blogs.edit', compact('configuration', 'blog', 'category_blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:category_blog,id',
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'meta_descriptions' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(($blog->image))) {
                unlink(($blog->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(('uploads/blogs'), $imageName);
            $blog->image = 'uploads/blogs/' . $imageName;
        }

        $blog->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'overview' => $request->overview,
            'description' => $request->description,
            'meta_keywords' => $request->meta_keywords,
            'meta_descriptions' => $request->meta_descriptions,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id); 

        if ($blog->image && file_exists(($blog->image))) {
            unlink(($blog->image));
        }
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
