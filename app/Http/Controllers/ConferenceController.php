<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    protected $pk = 'pk_test_922d3fd3b930d333716fb93796521ed111839d77';
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('user.conference');
    }


    public function conference_view_receipt()
    {

        return view('user.conference-receipt');
    }

    public function register_conference_view()
    {
         $ps_pk = $this->pk;

        return view('user.conference-registration', compact(['ps_pk']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        //
    }
}
