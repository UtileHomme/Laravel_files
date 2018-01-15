<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;
use View;

class JSONFileController extends Controller
{
    public function downloadJSONFile()
    {
        $data = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
        $data = json_decode($data);

        $fileName = time().'_datafile.json';
        File::put(public_path('/upload/json/'.$fileName),$data);
        return Response::download(public_path('/upload/json/'.$fileName));
    }
}
