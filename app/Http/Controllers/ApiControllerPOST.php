<?php

namespace App\Http\Controllers;

use App\Http\Api\errorrs;
use App\Models\Etape;
use App\Models\Image;
use App\Models\Question;
use App\Models\reponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiControllerPOST extends Controller
{


    public function postimage(Request $request)
    {

        $myimage = $request->file->path();
        $content = file_get_contents($myimage);
        $nameFile = $_FILES['file']['name'];

        $destination = asset("storage/images/$nameFile");

        $myimages = image::get();

        $errors = 0;
        foreach ($myimages as $i) {
            if ($destination === $i->url) {
                $errors += 1;
            }
        }

        if ($errors > 0) {
            return response()->json("already this name");
        } else {
            Storage::put("public/images/$nameFile", $content);

            $animage = new image();
            $animage->url = $destination;
            $animage->save();

            return response()->json([$animage->id, $animage->url]);
        }
    }


    public function postquestion(Request $request)
    {
        $unequestion = new question();
        $unequestion->enonce = $request->input("enonceQuestion");
        $unequestion->idType = $request->input("typeQuestion");
        $unequestion->idEtape = $request->input("idEtapeQuestion");
        $unequestion->idImage = $request->input("idImageQuestion");
        $myimage = image::where("idImage", $unequestion->idImage)->get();
        $mychapter = Etape::where("idEtape", $unequestion->idEtape)->get();
        $errors = new errorrs();
        if ((count($myimage) >= 1 || $unequestion->idImage === null) && (count($mychapter) == 1)) {
            $unequestion->save();
            return response()->json($unequestion->id);
        } elseif (count($myimage) >= 1) {
            $errors->first = "Impossible d'enregistrer la question car l'id de l'image associee est inexistant";
            return response()->json($errors->first);
        } else {
            $errors->second = "Impossible d'enregistrer la question car l'id de l'étape associée est inexistant";
            return response()->json($errors->second);
        }
    }

    public function postresponse(Request $request)
    {
        $aresponse = new reponse();
        $aresponse->enonce = $request->input("enonceResponse");
        $aresponse->statut = $request->input("statutResponse");
        $aresponse->anecdote = $request->input("anecdoteResponse");
        $aresponse->idQuestion = $request->input("idQuestionResponse");
        $aresponse->idImage = $request->input("idImageResponse");
        $myimage = image::where("idImage", $aresponse->idImage)->get();
        $myquestion = question::where("idQuestion", $aresponse->idQuestion)->get();
        $errors = new errorrs();
        if ((count($myquestion) == 1) && (count($myimage) >= 1 || $aresponse->idImage === null)) {
            $aresponse->save();
        } elseif (count($myquestion) <= 0) {
            $errors->first = "Impossible d'enregistrer la reponse car l'id de la question associee est inexistant";
            return response()->json($errors->first);
        } else {
            $errors->second = "Impossible d'enregistrer la reponse car l'id de l'image associee est inexistant";
            return response()->json($errors->second);
        }
    }

    public function addXpToUser(Request $request)
    {

        $idUser = $request->input("idUser");
        $xp = $request->input("xp");

        $user = User::firstWhere('id', $idUser);
        if ($user != null) {
            $user->experience = $user->experience + $xp;
            $user->save();
        }
        return response()->json('Experience added');
    }
}
