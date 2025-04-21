<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        return view('backend.configuration.index', compact('configuration'));
    }

    public function createOrUpdate(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg',
            'title_logo' => 'nullable|image|mimes:jpg,png,jpeg',
            'company_name' => 'nullable|string',
            'title' => 'nullable|string',
            'phone_number' => 'nullable|integer',
            'email_address' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'address' => 'nullable|string',
            'map' => 'nullable|string',
            'footer' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_descriptions' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '-' . $logo->getClientOriginalName();
            $logoPath = ('uploads/configuration');
            $logo->move($logoPath, $logoName);
            $data['logo'] = 'uploads/configuration/' . $logoName;
        }

        if ($request->hasFile('title_logo')) {
            $titleLogo = $request->file('title_logo');
            $titleLogoName = time() . '-' . $titleLogo->getClientOriginalName();
            $titleLogoPath = ('uploads/configuration');
            $titleLogo->move($titleLogoPath, $titleLogoName);
            $data['title_logo'] = 'uploads/configuration/' . $titleLogoName;
        }

        $configuration = Configuration::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'Configuration updated successfully!');
    }
}
