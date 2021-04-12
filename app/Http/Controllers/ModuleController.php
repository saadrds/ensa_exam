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
use Illuminate\Support\Str;
use App\Models\Local;
use App\Models\Prof_surve;
use App\Models\Local_reserv;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExamMail;

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
        if($likee === "%"){
            return view('clearView');
        }
        else{
        return view('getAllProfs',["profs"=>$profs]);
    }

    }
    public function getAllProfs2(){
        $typeDS_local = request("typeDS_local");
        $annee= request("annee");
        $idModule = request("idModule");
        $likee = request('like')."%";

        $exam1 = Exam::where("ID_MODULE",$idModule)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDS_local)->first();
        $res1 = Reservation::where("ID_EXAM",$exam1->ID_EXAM)->first();
        

        $profResrve = DB::table('Reservations')
    ->join('Local_reservs', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
    ->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
    ->where('Reservations.ID_EXAM',$exam1->ID_EXAM)->Where('Reservations.FIN_RESERV','<', $res1->FIN_RESERV)->Where('Reservations.DEBUT_RESERV','>', $res1->DEBUT_RESERV)->get();
        if($likee === "%"){
            return view('clearView');
        }

        else{
            if($profResrve == null)
                return view('getAllProfs',["profs"=>$profs]);
            else{
            $array = array('foo' => 'bar');
            $var = 0;
            $i = 0;
            if($profResrve != null){
                foreach ($profs as $line) {
                    $i = $i + 1;
                    foreach ($profs as $col) {
                        if($line->NOM_PROF == $col->NOM_PROF){
                            $var = 1;
                        }
                }
                if($var == 0){
                    $array = array_add($array,$i, 'value'); 
                }
                return view('getAllProfs',["profs"=>$array,"profs_reserv"=> $profResrve]);
            }
            }
    }

    }
}

public function getAllProfs3(){
    $typeDS_local = "DS1";
    $annee= "2021/2022";
    $idModule = "20";
    $likee = "%";

    $exam1 = Exam::where("ID_MODULE",$idModule)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDS_local)->first();
    $res1 = Reservation::where("ID_EXAM",$exam1->ID_EXAM)->first();
    

    $profResrve = DB::table('Reservations')
    ->join('Local_reservs', 'Reservations.ID_RESERV', '=', 'Local_reservs.ID_RESERV')
    ->join('prof_surves', 'prof_surves.ID_LOCAL_RESERV', '=', 'Local_reservs.ID_LOCAL_RESERV')
    ->where('Reservations.ID_EXAM',$exam1->ID_EXAM)->Where('Reservations.FIN_RESERV','<', $res1->FIN_RESERV)->Where('Reservations.DEBUT_RESERV','>', $res1->DEBUT_RESERV)->get();
    if($likee === "%"){
        return view('clearView');
    }

    else{
        if($profResrve == null)
                return view('getAllProfs',["profs"=>$profs]);
            else{
        $array = array('foo' => 'bar');
        $var = 0;
        $i = 0;
        if($profResrve != null){
            foreach ($profs as $line) {
                $i = $i + 1;
                foreach ($profs as $col) {
                    if($line->NOM_PROF == $col->NOM_PROF){
                        $var = 1;
                    }
            }
            if($var == 0){
                $array = array_add($array,$i, 'value'); 
            }
            return view('getAllProfs',["profs"=>$array,"profs_reserv"=> $profResrve]);
        }
        }
}

}
}

    public function allModules(){
        $modules = DB::table('Modules')
        ->join('Filiere_contien_modules', 'Filiere_contien_modules.ID_MODULE', '=', 'Modules.ID_MODULE')
        ->join('Profs', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Filieres', 'Filieres.ID_FILIERE', '=', 'Filiere_contien_modules.ID_FILIERE')
        ->where("Modules.ID_SEMESTRE",request("semestre"))
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

    public function ModuleSelected($id) {
        $module = Module::where('ID_MODULE',$id)->first();
        $annees = Annee::all();
        if($module != null){
            return view('ModuleSelected',["module"=>$module, "annees"=>$annees]);
        }else{
            return abort(404);
        }
    }

    public function Exams(){
        $annee = request("annee");
        $id_module = request("id_module");
        $DS1 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS1")->first();
        $DS2 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS2")->first();
        $RATT = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","Rattrapage")->first();

        $EXAMDS1 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
        ->join("Local_reservs","Reservations.ID_RESERV","=","Local_reservs.ID_RESERV")
        ->join("Prof_surves","Prof_surves.ID_LOCAL_RESERV","=","Local_reservs.ID_LOCAL_RESERV")
        ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS1")->get();

        $EXAMDS2 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
        ->join("Local_reservs","Reservations.ID_RESERV","=","Local_reservs.ID_RESERV")
        ->join("Prof_surves","Prof_surves.ID_LOCAL_RESERV","=","Local_reservs.ID_LOCAL_RESERV")
        ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS2")->get();

        $EXAMRATT = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
        ->join("Local_reservs","Reservations.ID_RESERV","=","Local_reservs.ID_RESERV")
        ->join("Prof_surves","Prof_surves.ID_LOCAL_RESERV","=","Local_reservs.ID_LOCAL_RESERV")
        ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","RATT")->get();

        return view('exams',["DS1"=>$DS1, "DS2"=>$DS2, "RATT"=>$RATT,"EXAMDS1"=>$EXAMDS1,"EXAMDS2"=>$EXAMDS2,"EXAMRATT"=>$EXAMRATT]);
        
    }
    public function Exams2(){
        $annee = "2021/2022";
        $id_module = 19;
        $DS1 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS1")->first();
        $DS2 = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","DS2")->first();
        $RATT = DB::table("Exams")->join('Reservations',"Exams.ID_EXAM","=","Reservations.ID_EXAM")
            ->where('Exams.ID_MODULE',$id_module)->where("Exams.NOM_ANNEE",$annee)->where("Exams.TYPE","Rattrapage")->first();
        return view('exams',["DS1"=>$DS1, "DS2"=>$DS2, "RATT"=>$RATT]);
    }
    public function saveExam(){
        $annee = request("annee");
        $id_module = request("idModule");
        $typeDs = request("typeDS");
        $date_exam = request("date_exam");
        $debut_exam = request("debut_exam");
        $fin_exam = request("fin_exam");
        $empty = $empty = Str::contains(request("empty"), 'empty');
        
        $exam1 = Exam::where("ID_MODULE",$id_module)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDs)->first();
        if($exam1 == null){
            $exam1 = new Exam();
            $exam1->ID_MODULE = $id_module;
            $exam1->TYPE = $typeDs;
            $exam1->NOM_ANNEE = $annee;
            $exam1->save();
        }
        $exam = Exam::where("ID_MODULE",$id_module)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDs)->first();
        $id_exam = $exam->ID_EXAM;
        if($empty){
            $reservation = new Reservation();
            $reservation->DATE_RESERV = $date_exam;
            $reservation->DEBUT_RESERV = $debut_exam;
            $reservation->FIN_RESERV = $fin_exam;
            $reservation->NOM_ANNEE = $annee;
            $reservation->ID_EXAM = $id_exam;
            $reservation->save();
        }
        else{
            $reservation = Reservation::where("ID_EXAM",$id_exam)->where("NOM_ANNEE",$annee)->first();
            $reservation->DATE_RESERV = $date_exam;
            $reservation->DEBUT_RESERV = $debut_exam;
            $reservation->FIN_RESERV = $fin_exam;
            $reservation->save();
        }

        return view("clearView");

        
    }
    public function saveExam2(){
        $annee = "2021/2022";
        $id_module = "19";
        $typeDs = "DS1";
        $date_exam = "2021-04-02";
        $debut_exam ="23:30";
        $fin_exam = "00:30";
        $empty = Str::contains(request("empty"), 'empty');
        
        
        $exam = Exam::where("ID_MODULE",$id_module)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDs)->first();
        $id_exam = $exam->ID_EXAM;
        
            $reservation = Reservation::where("ID_EXAM",$id_exam)->where("NOM_ANNEE",$annee)->first();
            $reservation->DATE_RESERV = $date_exam;
            $reservation->DEBUT_RESERV = $debut_exam;
            $reservation->FIN_RESERV = $fin_exam;
            $reservation->save();
        

        return view("clearView",["id"=>$id_exam]);

        
    }   

    public function getLocals(){
        
        $locals = Local::all();
        return view("getLocals",["locals"=>$locals]);
    }
    public function getLocals2(){
        
        $typeDS_local = request("typeDS_local");
        $annee= request("annee");
        $idModule = request("idModule");
        $likee = request('like')."%";
        $typeDS_local = "DS1";
    $annee= "2021/2022";
    $idModule = "20";
    $likee = "%";

        $exam1 = Exam::where("ID_MODULE",$idModule)->where("NOM_ANNEE",$annee)->where("TYPE",$typeDS_local)->first();
        $res1 = Reservation::where("ID_EXAM",$exam1->ID_EXAM)->first();

        $locals2 = DB::table('Local_reservs')
        ->join('Reservations',"Reservations.ID_RESERV","=","Local_reservs.ID_RESERV")
        ->where('Reservations.DATE_RESERV',"=",$res1->DATE_RESERV)
        ->Where('Reservations.FIN_RESERV','<', $res1->FIN_RESERV)->orWhere('Reservations.DEBUT_RESERV','>', $res1->DEBUT_RESERV)->get();
        $locals = Local::all();
        $stack = [];
        //array_push($stack, "apple", "raspberry");
        if( count($locals2) != 0){
        foreach ($locals as  $line) {
            $i = 1;
            foreach ($locals2 as  $col) {
                if($line->NOM_LOCAL == $Line->NOM_LOCAL)
                {
                    $i = 0;
                }
                if($i == 1){
                    array_push($stack,$line->NOM_LOCAL);
                }
            }
        }
        return view("getLocals",["locals"=>$stack]);}
        else{
            return view("getLocals",["locals"=>$locals]);
        }
    }


    public function saveSalle(){
        $id_res = request("id_res");
        $local_selected = request("local_selected");
        $liste_surv = request("liste_surv");


        $reserv = Reservation::where("ID_RESERV",$id_res)->first();

        $id_exam =  $reserv->ID_EXAM;

        $local_res = new Local_reserv();
        $local_res->ID_EXAM = $id_exam;
        $local_res->ID_RESERV = $id_res;
        $local_res->NOM_LOCAL = $local_selected;
        $local_res->save();
        foreach($liste_surv as $variable){
            $prof = Prof::where("NOM_PROF",$variable)->first();
            //Mail::to($prof->EMAIL)->send(new ExamMail());
            $surv = new Prof_surve();
            $surv->ID_LOCAL_RESRV = $local_res->ID_LOCAL_RESRV;
            $surv->NOM_PROF = $variable;
        }

        return view("clearView");
    }
    public function saveSalle2(){
        $id_res = 1;
        $local_selected = "salle1";
        $liste_surv = ["ammar"];


        $reserv = Reservation::where("ID_RESERV",$id_res)->first();

        $id_exam =  $reserv->ID_EXAM;

        $local_res = new Local_reserv();
        $local_res->ID_EXAM = $id_exam;
        $local_res->ID_RESERV = $id_res;
        $local_res->NOM_LOCAL = $local_selected;
        $local_res->save();

        $newR = Local_reserv::where("ID_EXAM",$id_exam)->where("ID_RESERV",$id_res)->where("NOM_LOCAL",$local_selected)->first();
        foreach($liste_surv as $variable){
            $surv = new Prof_surve();
            $surv->ID_LOCAL_RESERV = $newR->ID_LOCAL_RESERV;
            $surv->NOM_PROF = $variable;
            $surv->save();
        }

        return view("clearView");
    }
    
}
