<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function resources_view(){
        return view('admin.resources');
    }

    public function resources_table(){
        return view('admin.resources-table');
    }

     public function add_resource(Request $request)
    {
        $request->validate([
            'title' => ['string'],
            'description' => ['string'],
            'link' => ['string']
        ]);
        
    }
}
