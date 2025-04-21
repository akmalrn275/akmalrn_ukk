<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Backend\CategoryService;
use App\Models\Backend\Configuration;
use App\Models\Backend\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $usersTotal = User::count();
        $receptionistsTotal = Admin::where('role', 'Admin')->count();
        $roomsTotal = CategoryService::count();
        $bookedsTotal = Service::where('status', 'Booked')->count();
        return view('backend.index', compact('configuration', 'usersTotal', 'receptionistsTotal', 'roomsTotal', 'bookedsTotal'));
    }
}
