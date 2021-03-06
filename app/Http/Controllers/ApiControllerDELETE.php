<?php

namespace App\Http\Controllers;

use App\Models\question;
use App\Models\reponse;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiControllerDELETE extends Controller
{
    /**
     * Supprime une instance
     * instance = image + question + réponse (dans cet ordre)
     * @param Request $request
     */
    public function deleteinstance(Request $request)
    {

        $idQuestionToDelete = $request->input("idQuestion");
        $responseToDelete = reponse::where("idQuestion", $idQuestionToDelete)->get();
        $questionToDelete = question::where("idQuestion", $idQuestionToDelete)->get();
        reponse::where("idQuestion", $idQuestionToDelete)->delete();
        foreach ($responseToDelete as $r) {
            if (!($r->idImage === null)) {
                $reponse = image::where("idImage", $r->idImage)->get();
                foreach ($reponse as $r2) {
                    $url = $r2->url;
                    $pieces = explode("/", $url);
                    $piece = $pieces[array_key_last($pieces)];
                    unlink(storage_path('app/public/images/' . $piece));
                }
                image::where("idImage", $r->idImage)->delete();
            }
        }
        question::where("idQuestion", $idQuestionToDelete)->delete();
        foreach ($questionToDelete as $q) {
            if (!($q->idImage === null)) {
                $reponse2 = image::where("idImage", $q->idImage)->get();
                foreach ($reponse2 as $r3) {
                    $url2 = $r3->url;
                    $pieces = explode("/", $url2);
                    $piece = $pieces[array_key_last($pieces)];
                    unlink(storage_path('app/public/images/' . $piece));
                }
                image::where("idImage", $q->idImage)->delete();
            }
        }
    }



    public function deleteimage(Request $request)
    {
        $idImageToDelete = $request->input("idImageDelete");
        $myImagetoDelete=image::where("idImage",$idImageToDelete);
        $url=$myImagetoDelete[0]->url;
        $p = explode("/", $url);
        unlink(storage_path('app/public/images/' . $p));
        image::where("idImage", $idImageToDelete)->delete();
    }
}
