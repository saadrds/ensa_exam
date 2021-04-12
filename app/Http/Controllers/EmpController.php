<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
use App\Models\Annee;
use App\Models\Departement;
use DB;
use PDF;

class EmpController extends Controller
{
    public function getDataToPDF(){
        
        $profs = Prof::select('*')->get();
        $annees = Annee::select('*')->get();
        
        return view('pdf',["profs"=>$profs,"annees"=>$annees]);
    }
    public function generateData(){
        $selonAnnee = DB::table('Modules')
        ->join('Exams', 'Modules.ID_MODULE', '=', 'Exams.ID_MODULE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Prof_surves', 'Local_reservs.ID_LOCAL_RESERV', '=', 'Prof_surves.ID_LOCAL_RESERV')
        ->where('Exams.NOM_ANNEE',request("annee"))
        ->where('Prof_surves.NOM_Prof',request("prof"))
        ->select('*')
        ->get();

        return view('/pdfTable',["selonAnnee"=> $selonAnnee]);
    }
    public function generateData2(){
        $selonAnnee = DB::table('Profs')
        ->join('Modules', 'Profs.ID_PROF', '=', 'Modules.ID_PROF')
        ->join('Exams', 'Modules.ID_MODULE', '=', 'Exams.ID_MODULE')
        ->join('Local_reservs', 'Local_reservs.ID_EXAM', '=', 'Exams.ID_EXAM')
        ->join('Locals', 'Local_reservs.ID_LOCAL_RESERV', '=', 'Locals.ID_LOCAL_RESERV')
        ->where('Exams.NOM_ANNEE',"2021/2022")
        ->where('Profs.NOM_Prof',"bouarifi")
        ->select('*')
        ->get();

        return view('/pdfTable',["selonAnnee"=> $selonAnnee]);
    }
    
    public function downloadPDF(){
        $profs = DB::table('Profs')->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->select('Profs.*', 'Departements.*')->orderby('Departements.ID_DEP')->get();
        $annees = Annee::select('*')->get();

        $pdf = PDF::loadView('pdf',["profs"=>$profs],);
        return $pdf->download('profs.pdf');
    }

}
