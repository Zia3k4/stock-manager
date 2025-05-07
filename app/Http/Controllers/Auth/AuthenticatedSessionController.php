<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $request->authenticate();

        $request->session()->regenerate();

        if (! Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors([
                'email' => 'As credenciais estão incorretas.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();
        //DASHBOARD DO GERENTE
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');

        //DASHBOARD DO SUPERVISOR 1
        } elseif ($user->hasRole('user')) {
            return redirect()->route('supervisor1.dashboard');
        //DASHBOARD DO SUPERVISOR 2
        } elseif ($user->hasRole('user')) {
            return redirect()->route('supervisor2.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
