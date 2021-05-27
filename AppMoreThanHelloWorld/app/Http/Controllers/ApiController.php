<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;

class ApiController extends Controller
{



    public function apiget() {

        $questionsdatabase=question::get();
        $questions=[];
        for  ($i = 0; $i < sizeof($questionsdatabase); $i++){
            $questions[$i]=($questionsdatabase[$i]->enonce);

        }

        return response()->json($questions);

    }

    public function apipost(Request $request) {

        $unequestion = new question();
        $unequestion->enonce = $request->input("enonce");
        $unequestion->ordre = $request->input("ordre");
        $unequestion->type = $request->input("type");
        $unequestion->idChapitre = 1;
        $unequestion->idImage= 1;
        $unequestion->save();

    }


}
