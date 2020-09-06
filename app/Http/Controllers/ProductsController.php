<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::with([
            'type', 'quality', 'unit'
        ])->orderBy('id', 'desc')->get();

        return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => count($product),
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::with([
            'type', 'quality', 'unit'
        ])->find($id);

        if ($product === null) {
            return response()->json(['status' => 404, 'message' => 'Record Not Found'
            ], 404);
        } else {
            return response()->json(['status' => 200, 'message' => 'Success Retrieving Data', 'data_count' => 1,
                'data' => $product
            ]);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'type_id' => 'required',
            'price' => 'required',
            'quality_id' => 'required',
            'unit_id' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['status' => 400, 'message' => 'Gambar Max 2MB'
            ], 400);
        }

        $file = $request->file('image');
        $nama_file = "PR" . time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = storage_path('app/public');
        $file->move($tujuan_upload, $nama_file);

        Product::create([
            'name' => $request->name,
            'image' => $nama_file,
            'type_id' => $request->type_id,
            'price' => $request->price,
            'quality_id' => $request->quality_id,
            'unit_id' => $request->unit_id
        ]);

        return response()->json(['status' => 200, 'message' => 'Success Create Data'
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product === null) {
            return response()->json(['status' => 404, 'message' => 'Record Not Found'
            ], 404);
        } else {
            Product::destroy($id);

            return response()->json(['status' => 200, 'message' => 'Success Delete Data'
            ]);
        }
    }
}
