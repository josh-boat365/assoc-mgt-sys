<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

         //kick out unauthorized users
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            $primaryUser = 4;


            if($role != $primaryUser){
                return redirect('/login');
            }

        }

        $user_id = Auth::id();
        $AuthUser = User::where('id', $user_id);
        // dd($AuthUser);

        return view('user.home', compact(['AuthUser']));
    }


    public function profile_view()
    {
        $userInterests = explode(',',Auth::user()->area_of_interests );

        $academicQualifications = explode(',',Auth::user()->academic_qualification);

        return view('profile.profile', compact(['userInterests', 'academicQualifications']));
    }

    public function dues_view()
    {
        return view('user.dues');
    }

    public function chats_view()
    {
        return view('user.chats');
    }


    public function shop_view()
    {
        return view('user.shop');
    }


}
