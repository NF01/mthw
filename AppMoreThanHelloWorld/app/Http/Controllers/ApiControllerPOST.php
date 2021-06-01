<?php

namespace App\Http\Controllers;

use App\Http\Api\errorrs;
use App\Models\Etape;
use App\Models\Image;
use App\Models\Question;
use App\Models\chapitre;
use App\Models\reponse;
use Illuminate\Http\Request;

class ApiControllerPOST extends Controller
{


    public function postimage() {

        $nomFichier = $_FILES['file']['name'];
        $nomTemporaire = $_FILES['file']['tmp_name'];

        $destination = "C:\Users\Admin_N\Desktop\\$nomFichier";//mieux à chercher depuis une variable d'env -- à faire
        move_uploaded_file($nomTemporaire, $destination);

        $uneimage = new image();
        $uneimage->url = $destination;
        $uneimage->save();

        return response()->json($uneimage->id);

    }


    public function postquestion(Request $request) {

        $unequestion = new question();
        $unequestion->enonce = $request->input("enonceQuestion");
        $unequestion->type = $request->input("typeQuestion");
        $unequestion->idEtape = $request->input("idEtapeQuestion");
        $unequestion->idImage= $request->input("idImageQuestion");
        $myimage=image::where("idImage",$unequestion->idImage)->get();
        $mychapter=Etape::where("idChapitre", $unequestion->idEtape)->get();
        $errors=new errorrs();
        if ((count($myimage)>=1||$unequestion->idImage===null)&&(count($mychapter)==1)){
            $unequestion->save();
            return response()->json($unequestion->id);
        }elseif(count($myimage)>=1){
            $errors->first="Impossible d'enregistrer la question car l'id de l'image associee est inexistant";
            return response()->json($errors->first);
        }else{
            $errors->second="Impossible d'enregistrer la question car l'id de l'étape associée est inexistant";
            return response()->json($errors->second);
        }
    }


    public function postresponse(Request $request) {

        $aresponse = new reponse();
        $aresponse->enonce = $request->input("enonceResponse");
        $aresponse->statut = $request->input("statutResponse");
        $aresponse->anecdote= $request->input("anecdoteResponse");
        $aresponse->idQuestion = $request->input("idQuestionResponse");
        $aresponse->idImage= $request->input("idImageResponse");
        $myimage=image::where("idImage",$aresponse->idImage)->get();
        $myquestion=question::where("idQuestion", $aresponse->idQuestion)->get();
        $errors=new errorrs();
        if ((count($myquestion)==1)&&(count($myimage)>=1||$aresponse->idImage===null)){
            $aresponse->save();
        }elseif(count($myquestion)<=0){
            $errors->first="Impossible d'enregistrer la question car l'id de la question associee est inexistant";
            return response()->json($errors->first);
        }else{
            $errors->second="Impossible d'enregistrer la question car l'id de l'image associee est inexistant";
            return response()->json($errors->second);
        }

    }






}
