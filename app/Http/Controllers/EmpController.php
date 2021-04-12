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
        $profs = DB::table('Profs')->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->select('Profs.*', 'Departements.*')->orderby('Departements.ID_DEP')->get();

        $annees = Annee::select('*')->get();
        
        return view('pdf',["profs"=>$profs,"annees"=>$annees]);
    }
    
    public function downloadPDF(){
        $profs = DB::table('Profs')->join('Departements', 'Profs.ID_DEP', '=', 'Departements.ID_DEP')
        ->select('Profs.*', 'Departements.*')->orderby('Departements.ID_DEP')->get();
        $annees = Annee::select('*')->get();

        $pdf = PDF::loadView('pdf',["profs"=>$profs],);
        return $pdf->download('profs.pdf');
    }

}
