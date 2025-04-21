<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $about = About::first();
        return view('backend.about.index', compact('configuration', 'about'));
    }

    public function createOrUpdate(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $imagePath = ('uploads/about');
            $image->move($imagePath, $imageName);
            $data['image'] = 'uploads/about/' . $imageName;
        }

        $about = About::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'About updated successfully!');
    }
}
