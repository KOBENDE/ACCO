<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Demandes; 

class DashboardController extends Controller
{
    

    public function index()
    {
        // Récupérer les demandes de l'utilisateur connecté
        $demandes = Demande::where('user_id', auth()->id())->get();
    
        // Retourner la vue avec la variable $demandes
        return view('dashboard', compact('demandes'));
        $demandes = Demande::where('user_id', auth()->id())->get() ?? collect();
    }
    
    
    
=======
use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
>>>>>>> dc59c1a289de40b4716f83c829e62c61b63aebf0
}
