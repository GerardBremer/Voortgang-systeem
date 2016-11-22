<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function uitnodigen(Request $request){
        // Haal data uit text input velden en stop ze in variabelen
        // voor later gebruik.
        $rol = $request->input('rol');
        $opdracht  = $request->input('opdracht');
        $email  = $request->input('email');

// Array met de data voor de nieuwe opdracht en de kolommen
// waar de data moet worden ingezet.

// Voor de pijl staat de kolom waar iets moet worden ingezet,
// Na de pijl staat de variabele die de tekst van de velden bevat.
        $data = array("rol"=>"$rol","opdracht"=>"$opdracht", "email" => "$email");
// Tabel waar de data in moet worden gezet.
        DB::table('feedback')->insert(array($data));

        return redirect('/feedback');
    }

    public function insert(Request $request){
        // Haal data uit text input velden en stop ze in variabelen
        // voor later gebruik.
        $feedback = $request->input('feedback_beschrijving');

// Array met de data voor de nieuwe opdracht en de kolommen
// waar de data moet worden ingezet.

// Voor de pijl staat de kolom waar iets moet worden ingezet,
// Na de pijl staat de variabele die de tekst van de velden bevat.
        $data2 = array("feedback"=>"$feedback");

// Tabel waar de data in moet worden gezet.
        DB::table('feedback')
// Stop data in rij met aangegeven id
            ->where('id', 15)
// Update beschrijving veld met value van beschrijving tekstveld
            ->update(array('feedback' => "$feedback"));
        return redirect('/feedback');
    }

    /**
     * @destroy Function that finds id from table feedback,
     * Goes to 404/error page if nothing is found. Returns view feedback.
     * @author Rienk
     */

    public function destroy($id)
    {

        $model = Feedback::findOrFail($id);
        $model->delete();

        return redirect('/feedback');
    }
}
