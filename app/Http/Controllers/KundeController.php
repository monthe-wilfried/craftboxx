<?php

namespace App\Http\Controllers;

use App\Kunde;
use Illuminate\Http\Request;

class KundeController extends Controller
{
    // Zeig alle Kunden
    public function index(){
        $kunden = Kunde::orderBy('nachname', 'desc')->paginate(10);
        return view('home', compact('kunden'));
    }
}
