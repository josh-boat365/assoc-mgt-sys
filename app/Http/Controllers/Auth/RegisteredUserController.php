<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => ['required', 'integer'],
            'association_id' => ['required', 'string', 'min:4', 'max:6', 'unique:' . User::class],
            'username' => ['required', 'string', 'min:6', 'max:12', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request);

        $username = $request->username;
        $email = $request->email;

        $body_of_mail = <<<EOD
        <p>
        Hello, <strong>$username</strong>!
        </p>
        <p>
        Thank you  for requesting access to the Association Management System
        </p>
        <p>
        Your account ($email) is undergoing a validity check, kindly have patience, your account will be approved by an Administrator within 24hrs.
        </p>
        <p>
        If you have any questions, please contact us at <a href="mailto:kwame.nyarko365@gmail.com">support@asm.org</a>.
        </p>
        <p>
        Thanks,
        </p>
        <p>
        The ASM Team
        </p>

        EOD;

        $user = User::create([
            'association_id' => $request->association_id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        event(new Registered($user));

        $this->sendmail($email, $body_of_mail);

        // Auth::login($user);

        return redirect()->route('login')->with('status', "Account created successfully");
        // return redirect()->back()->with('success','Thanks for registering, your account will be approved within 24hrs.Check your email afterwards.');
    }

    public function sendmail($email, $body)
    {
        $mailData = [
            'title' => 'Account Validation Check',
            'body' => $body,
        ];

        Mail::to($email)->send(new SendMail($mailData));
    }
}
