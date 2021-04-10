<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Prof;
use App\Models\Filiere_contien_module;

class FiliereController extends Controller
{
    public function Index(){
        $filieres = Filiere::select('*')->groupBy('NOM_FILIERE')->get();
        return view('createFiliere',["filieres"=>$filieres]);
    }

    public function liste(){
        $filieres = Filiere::select('*')->groupBy('NOM_FILIERE')->get();
        return view('listerFiliere',["filieres"=>$filieres]);
    }
    
    public function Store(){

        $Filiere1 = new Filiere();
        $Filiere1->NOM_FILIERE = request('nom_filiere');
        $Filiere1->CHEF_FILIERE = request("nom_respo");
        $Filiere1->NIVEAU_FILIERE = "1";
        $Filiere1->save();
        $Filiere2 = new Filiere();
        $Filiere2->NOM_FILIERE = request('nom_filiere');
        $Filiere2->CHEF_FILIERE = request("nom_respo");
        $Filiere2->NIVEAU_FILIERE = "2";
        $Filiere2->save();
        $Filiere3 = new Filiere();
        $Filiere3->NOM_FILIERE = request('nom_filiere');
        $Filiere3->CHEF_FILIERE = request("nom_respo");
        $Filiere3->NIVEAU_FILIERE = "3";
        $Filiere3->save();
        return redirect('/listerFiliere');
    }

    public function getAllProfs(){
        $likee = request('like')."%";
        $profs = Prof::where('NOM_PROF', 'like', $likee)->orWhere('PRENOM_PROF', 'like', $likee)->get();
        return view('getAllProfs',["profs"=>$profs]);
    }
}
