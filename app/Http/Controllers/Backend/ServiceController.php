<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Configuration;
use App\Models\Backend\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $configuration = Configuration::first();
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $visitorsQuery = Service::whereHas('user', function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'like', "%$search%");
            }
        });

        if ($startDate && $endDate) {
            $visitorsQuery->whereBetween('check_in_date', [$startDate, $endDate]);
        }

        $visitors = $visitorsQuery->orderByRaw("
            CASE
                WHEN status = 'Completed' THEN 1
                WHEN status = 'Cancelled' THEN 2
                ELSE 0
            END
        ")
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search, 'start_date' => $startDate, 'end_date' => $endDate]);

        return view('backend.visitor.index', compact('configuration', 'visitors'));
    }

    public function show($id)
    {
        $configuration = Configuration::first();
        $visitor = Service::findOrFail($id);
        return view('backend.visitor.show', compact('configuration', 'visitor'));
    }

    public function update(Request $request, $id)
    {
        $visitor = Service::findOrFail($id);
        $visitor->payment_status = $request->payment_status;
        $visitor->status = $request->status;
        $visitor->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function cancelled(Request $request, $id)
    {
        $visitor = Service::findOrFail($id);
        $visitor->payment_status = $request->payment_status;
        $visitor->status = $request->status;
        $visitor->save();

        return redirect()->back()->with('success', 'Kunjungan berhasil dibatalkan.');
    }
}
