<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            if (User::count() === 0) {
                return redirect('/register');
            } else {
                return redirect('/login');
            }
        } else {
            // je récupère toutes les données nécessaires
            $annoncesToSell = Annonce::where('status', 0)->get();
            $annoncesSold = Annonce::where('status', 1)->get();
            $users = User::all();

            // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
            return view('admin/index', [
                'annoncesToSell' => $annoncesToSell,
                'annoncesSold' => $annoncesSold,
                'users' => $users,
            ]);
        }
    }
}
