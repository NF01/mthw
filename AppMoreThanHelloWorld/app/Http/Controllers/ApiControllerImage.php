<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use App\Http\Api\Imagee;

class ApiControllerImage extends Controller
{
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

    public function getoneimage ($n) {

        $reponse= image::where("idImage",$n)->get();
        return response()->json($reponse);

    }


    public function postimage(Request $request) {
        dd("salut");
//        dd($request);

    }

}
