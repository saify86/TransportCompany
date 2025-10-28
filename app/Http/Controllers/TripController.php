<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::with(['route','transport'])
            ->withSum('cargo as total_cargo_weight_kg', 'weight_kg')
            ->orderBy('id')
            ->get();

        return view('trips.index', compact('trips'));
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
    public function show(string $id)
    {
        $trip = Trip::with(['route','transport','cargo.user'])
            ->withSum('cargo as total_cargo_weight_kg', 'weight_kg')
            ->find($id);

        return view('trips.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showUsersM2M(string $id)
    {
        $trip = Trip::with('usersMany')->find($id);
        return view('trips.users', compact('trip'));
    }
}
