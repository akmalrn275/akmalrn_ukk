<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Backend\Configuration;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $receptionists = Admin::where('role', 'Admin')->get();
        return view('backend.receptionist.index', compact('receptionists', 'configuration'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        return view('backend.receptionist.create', compact('configuration'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_2' => $request->password,
            'role' => 'Admin',
        ]);

        return redirect()->route('receptionist.index')->with('success', 'Recepsionist saved successfully.');
    }

    public function edit($id)
    {
        $configuration = Configuration::first();
        $receptionist = Admin::findOrFail($id);
        return view('backend.receptionist.edit', compact('receptionist', 'configuration'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'nullable|string|min:6',
        ]);

        $admin = Admin::findOrFail($id);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
            'password_2' => $request->password ? $request->password : $admin->password_2,
            'role' => 'Admin',
        ]);

        return redirect()->route('receptionist.index')->with('success', 'Receptionist updated successfully.');
    }


    public function destroy($id)
    {
        $receptionist = Admin::findOrFail($id);
        $receptionist->delete();

        return redirect()->back()->with('success', 'Recepsionist deleted successfully.');
    }
}
