<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LeereenhedenController extends Controller
{
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('leereenheden');
    }

    public function insert(Request $request){
      // Haal data uit text input velden en stop ze in variabelen 
      // voor later gebruik.
      $Naam = $request->input('leereenheid_naam');
      $NLQF  = $request->input('leereenheid_nlqf');
      $Opdrachten  = $request->input('leereenheid_opdracht');

// Array met de data voor de nieuwe opdracht en de kolommen 
// waar de data moet worden ingezet.
      
// Voor de pijl staat de kolom waar iets moet worden ingezet,
// Na de pijl staat de variabele die de tekst van de velden bevat.
$data = array("Naam"=>"$Naam","NLQF"=>"$NLQF","Opdrachten"=>"$Opdrachten");

// Tabel waar de data in moet worden gezet.
DB::table('leereenheden')->insert(array($data));
 return redirect('/leereenheden');
   }
   
}
