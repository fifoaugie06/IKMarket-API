<?php

namespace App\Http\Controllers;

use App\Model\Market;
use App\Model\MarketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'fulladdress' => 'required',
            'longlat' => 'required',
            'market_category_id' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['status' => 400, 'message' => "Gambar Max 2MB"
            ], 400);
        }

        $file = $request->file('image');
        $nama_file = "MR" . time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = storage_path('\app\public\images\markets');
        $file->move($tujuan_upload, $nama_file);

        Market::create([
            'name' => $request->name,
            'image' => $nama_file,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'fulladdress' => $request->fulladdress,
            'longlat' => $request->longlat,
            'market_category_id' => $request->market_category_id
        ]);

        return response()->json(['status' => 200, 'message' => 'Success Create Data'
        ]);
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
