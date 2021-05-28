<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Exceptions\InvalidOrderException;
use PhpParser\Node\Expr\Cast\Object_;
use App\Http\Api\Questionn;

class ApiControllerQuestion extends Controller
{


    public function getquestion() {

        $questionsdatabase=question::get();
        $questions=[];
        for  ($i = 0; $i < sizeof($questionsdatabase); $i++){
            $myquestion = new Questionn();
            $myquestion->idQuestion= $questionsdatabase[$i]->idQuestion;
            $myquestion->enonce = $questionsdatabase[$i]->enonce;
            $myquestion->ordre =$questionsdatabase[$i]->ordre;
            $myquestion->type = $questionsdatabase[$i]->type;
            $myquestion->IdChapitre = $questionsdatabase[$i]->idChapitre;
            $myquestion->idImage = $questionsdatabase[$i]->idImage;
            $questions[$i]=$myquestion;
        }

        return response()->json($questions);

    }

    public function getonequestion($n) {

        $question= question::where("idQuestion",$n)->get();
        return response()->json($question);

    }

    public function getquestionordre($n) {

        $question= question::where("ordre",$n)->get();
        return response()->json($question);

    }

    public function getquestiontype($n) {

        $question= question::where("type",$n)->get();
        return response()->json($question);

    }


    public function postquestion(Request $request) {

        $unequestion = new question();
        $unequestion->enonce = $request->input("enonce");
        $unequestion->ordre = $request->input("ordre");
        $unequestion->type = $request->input("type");
        $unequestion->idChapitre = 1;
        $unequestion->idImage= 1;
        $unequestion->save();

    }

    public function putquestion(Request $request) {

        $id=$request->input("id");


        question::where("idquestion",$id)->update(array(
            "enonce" => $request->input("newenonce"),
            "ordre" => $request->input("newordre"),
            "type" => $request->input("newtype")

        ));


    }



    public function deletequestion(Request $request) {

        $id=$request->input("id");
        question::where("idquestion",$id)->delete();



    }



}
