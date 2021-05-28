<?php

namespace App\Http\Controllers;


use App\Http\Api\Reponsee;
use App\Models\reponse;
use Illuminate\Http\Request;

class ApiControllerResponse extends Controller
{

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

    public function getoneresponse ($n) {

        $reponse= reponse::where("idReponse",$n)->get();
        return response()->json($reponse);

    }

    public function getresponseIdQ($n) {

        $reponses= reponse::where("IdQuestion",$n)->get();
        return response()->json($reponses);

    }


    public function postresponse(Request $request) {

        $unereponse = new reponse();
        $unereponse->enonce = $request->input("enonce");
        $unereponse->ordre = $request->input("ordre");
        $unereponse->statut = $request->input("status");
        $unereponse->anecdote = $request->input("anecdote");
        $unereponse->idQuestion = 10;
        $unereponse->idImage= 1;
        $unereponse->save();

    }

    public function putresponse(Request $request) {

        $id=$request->input("id");


        reponse::where("idReponse",$id)->update(array(
            "enonce" => $request->input("newenonce"),
            "ordre" => $request->input("newordre"),
            "statut" => $request->input("newstatus"),
            "anectode" => $request->input("newanectode")

        ));


    }



    public function deleteresponse(Request $request) {

        $id=$request->input("id");
        reponse::where("idReponse",$id)->delete();



    }

}
