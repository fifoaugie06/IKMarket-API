<?php

namespace App\Http\Controllers;

use App\Model\Provincy;
use App\Model\Regency;

class IndonesiaController extends Controller
{
    public function provincy()
    {
        $provincy = Provincy::all();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($provincy),
            'data' => $provincy
        ]);
    }

    public function provincydetail($id)
    {
        $provincy = Provincy::with(['regency'])->find($id);

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data',
            'data' => $provincy
        ]);
    }

    public function regencydetail($id)
    {
        $regency = Regency::with(['district'])->find($id);

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data',
            'data' => $regency
        ]);
    }
}
