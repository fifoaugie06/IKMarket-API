<?php

namespace App\Http\Controllers;

use App\Model\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function index()
    {
        $quality = Quality::all();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($quality),
            'data' => $quality
        ]);
    }
}
