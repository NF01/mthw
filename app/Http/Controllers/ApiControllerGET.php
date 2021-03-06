<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\User;
use App\Models\Etape;

class ApiControllerGET extends Controller
{

    /**
     * retourne toutes les questions
     * @return json $result
     */
    public function getAllQuestions()
    {
        $result = Question::all();
        return $this->exportToJson($result);
    }

    /**
     * retourne toutes les responses
     * @return json $result
     */
    public function getAllResponses()
    {
        $result = Reponse::all();
        return $this->exportToJson($result);
    }

    /**
     * retourne les réponses lié à un id de la question spéciale
     * @param $id
     * @return json $result
     */
    public function getResponsesFromIdQuestion($id)
    {
        $result = reponse::with("question")->firstWhere('idQuestion', $id)->get();
        return $this->exportToJson($result);
    }

    /**
     * retourne toutes les chapitres (etape)
     * @return json $result
     */
    public function getAllChapters()
    {
        $result = Etape::all();
        return $this->exportToJson($result);
    }

    /**
     * retourne toues les questions lié à un id de chapitre (étape)
     * @param $id
     * @return json $result
     */
    public function getAllQuestionsFromIdChapter($id)
    {
        $result = Question::Where("idEtape", $id)->get();
        return $this->exportToJson($result);
    }

    /**
     * retourne toutes les images
     * @return json $result
     */
    public function getAllImages()
    {
        $result = Image::all();
        return $this->exportToJson($result);
    }

    /**
     * retourne les questions avec un id spécial
     * @param $id
     * @return json $result
     */
    public function getQuestionFromId($id)
    {
        $result = Question::firstWhere('idQuestion', $id);
        return $this->exportToJson($result);
    }

    /**
     * retourne les reponses liées à un id spécial
     * @param $id
     * @return json $result
     */
    public function getResponseFromId($id)
    {
        $result = Reponse::firstWhere('idReponse', $id);
        return $this->exportToJson($result);
    }

    /**
     * retourne image lié à un id spécial
     * @param $id
     * @return json $result
     */
    public function getImageFromId($id)
    {
        $result = Image::firstWhere('idImage', $id);
        return $this->exportToJson($result);
    }

    /**
     * retourne un utilisateur lié à un id spécial
     * @param $id
     * @return json $result
     */
    public function getUserFromId($id)
    {
        $result = User::firstWhere('id', $id);
        return $this->exportToJson($result);
    }

    /**
     * retourne le type de la question lié à un id spécial
     * @param $idQuestion
     * @return json $result
     */
    public function getQuestionTypeFromQuestionId($idQuestion)
    {
        $result = Question::firstWhere('idQuestion', $idQuestion);
        if ($result != null) {
            return $result->idType;
        } else {
            return $result;
        }
    }

    /**
     * retourne les utilisateurs ordonné par xp (expérience/ nombre de points)
     * @return json $result
     */
    public function getUsersSortByXp()
    {
        $result = User::orderByDesc('experience')->get();
        return $this->exportToJson($result);
    }

    /**
     * retourne le niveau de l'utilisateur lié à un id spécial
     * @param $idUser
     * @return false|float
     */
    public function getUserLevelFromIdUser($idUser)
    {
        $EXPERIENCE_FOR_EACH_LEVEL = 1000;

        $result = User::firstWhere('id', $idUser);
        $experience = $result != null ? $result->experience : 0;
        $level = floor($experience / $EXPERIENCE_FOR_EACH_LEVEL);
        return $level;
    }

    /**
     * retourne tous les badges (url relative de la DB)
     * @return json $result
     */
    public function getAllBadges()
    {

        $result = Etape::select(['idEtape', 'badgeUrl'])->get();
        return $this->exportToJson($result);
    }

    /**
     * exportation des résultats en format json
     * @param $data
     * @return json $data
     */
    private function exportToJson($data)
    {
        if ($data != null) {
            return response()->json($data);
        } else {
            return $data;
        }
    }
}
