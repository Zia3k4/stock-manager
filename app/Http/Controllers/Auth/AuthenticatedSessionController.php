<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return View::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

        if ($user->hasPermissionTo('dashboard.gerente')) {
            return redirect()->route('dashboard.gerente.home');
        }
        if ($user->hasPermissionTo('dashboard.supervisor1')) {
            return redirect()->route('dashboard.supervisor1.home');
        }
        if ($user->hasPermissionTo('dashboard.supervisor2')) {
            return redirect()->route('dashboard.supervisor2.home');
        }


        // fallback se não tiver nenhuma permissão
        Auth::logout();
        return redirect('/')->withErrors(['Você não tem permissão para acessar nenhum painel.']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Limpa todos os cookies da resposta
        $response = redirect('/login');
        foreach ($request->cookies as $cookie => $value) {
            $response->headers->setCookie(cookie()->forget($cookie));
        }

        return $response;

    }
}
