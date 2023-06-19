<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();
        $AuthUser = User::where('id', $user_id);
        // dd($AuthUser);
        $text = "Kindly take note! You would have to pay your monthly dues to be able to have full access to this application.";

        return view('dashboard.home', compact(['AuthUser', 'text']));
    }


    public function profile_view()
    {
        return view('profile.profile');
    }

    public function dues_view()
    {
        return view('dashboard.dues');
    }

    public function conference_view()
    {
        return view('dashboard.conference');
    }


    public function resources_view()
    {
        return view('dashboard.resources');
    }


    public function chats_view()
    {
        return view('dashboard.chats');
    }


    public function shop_view()
    {
        return view('dashboard.shop');
    }

    public function dues_receipt_view()
    {
        return view('dashboard.dues-receipt');
    }
}
