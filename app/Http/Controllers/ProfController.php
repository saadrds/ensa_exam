<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Prof;
use App\Models\Departement;
class ProfController extends Controller
{
    //
    public function Index(){
        $departement = Departement::all();
        return view('ProfView',["departement"=>$departement]);
    }
    public function liste(){

    $prof = DB::table('Profs')->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->select('Profs.*', 'Departements.*')->get();

        return view('ProfViewListe',["prof"=>$prof],);
    }

    public function Store(){
        $prof = new Prof();
        $prof->NOM_PROF = request('nom');
        $prof->PRENOM_PROF = request('prenom');
        $prof->EMAIL = request('email');
        $prof->ID_DEP = request('dep');

        $prof->save();
        return redirect('/');
    }

}
