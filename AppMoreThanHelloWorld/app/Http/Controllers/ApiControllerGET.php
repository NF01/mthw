<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\User;

class ApiControllerGET extends Controller
{


    public function getAllQuestions()
    {
        $result = Question::all();
        return $this->exportToJson($result);
    }

    public function getAllResponses()
    {
        $result = Reponse::all();
        return $this->exportToJson($result);
    }

    public function getResponsesFromIdQuestion($id)
    {
        $result = reponse::with("question")->firstWhere('idQuestion', $id)->get();
        return $this->exportToJson($result);
    }

    public function getAllImages()
    {
        $result = Image::all();
        return $this->exportToJson($result);
    }

    public function getQuestionFromId($id)
    {
        $result = Question::firstWhere('idQuestion', $id);
        return $this->exportToJson($result);
    }

    public function getResponseFromId($id)
    {
        $result = Reponse::firstWhere('idReponse', $id);
        return $this->exportToJson($result);
    }

    public function getImageFromId($id)
    {
        $result = Image::firstWhere('idImage', $id);
        return $this->exportToJson($result);
    }

    public function getUserFromId($id)
    {
        $result = User::firstWhere('id', $id);
        return $this->exportToJson($result);
    }

    public function getQuestionTypeFromQuestionId($idQuestion)
    {
        $result = Question::firstWhere('idQuestion', $idQuestion);
        if ($result != null) {
            return $result->idType;
        } else {
            return $result;
        }
    }

    private function exportToJson($data)
    {
        if ($data != null) {
            return response()->json($data);
        } else {
            return $data;
        }
    }
}
