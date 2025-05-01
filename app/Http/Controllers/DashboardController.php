<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (isset($user->role_id)){
            switch ($user->role->id) {
                case '1':
                    return view('dashboard.admin', compact('user'));
                case '3':
                    return view('dashboard.enseignant', compact('user'));
                case '2':
                    return view('dashboard.etudiant', compact('user'));
                default:
                    abort(403, 'Accès refusé');
            }
        }
    }
}

