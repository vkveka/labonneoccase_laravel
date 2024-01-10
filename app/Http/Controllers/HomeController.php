<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $annoncesToSell = Annonce::where('status', 0)->get();
        $annoncesSold = Annonce::where('status', 1)->get();
        $annoncesSoldDesc = Annonce::where('status', 1)->orderBy('id', 'desc')->get();


        return view('home', [
            'annoncesToSell' => $annoncesToSell,
            'annoncesSold' => $annoncesSold,
            'annoncesSoldDesc' => $annoncesSoldDesc,
        ]);
    }
}
