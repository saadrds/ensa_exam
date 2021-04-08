<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
class ProfController extends Controller
{
    //
    public function Index(){
        $prof = Prof::all();
        return view('ProfView',["prof"=>$prof]);
    }

    public function Store(){
        $prof = new Prof();
        $prof->NOM_PROF = request('nom');
        $prof->PRENOM_PROF = request('nom');
        $prof->EMAIL = request('email');
        $prof->ID_DEP = request('id_dep');
        $prof->save();
        return redirect('/');
    }

}
