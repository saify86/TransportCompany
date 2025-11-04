<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Route;
use App\Models\Transport;
use Illuminate\Http\Request;
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
        return view('trips.create', [
            'routes'     => Route::orderBy('name')->get(),
            'transports' => Transport::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'route_id'     => ['required','integer','exists:route,id'],
            'transport_id' => ['required','integer','exists:transport,id'],
            'departure_at' => ['required','date'],
            'arrival_at'   => ['required','date','after:departure_at'],
        ]);

        Trip::create($validated);

        return redirect('/trips')->with('ok', 'Рейс создан');
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
        return view('trips.edit', [
            'trip'       => Trip::findOrFail($id),
            'routes'     => Route::orderBy('name')->get(),
            'transports' => Transport::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'route_id'     => ['required','integer','exists:route,id'],
            'transport_id' => ['required','integer','exists:transport,id'],
            'departure_at' => ['required','date'],
            'arrival_at'   => ['required','date','after:departure_at'],
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update($validated);

        return redirect('/trips')->with('ok', 'Рейс обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Trip::destroy($id);
        return redirect('/trips')->with('ok', 'Рейс удалён');
    }
    public function showUsersM2M(string $id)
    {
        $trip = Trip::with('usersMany')->find($id);
        return view('trips.users', compact('trip'));
    }
}
