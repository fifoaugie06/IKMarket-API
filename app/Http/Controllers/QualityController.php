<?php

namespace App\Http\Controllers;

use App\Model\Quality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QualityController extends Controller
{
    public function index()
    {
        $quality = Quality::orderBy('id', 'desc')->get();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($quality),
            'data' => $quality
        ]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
           'name' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['status' => 400, 'message' => "Bad Request"
            ], 400);
        }

        Quality::create([
           'name' => $request->name
        ]);

        return response()->json(['status' => 200, 'message' => 'Success Create Data'
        ]);
    }
}
