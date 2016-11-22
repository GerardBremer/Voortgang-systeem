<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class OpdrachtenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('opdrachten');
    }

    public function insert(Request $request){
      // Haal data uit text input velden en stop ze in variabelen 
      // voor later gebruik.
      $titel = $request->input('opdracht_titel');
      $type  = $request->input('opdracht_type');
      $beschrijving  = $request->input('opdracht_beschrijving');
      $leereenheden  = $request->input('opdracht_leereenheden');
      $deadline = $request->input('opdracht_deadline');
      $individueelgroep = $request->input('individueelgroepselect');
      $opdrachtlink = $request->input('opdracht_link');

// Array met de data voor de nieuwe opdracht en de kolommen 
// waar de data moet worden ingezet.
      
// Voor de pijl staat de kolom waar iets moet worden ingezet,
// Na de pijl staat de variabele die de tekst van de velden bevat.
$data = array("titel"=>"$titel","type"=>"$type", "beschrijving" => "$beschrijving", "leereenheden" => "$leereenheden", "deadline" => "$deadline", "individueelofgroepsopdracht" => "$individueelgroep", "link" => "$opdrachtlink");
// Tabel waar de data in moet worden gezet.
DB::table('opdrachten')->insert(array($data));

      return redirect('/opdrachten');
   }
}