<?php

namespace App\Http\Controllers;

use App\Model\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        $type = Type::all();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($type),
            'data' => $type
        ]);
    }
}
