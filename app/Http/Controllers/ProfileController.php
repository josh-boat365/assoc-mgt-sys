<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $regions = [
            'Ahafo',
            'Ashanti',
            'Bono East',
            'Brong Ahafo',
            'Central',
            'Eastern',
            'Greater Accra',
            'North East',
            'Oti',
            'Savannah',
            'Upper East',
            'Upper West',
            'Western',
            'Western North',
            'Volta',
        ];

        return view('profile.edit', [
            'user' => $request->user(),
            'regions' => $regions
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // dd($request);

        $request->validate([
            'association_id' => ['string', 'min:4'],
            'firstname' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'username' => ['string', 'min:6', 'max:12'],
            'email' => ['email', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'tin' => ['string', 'max:20'],
            'gender' => ['string', 'max:255'],
            'date_of_birth' => ['string', 'max:255'],
            'region_of_company' => ['string', 'max:255'],
            'area_of_interests' => ['string', 'max:255'],
            'regions_of_company' => ['string', 'max:255'],
            // 'profile_image' => ['image', 'mimes:png,jpg,jpeg'],
            'company_name' => ['string', 'max:255'],
            'company_address' => ['string', 'max:255'],
            'primary_contact' => ['string', 'min:10', 'max:10'],
            'secondary_contact' => ['string', 'min:10', 'max:10'],
            // 'onboard_date' => ['integer'],
            'academic_qualification' => ['string', 'max:255'],
        ]);
        // $request->user()->fill($request->validate());
        $user = Auth::user();

        //get extension of image
        // $image_ext = $request->profile_image->getClientOriginalExtension();
        //get current date
        // $date = date('Y-m-d');
        // $image_name = $request->association_id . '_' . $date .  '.' . $image_ext;
        //save image to public/images folder
        // $request->profile_image->move(public_path('images'),$image_name);

        //check if at least one input field is filled then update form
        // $association_id = $request->association_id;

        if(
            !empty($request->firstname) ||  !empty($request->surname) || !empty($request->username) || !empty($request->email) ||
            !empty($request->gender) || !empty($request->tin) || !empty($request->company_name) || !empty($request->company_address) || !empty($request->date_of_birth) ||
            !empty($request->region_of_company) || !empty($request->area_of_interests) || !empty($request->primary_contact) || !empty($request->secondary_contact) || !empty($request->academic_qualification)
        ){
        User::find($user->id)->update($request->all());
        $request->user()->save();

        }

        return Redirect::route('profile.edit')->with('status', 'Account profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
