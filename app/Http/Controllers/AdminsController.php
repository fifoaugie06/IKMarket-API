<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function auth(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();

        if ($admin === null) {
            return response()->json(['status' => 400, 'message' => 'Username atau Password Salah'
            ], 400);
        } else {
            if (Hash::check($request->password, $admin->password)) {
                return response()->json(['status' => 200, 'message' => 'Selamat Datang Admin'
                ], 200);
            } else {
                return response()->json(['status' => 400, 'message' => 'Username atau Password Salah'
                ], 400);
            }
        }
    }
}
