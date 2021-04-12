<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Prof;
use App\Models\Filiere_contien_module;
use App\Models\Annee;
use App\Models\Exam;
use App\Models\Reservation;

use PDF;
use DB;

class CalandrierController extends Controller
{

    public function walo(){

        return view('ExamenTable');
    }

    public function walotraitemant(){
        $annee = request("annee");
        $filiere = request("filiere");
        $niveau = request("niveau");
        $semestre = request("semestre");
        $ds = request("ds");

        $calandriers = DB::table('Modules')
        ->join('Exams', 'Exams.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Semestres', 'Semestres.ID_SEMESTRE', '=', 'Modules.ID_SEMESTRE')
        ->join('Annees', 'Annees.ID_ANNEE', '=', 'Semestres.ID_ANNEE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Reservations', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
        ->join('Locals', 'Locals.NOM_LOCAL', '=', 'Local_reservs.NOM_LOCAL')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        //->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
        ->groupBy('NOM_MODULE')
        ->select('*')
        ->get();
        return view('ExamenTable',["calandriers"=>$calandriers]);

        
        
    }

    public function walotraitemant3(){
        $annee = request("annee");
        $filiere = request("filiere");
        $niveau = request("niveau");
        $semestre = request("semestre");
        $ds = request("ds");

        $calandriers = DB::table('Modules')
        ->join('Exams', 'Exams.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Semestres', 'Semestres.ID_SEMESTRE', '=', 'Modules.ID_SEMESTRE')
        ->join('Annees', 'Annees.ID_ANNEE', '=', 'Semestres.ID_ANNEE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Reservations', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
        ->join('Locals', 'Locals.NOM_LOCAL', '=', 'Local_reservs.NOM_LOCAL')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
        ->get();
        return view('localServ',["calandriers"=>$calandriers]);
    }

    public function walotraitemant2(){
        $annee = "2020-2021";
        $filiere = "Génie informatique";
        $niveau = 1;
        $semestre = 1;
        $ds = "DS1";

        $calandriers = DB::table('Modules')
        ->join('Exams', 'Exames.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Semestres', 'Semestres.ID_SEMESTRE', '=', 'Modules.ID_SEMESTRE')
        ->join('Annees', 'Annees.ID_ANNEE', '=', 'Semestres.ID_ANNEE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Reservations', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
        ->join('Locals', 'Locals.NOM_LOCAL', '=', 'Local_reservs.NOM_LOCAL')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
        ->where("Filieres.NOM_FILIERE",$filiere)
        ->where("Filieres.NIVEAU_FILIERE",$niveau)
        ->where("Exams.NOM_ANNEE",$annee)
        ->where("Semestres.ID_SEMESTRE",$semestre)
        ->where("Exams.TYPE",$ds)
        ->select('*')
        ->get();
        return view('ExamenTable',["calandriers"=>$calandriers]);
    }

    public function Calandrier(){
        
        $filieres = Filiere::select('*')->groupBy('NOM_FILIERE')->get();
        $annees = Annee::select('*')->get();

        return view('Calandrier',["filieres"=>$filieres, "annees"=>$annees]);
    }
    public function getExams(){
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
     
    }

    public function downloadPDFex(){

        $annee = request("annee");
        $filiere = request("filiere");
        $niveau = request("niveau");
        $semestre = request("semestre");
        $ds = request("ds");

        $calandriers = DB::table('Modules')
        ->join('Exams', 'Exams.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Semestres', 'Semestres.ID_SEMESTRE', '=', 'Modules.ID_SEMESTRE')
        ->join('Annees', 'Annees.ID_ANNEE', '=', 'Semestres.ID_ANNEE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Reservations', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
        ->join('Locals', 'Locals.NOM_LOCAL', '=', 'Local_reservs.NOM_LOCAL')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        //->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
        ->where("Filieres.NOM_FILIERE",$filiere)
        ->where("Filieres.NIVEAU_FILIERE",$niveau)
        ->where("Exams.NOM_ANNEE",$annee)
        ->where("Semestres.ID_SEMESTRE",$semestre)
        ->where("Exams.TYPE",$ds)
        ->groupBy('NOM_MODULE')
        ->select('*')
        ->get();
        $pdf = PDF::loadView('ExamenTable',["calandriers"=>$calandriers]);
        return $pdf->download('calandriers.pdf');
    }
    
}
