<?php

namespace App\Http\Controllers;


use App\Model\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::with([
            'type', 'quality', 'unit'
        ])->get();

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
