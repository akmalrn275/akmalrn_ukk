<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryBlog;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $category_blogs = CategoryBlog::orderBy('created_at', 'desc')->get();
        return view('backend.blogs.categorys_blog.index', compact('configuration', 'category_blogs'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        return view('backend.blogs.categorys_blog.create', compact('configuration'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string',
        ]);

        CategoryBlog::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category_blog.index')->with('success', 'Category Blog saved successfully.');
    }

    public function edit($id)
    {
        $configuration = Configuration::first();
        $category_blog = CategoryBlog::findOrFail($id);
        return view('backend.blogs.categorys_blog.edit', compact('configuration', 'category_blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    
        $data = CategoryBlog::findOrFail($id);
        $data->name = $request->name; 
        $data->save(); 
    
        return redirect()->route('category_blog.index')->with('success', 'Category Blog updated successfully.');
    }
    
    public function destroy($id)
    {
        $data = CategoryBlog::findOrFail($id);
        $data->delete();
        
        return redirect()->back()->with('success', 'Category Blog deleted successfully.');
    }
}
