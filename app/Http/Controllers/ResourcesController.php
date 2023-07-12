<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function resources_form(){
        return view('admin.resources');
    }

    public function resources_table(){
        return view('admin.resources-table');
    }

     public function add_resource(Request $request)
    {
        $request->validate([
            'title' => ['required','string', 'max:155'],
            'description' => ['string', 'max:225'],
            'link' => ['required','string']
        ]);

        $resource = Resources::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);

         event(new Registered($resource));

         return back()->with('success', 'Resource created successfully');

    }

    public function show_resource()
    {

        $Resources = Resources::all();

        return view('user.resources', compact('Resources'));

    }


}
