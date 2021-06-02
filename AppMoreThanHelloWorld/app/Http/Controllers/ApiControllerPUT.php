<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ApiControllerPUT extends Controller
{


    public function updatequestion(Request $request) {

        $id=$request->input("id");

        question::find($id)->update(array(
            "enonce" => $request->input("newenonce"),
            "type" => $request->input("newtype"),
            "idEtape" => $request->input("newidEtape"),
            "idImage" => $request->input("newidImage"),
        ));
    }

    public function updateresponse(Request $request) {

        $id=$request->input("id");

        reponse::where("idReponse",$id)->update(array(
            "enonce" => $request->input("newenonce"),
            "statut" => $request->input("newstatus"),
            "anecdote" => $request->input("newanectode"),
            "idQuestion" => $request->input("newidChapitre"),
            "idImage" => $request->input("newidImage")

        ));


    }








}
