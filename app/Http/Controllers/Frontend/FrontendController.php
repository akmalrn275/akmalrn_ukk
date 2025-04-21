<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\About;
use App\Models\Backend\Blog;
use App\Models\Backend\CategoryService;
use App\Models\Backend\Configuration;
use App\Models\Backend\Gallery;
use App\Models\Backend\History;
use App\Models\Backend\ImageCategoryService;
use App\Models\Backend\Service;
use App\Models\Backend\Slider;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\BookingConfirmed;

class FrontendController extends Controller
{
    public function index()
    {
        $configuration = Configuration::first();
        $about = About::first();
        $sliders = Slider::all();
        $gallerys = Gallery::orderBy('created_at', 'desc')->limit(8)->get();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        $rooms = CategoryService::orderBy('created_at', 'desc')->limit(3)->get();
        foreach ($rooms as $room) {
            $today = Carbon::today();

            $serviceStatus = Service::where('category_service_id', $room->id)
                ->whereDate('check_in_date', $today)
                ->whereIn('status', ['Booked', 'Completed'])
                ->exists();

            $room->serviceStatus = $serviceStatus ? 'Tidak Tersedia' : 'Tersedia';
        }
        return view('frontend.index', compact('configuration', 'about', 'sliders', 'gallerys', 'blogs', 'rooms', 'serviceStatus'));
    }

    public function about()
    {
        $configuration = Configuration::first();
        $about = About::first();
        $gallerys = Gallery::orderBy('created_at', 'desc')->limit(8)->get();
        $historys = History::orderBy('created_at', 'desc')->get();
        return view('frontend.about', compact('configuration', 'about', 'gallerys', 'historys'));
    }

    public function blog()
    {
        $configuration = Configuration::first();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blogs', compact('configuration', 'blogs'));
    }

    public function gallery()
    {
        $configuration = Configuration::first();
        $gallerys = Gallery::all();
        return view('frontend.gallerys', compact('configuration', 'gallerys'));
    }

    public function contact()
    {
        $configuration = Configuration::first();
        return view('frontend.contact', compact('configuration'));
    }

    public function room()
    {
        $configuration = Configuration::first();
        $rooms = CategoryService::orderBy('created_at', 'desc')->get();
        foreach ($rooms as $room) {
            $today = Carbon::today();

            $serviceStatus = Service::where('category_service_id', $room->id)
                ->whereDate('check_in_date', $today)
                ->whereIn('status', ['Booked', 'Completed'])
                ->exists();

            $room->serviceStatus = $serviceStatus ? 'Tidak Tersedia' : 'Tersedia';
        }
        return view('frontend.rooms', compact('configuration', 'rooms', 'serviceStatus'));
    }

    public function detail_room($id)
    {
        $configuration = Configuration::first();
        $room = CategoryService::findOrFail($id);

        $today = Carbon::today();
        $endDate = $today->copy()->addDays(14);

        $unavailableDates = Service::where('category_service_id', $id)
            ->whereBetween('check_in_date', [$today, $endDate])
            ->whereIn('status', ['Booked', 'Completed'])
            ->pluck('check_in_date')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y-m-d');
            })
            ->toArray();

        $availableDates = [];
        for ($date = $today->copy(); $date->lte($endDate); $date->addDay()) {
            if (!in_array($date->format('Y-m-d'), $unavailableDates)) {
                $availableDates[] = $date->format('Y-m-d');
            }
        }

        $isBookedToday = in_array($today->format('Y-m-d'), $unavailableDates);
        $room->serviceStatus = $isBookedToday ? 'Tidak Tersedia' : 'Tersedia';

        $image = ImageCategoryService::where('category_service_id', $id)->get();

        return view('frontend.detail_room', compact('configuration', 'room', 'availableDates', 'image'));
    }

    public function booking(Request $request)
    {
        $request->validate([
            'category_service_id' => 'required|exists:categorys_services,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guest_count' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
        ]);

        $existingBooking = Service::where('category_service_id', $request->category_service_id)
            ->whereDate('check_in_date', $request->check_in_date)
            ->exists();

        if ($existingBooking) {
            return redirect()->back()->with('errorBooking', 'Booking pada tanggal ini untuk kategori layanan ini sudah penuh!');
        }

        $service = Service::create([
            'user_id' => Auth::id(),
            'category_service_id' => $request->category_service_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guest_count' => $request->guest_count,
            'special_requests' => $request->special_requests,
            'payment_method' => 'Cash',
            'payment_status' => 'Pending',
            'status' => 'Booked',
        ]);

        $qrCodePng = QrCode::format('png')->size(200)->generate('Booking ID: ' . $service->id);
        $qrPath = storage_path('app/qrcodes/booking_' . $service->id . '.png');

        if (!file_exists(dirname($qrPath))) {
            mkdir(dirname($qrPath), 0755, true);
        }

        file_put_contents($qrPath, $qrCodePng);

        $service->qr_code = base64_encode($qrCodePng);
        $service->save();

        $pdf = Pdf::loadView('frontend.booking', [
            'service' => $service,
            'qrCode' => 'data:image/png;base64,' . base64_encode($qrCodePng),
        ]);
        $pdfContent = $pdf->output();

        Mail::to(Auth::user()->email)->send(new BookingConfirmed($service, $pdfContent, $qrPath));

        return back()->with('success', 'Booking berhasil! Detail sudah dikirim ke email.');
    }

    public function show_booking($id)
    {
        $booking = Service::findOrFail($id);
        return view('frontend.booking-detail', compact('booking'));
    }

    public function register()
    {
        $configuration = Configuration::first();
        return view('frontend.auth.register', compact('configuration'));
    }

    public function login()
    {
        $configuration = Configuration::first();
        return view('frontend.auth.login', compact('configuration'));
    }

    public function detail_blog($id)
    {
        $configuration = Configuration::first();
        $blog = Blog::findOrFail($id);
        $latestBlogs = Blog::orderBy('created_at', 'desc')->limit(5)->get();
        return view('frontend.detail_blog', compact('configuration', 'blog', 'latestBlogs'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        if (!$query) {
            return response()->json(['message' => 'Query is required.'], 400);
        }

        $blogs = Blog::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'LIKE', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($blog) {
                $blog->image = asset($blog->image);
                return $blog;
            });

        if ($blogs->isEmpty()) {
            return response()->json(['message' => 'No blogs found.'], 404);
        }

        return response()->json($blogs);
    }

    public function verify()
    {
        $configuration = Configuration::first();
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/')->with('info', 'Email kamu sudah diverifikasi.');
        }

        return view('frontend.auth.verify-email', compact('configuration'));
    }

    public function confirmBooking($id)
    {
        $service = Service::findOrFail($id);

        if ($service->status === 'Confirmed') {
            return view('booking.already_confirmed', ['service' => $service]);
        }

        $service->status = 'Confirmed';
        $service->save();

        return view('frontend.booking-success', ['service' => $service]);
    }
}
