<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function index()
    {
        //kick out unauthorized users
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            $superAdmin = 1;


            if($role != $superAdmin){
                return redirect('/login');
            }

        }
        return view('admin.home');
    }

    public function register_admin_view()
    {
        return view('auth.register-admin');
    }

    public function register_admin(AdminRegister $request)
    {

        $request->validated();
        $username = $request->username;
        $email = $request->email;
        // dd($request);

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
            'role' => $request->role,
        ]);

        event(new Registered($user));

        $this->sendmail($email, $body_of_mail);

        // Auth::login($user);

        return redirect()->route('admin.home')->with('status','Account created successful login');
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
