<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiControllerPUT extends Controller
{

    /**
     * Fait la mise à jour d'une question
     * @param Request $request
     */
    public function updatequestion(Request $request)
    {

        $id = $request->input("id");

        question::find($id)->update(array(
            "enonce" => $request->input("newenonce"),
            "type" => $request->input("newtype"),
            "idEtape" => $request->input("newidEtape"),
            "idImage" => $request->input("newidImage"),
        ));
    }

    /**
     * Fait la mise à jour d'une réponse
     * @param Request $request
     */
    public function updateresponse(Request $request)
    {
        $id = $request->input("id");

        reponse::where("idReponse", $id)->update(array(
            "enonce" => $request->input("newenonce"),
            "statut" => $request->input("newstatus"),
            "anecdote" => $request->input("newanectode"),
            "idQuestion" => $request->input("newidQuestion"),
            "idImage" => $request->input("newidImage")
        ));
    }

    /**
     * Fait la mise à jour d'un user
     * @param Request $request
     */
    public function updateUser(Request $request)
    {

        $id = $request->input("id");

        User::where("id", $id)->update(array(
            "name" => $request->input("newUserName"),
            "email" => $request->input("newsUserEmail"),
            "password" => Hash::make($request->input("newPassword")),
        ));
    }
}
