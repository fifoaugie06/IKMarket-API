<?php

namespace App\Http\Controllers;

use App\Model\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($units),
            'data' => $units
        ]);
    }
}
