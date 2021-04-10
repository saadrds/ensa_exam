<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Prof;
use App\Models\Filiere_contien_module;
use DB;

class ModuleController extends Controller
{
    public function Create(){
        $filieres = Filiere::select('*')->groupBy('NOM_FILIERE')->get();
        return view('createModule',["filieres"=>$filieres]);

    }

    public function Index(){
        $filieres = Filiere::select('*')->groupBy('NOM_FILIERE')->get();
        return view('Modules',["filieres"=>$filieres]);
    }
    public function Store(){
        $Module = new Module();
        $nom_module = request('nom_module');
        $Module->NOM_Module = $nom_module;
        $nomPrenomRespo = request("nom_respo");
        $profSelected = Prof::where('NOM_PROF',$nomPrenomRespo)->first();
        $Module->ID_PROF = $profSelected["ID_PROF"];
        $Module->ID_SEMESTRE = request('semestre');
        $Module->save();
        
        $modules = Module::where("NOM_MODULE",$nom_module)->first();
        $filieres = Filiere::where("NOM_FILIERE",request('nom_filiere'))->where('NIVEAU_FILIERE', request("select_niveau"))->first();
        $fil_cont_mod = new Filiere_contien_module();
        $fil_cont_mod->ID_MODULE = $modules["ID_MODULE"];
        $fil_cont_mod->ID_FILIERE = $filieres["ID_FILIERE"];
        $fil_cont_mod->save();
        return redirect("/Modules");
        //mzl id dial module li ylh inserina
    }

    public function getAllProfs(){
        $likee = request('like')."%";
        $profs = Prof::where('NOM_PROF', 'like', $likee)->orWhere('PRENOM_PROF', 'like', $likee)->get();
        return view('getAllProfs',["profs"=>$profs]);

    }
    public function getAllProfs2(){
        $likee = "equest('like') "."T%";
        $profs = Prof::where('NOM_PROF', 'like', $likee)->orWhere('PRENOM_PROF', 'like', $likee)->get();
        return view('getAllProfs',["profs"=>$profs]);

    }

    public function allModules(){
        $modules = DB::table('Modules')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->where("Modules.ID_SEMESTRE","1")
        ->where("Filieres.NOM_FILIERE",request("filiere"))
        ->get();
        return view('allModules',["modules"=>$modules]);
    }
    public function allModules2(){
        $modules = DB::table('Modules')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->where("Modules.ID_SEMESTRE","1")
        ->where("Filiere.NOM_FILIERE","Genie Informatique")
        ->get();
        return view('allModules',["modules"=>$modules]);
    }
    
}
