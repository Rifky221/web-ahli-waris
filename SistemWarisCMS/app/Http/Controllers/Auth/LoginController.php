<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Generate a random security code and store it in session.
     */
    protected function generateSecurityCode(Request $request): string
    {
        $code = Str::upper(Str::random(5));
        $request->session()->put('security_code', $code);
        return $code;
    }

    public function showLoginForm()
    {
        // Ensure security code exists when showing the login form
        if (!session()->has('security_code')) {
            $this->generateSecurityCode(request());
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate input including security_code, but don't pass it to Auth::attempt
        $validated = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'security_code' => ['required', 'string'],
        ]);

        // Validate security code against the session value
        $inputCode = Str::upper($validated['security_code'] ?? '');
        $sessionCode = Str::upper($request->session()->get('security_code', ''));

        if ($inputCode !== $sessionCode) {
            // Regenerate a new code to prevent reuse
            $this->generateSecurityCode($request);
            return back()->withErrors([
                'security_code' => 'Kode keamanan tidak cocok.',
            ])->withInput($request->except('password'));
        }

        // Ensure database connection is available before attempting authentication
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            return back()->withErrors([
                'username' => 'Database tidak tersambung. Pastikan MySQL berjalan dan konfigurasi .env benar.',
            ])->withInput($request->except('password'));
        }

        // Only use username and password for authentication
        $credentials = $request->only('username', 'password');

        try {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
        } catch (\Throwable $e) {
            return back()->withErrors([
                'username' => 'Terjadi kesalahan saat autentikasi: '.$e->getMessage(),
            ])->withInput($request->except('password'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Refresh security code via ajax.
     */
    public function refreshSecurityCode(Request $request)
    {
        $code = $this->generateSecurityCode($request);
        return response()->json(['code' => $code]);
    }
}
