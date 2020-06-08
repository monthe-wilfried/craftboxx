<?php

namespace App\Http\Controllers;

use App\Kunde;
use Illuminate\Http\Request;

class KundeController extends Controller
{
    // alle Kunden anzeigen
    public function index(){
        $kunden = Kunde::orderBy('nachname', 'desc')->paginate(10);
        return view('home', compact('kunden'));
    }

    // einen Kundendatensatz speichern
    public function store(Request $request){
        $this->validate($request, [
            'vorname' => 'required',
            'nachname' => 'required'
        ]);

        $inputs = $request->except('gewerblicher_kunde');
        if ($request->gewerblicher_kunde){
            $inputs['gewerblicher_kunde'] = 1;
        }
        else{
            $inputs['gewerblicher_kunde'] = 0;
        }

        Kunde::create($inputs);
        return redirect()->back()->with('success', 'Kunde erfolgreich erstellt.');

    }

}
