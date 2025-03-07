<?php

namespace App\Http\Controllers;

use App\Models\Kafe;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function index()
    {
        $data = Menu::all();
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Kafe $kafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kafe $kafe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kafe $kafe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kafe $kafe)
    {
        //
    }
}
