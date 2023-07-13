<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:8192',
            'year' => 'required|max:40',
            'km' => 'required',
            'fuel' => 'required|max:1000',
            'title' => 'required|max:50',
            'description' => 'nullable',
            'status' => 'required|in:0,1',
        ]);

        $annonce = new Annonce();

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            $destinationPath = './images/annonces/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            $annonce->picture = $imageName;
        }

        $annonce->year = $request->year;
        $annonce->km = $request->km;
        $annonce->fuel = $request->fuel;
        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->status = $request->status;

        $annonce->save();

        return redirect()->route('Rhlmcabr0n')->with('message', 'Une annonce a été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
            'year' => 'required|max:40',
            'km' => 'required',
            'fuel' => 'required|max:1000',
            'title' => 'required|max:50',
            'description' => 'nullable',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            $destinationPath = './images/annonces/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            $annonce->picture = $imageName;
        }

        $annonce->year = $request->year;
        $annonce->km = $request->km;
        $annonce->fuel = $request->fuel;
        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->status = $request->status;
        if ($annonce->status == 1 && $annonce->getOriginal('status') == 0) {
            $annonce->date_sold = now();
        }

        $annonce->save();

        // return redirect()->route('Rhlmcabr0n?catalogueSold')->with('message', 'Modification de l\'annonce réussie');
        return redirect()->to(route('Rhlmcabr0n') . '#' . $request->catalogue)->with('message', 'Modification de l\'annonce réussie');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Annonce $annonce)
    {
        $annonce->delete();
        return redirect()->to(route('Rhlmcabr0n') . '#' . $request->catalogue)->with('message', 'Modification de l\'annonce réussie');
    }
}
