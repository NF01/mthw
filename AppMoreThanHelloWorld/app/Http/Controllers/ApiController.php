<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;

class ApiController extends Controller
{



    public function get() {

        $questionsdatabase=question::get();
        $questions=[];
        for  ($i = 0; $i < sizeof($questionsdatabase); $i++){
            $questions[$i]=($questionsdatabase[$i]->enonce);

        }

        return response()->json($questions);

    }

    public function post(Request $request) {

        $unequestion = new question();
        $unequestion->enonce = $request->input("enonce");
        $unequestion->ordre = $request->input("ordre");
        $unequestion->type = $request->input("type");
        $unequestion->idChapitre = 1;
        $unequestion->idImage= 1;
        $unequestion->save();

    }

    public function put(Request $request) {

        $id=$request->input("id");


        question::where("idquestion",$id)->update(array(
            "enonce" => $request->input("newenonce"),
            "ordre" => $request->input("newordre"),
            "type" => $request->input("newtype")

        ));


    }

    public function delete(Request $request) {

        $id=$request->input("id");
        question::where("idquestion",$id)->delete();


    }



}
