<?php

namespace App\Http\Controllers;

use App\Model\Market;
use App\Model\MarketCategory;

class MarketsController extends Controller
{
    public function index()
    {
        $market = Market::with([
            'provincy', 'regency', 'district', 'market_category'
        ])->get();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($market),
            'data' => $market
        ]);
    }

    public function show($id)
    {
        $market = Market::with([
            'provincy', 'regency', 'district', 'market_category'
        ])->find($id);

        if ($market === null) {
            return response()->json(['status' => 404, 'message' => 'Record Not Found'
            ], 404);
        } else {
            return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => 1,
                'data' => $market
            ]);
        }
    }

    public function delete($id)
    {
        $market = Market::find($id);

        if ($market === null) {
            return response()->json(['status' => 404, 'message' => 'Record Not Found'
            ], 404);
        } else {
            Market::destroy($id);

            return response()->json(['status' => 200, 'message' => 'Success Delete Data'
            ]);
        }
    }

    public function category()
    {
        $category = MarketCategory::all();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($category),
            'data' => $category
        ]);
    }
}
