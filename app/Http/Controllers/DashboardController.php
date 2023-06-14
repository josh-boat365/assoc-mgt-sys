<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user_id = Auth::id();
        $AuthUser = User::where('id',$user_id);
        // dd($AuthUser);
        $text = "Kindly take note! You would have to pay your monthly dues to be able to have full access to this application.";

        return view('dashboard.home', compact(['AuthUser', 'text']));
    }

    public function settings(){
        return view('profile.settings');
    }
}
