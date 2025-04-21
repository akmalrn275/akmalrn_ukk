<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryService;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class CategoryServiceController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $categories = CategoryService::all();
        return view('backend.services.categorys.index', compact('configuration', 'categories'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        return view('backend.services.categorys.create', compact('configuration'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = $request->only(['name', 'description', 'price', 'overview']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(('uploads/category_services'), $imageName);
            $data['image'] = 'uploads/category_services/' . $imageName;
        }

        CategoryService::create($data);

        return redirect()->route('category_services.index')->with('success', 'Service category added successfully!');
    }

    public function edit(CategoryService $categoryService)
    {
        $configuration = Configuration::first();
        return view('backend.services.categorys.edit', compact('configuration', 'categoryService'));
    }

    public function update(Request $request, CategoryService $categoryService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'overview' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = $request->only(['name', 'description', 'price', 'overview']);

        if ($request->hasFile('image')) {
            if ($categoryService->image && file_exists(($categoryService->image))) {
                unlink(($categoryService->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(('uploads/category_services'), $imageName);
            $data['image'] = 'uploads/category_services/' . $imageName;
        }

        $categoryService->update($data);

        return redirect()->route('category_services.index')->with('success', 'Service category updated successfully!');
    }

    public function destroy(CategoryService $categoryService)
    {
        if ($categoryService->image && file_exists(($categoryService->image))) {
            unlink(($categoryService->image));
        }
        $categoryService->delete();

        return redirect()->route('category_services.index')->with('success', 'Service category deleted successfully!');
    }
}
