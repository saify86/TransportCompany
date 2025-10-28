<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'asc')->get();
        return view('routes.index', compact('routes'));
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
        $route = Route::with('trips.transport')->find($id);
        return view('routes.show', compact('route'));
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
    public function showTransportsM2M(string $id)
    {
        $route = Route::with('transportsMany')->find($id);
        return view('routes.transports', compact('route'));
    }
}
