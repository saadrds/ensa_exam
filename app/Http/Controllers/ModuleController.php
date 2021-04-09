<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Filiere_contien_module;

class ModuleController extends Controller
{
    public function Create(){
        $filieres = Filiere::all();
        return view('createModule',["filieres"=>$filieres]);

    }

    public function Index(){
        return view('Modules');
    }
    public function Store(){
        $Module = new Model();
        $Module->NOM_Module = request('nom_module');
        $Module->ID_PROF = request('nom_respo');
        $Module->ID_SEMESTRE = request('semestre');
        $Module->save();

        $fil_cont_mod = new Filiere_contien_module();
        $fil_cont_mod->ID_FILIERE = request('nom_filiere');
        //mzl id dial module li ylh inserina
        return redirect('/Module');
    }
}
