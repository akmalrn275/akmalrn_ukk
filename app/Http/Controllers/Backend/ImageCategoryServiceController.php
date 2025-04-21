<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CategoryService;
use App\Models\Backend\Configuration;
use App\Models\Backend\ImageCategoryService;
use Illuminate\Http\Request;

class ImageCategoryServiceController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $images = ImageCategoryService::orderBy('created_at', 'desc')->get();
        return view('backend.services.image.index', compact('configuration', 'images'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        $categories = CategoryService::all();
        return view('backend.services.image.create', compact('configuration', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_services_id' => 'required|exists:category_services,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(('uploads/category_services/image'), $imageName);
            $imagePath = 'uploads/category_services/image/' . $imageName;
        }

        ImageCategoryService::create([
            'category_services_id' => $request->category_services_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('image_category_services.index')
            ->with('success', 'Gambar berhasil disimpan.');
    }


    public function edit($id)
    {
        $configuration = Configuration::first();
        $imageCategoryService = ImageCategoryService::findOrFail($id);
        $categories = CategoryService::all();
        return view('backend.services.image.edit', compact('configuration', 'imageCategoryService', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_services_id' => 'required|exists:category_services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imageCategory = ImageCategoryService::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($imageCategory->image && file_exists(($imageCategory->image))) {
                unlink(($imageCategory->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(('uploads/category_services/image'), $imageName);
            $imagePath = 'uploads/category_services/image/' . $imageName;
        } else {
            $imagePath = $imageCategory->image; 
        }

        $imageCategory->update([
            'category_services_id' => $request->category_services_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('image_category_services.index')
            ->with('success', 'Gambar berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $imageCategory = ImageCategoryService::findOrFail($id);
    
        if ($imageCategory->image && file_exists(($imageCategory->image))) {
            unlink(($imageCategory->image));
        }
    
        $imageCategory->delete();
    
        return redirect()->route('image_category_services.index')
                         ->with('success', 'Gambar berhasil dihapus.');
    }
}
