<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $apiKey = "3d52e161e9834988a183c960a5520970";
        $email = $request->email;

        try {
            $response = Http::get("https://emailvalidation.abstractapi.com/v1/", [
                'api_key' => $apiKey,
                'email' => $email
            ]);

            $result = $response->json();

            if (
                !isset($result['is_valid_format']['value']) ||
                !$result['is_valid_format']['value'] ||
                $result['deliverability'] !== 'DELIVERABLE'
            ) {
                return back()->withErrors(['email' => 'Email tidak valid atau tidak aktif.'])
                             ->with('swalError', 'true')
                             ->with('anchor', '#register');
            }
        } catch (\Exception $e) {
            Log::error("Gagal validasi email: " . $e->getMessage());

            return back()->withErrors(['email' => 'Gagal memverifikasi email. Coba lagi nanti.'])
                         ->with('swalError', 'true')
                         ->with('anchor', '#register');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect()->route('verification.notice')
                         ->with('success', 'Registrasi berhasil!.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if (is_null($user->email_verified_at)) {
                Auth::login($user);

                return redirect()->route('verification.notice');
            }

            Auth::login($user);
            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout berhasil.');
    }
}
