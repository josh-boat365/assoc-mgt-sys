<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        $superAdmin = 1;
        $associateAdmin = 2;
        $juniorAdmin = 3;
        $primaryUser = 4;

         if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role == $superAdmin) {
                return redirect()->route('admin.home');
                // return $next($request);
            } else {
                return redirect()->route('user.home');
            }
        }

        return redirect()->back()->with('status', "You don't have access to this application");


        // return redirect()->intended(RouteServiceProvider::HOME);
        //  return redirect()->route('admin.home');
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

    //  protected function userIs($roleType){
    //     User::where('role',$roleType);
    // }
}
