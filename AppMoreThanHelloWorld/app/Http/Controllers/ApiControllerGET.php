<?php

namespace App\Http\Controllers;

use App\Http\Api\Questionn;
use App\Http\Api\Reponsee;
use App\Models\Image;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ApiControllerGET extends Controller
{


    public function getquestions() {

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

    public function getresponses() {

        $reponsesdatabase=reponse::get();
        $responses=[];
        for  ($i = 0; $i < sizeof($reponsesdatabase); $i++){
            $myresponse = new Reponsee();
            $myresponse->idReponse= $reponsesdatabase[$i]->idReponse;
            $myresponse->enonce= $reponsesdatabase[$i]->enonce;
            $myresponse->ordre= $reponsesdatabase[$i]->ordre;
            $myresponse->statut= $reponsesdatabase[$i]->statut;
            $myresponse->anectode= $reponsesdatabase[$i]->anecdote;
            $myresponse->idQuestion= $reponsesdatabase[$i]->idQuestion;
            $myresponse->idImage= $reponsesdatabase[$i]->idImage;
            $responses[$i]=$myresponse;
        }

        return response()->json($responses);
    }


    public function getAllResponsesFromQuestionId($id)
    {
        // $id = 3;
        $reponses = reponse::with("question")->where('idQuestion', $id)->get();
        echo '<pre>';
        var_dump($reponses);
        echo '</pre>';
    }

    public function getimages() {

        $reponsesdatabase=image::get();
        $images=[];
        for  ($i = 0; $i < sizeof($reponsesdatabase); $i++){
            $myimage = new image();
            $myimage->idImage= $reponsesdatabase[$i]->idImage;
            $myimage->url= $reponsesdatabase[$i]->url;
            $images[$i]=$myimage;
        }


        return response()->json($images);
    }

    public function getonequestion($n) {

        $question= question::where("idQuestion",$n)->get();
        return response()->json($question);
    }

    public function getoneresponse ($n) {

        $reponse= reponse::where("idReponse",$n)->get();
        return response()->json($reponse);
    }

    public function getoneimage ($n) {

        $reponse= image::where("idImage",$n)->get();
        return response()->json($reponse);
    }


    public function getquestiontype($n) {

        $question= question::where("type",$n)->get();
        return response()->json($question);
    }

    public function getresponseIdQ($n) {

        $reponses= reponse::where("IdQuestion",$n)->get();
        return response()->json($reponses);
    }




}
