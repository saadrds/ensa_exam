<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class ModuleController extends Controller
{
    public function Create(){
        $filieres = Filiere::all();
        return view('createModule',["filieres"=>$filieres]);

    }
}
