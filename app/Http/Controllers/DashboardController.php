<?php

namespace App\Http\Controllers;

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
    
    
    
}
