<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Gagal Register',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['nama'] = $user->nama;

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Regist',
            'data' => $success
        ]
        );
    }
}
