<?php

namespace App\Http\Controllers\API;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController
{
    public function register(Request $request)
    {

        $profile = new profile();
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->number = $request->number;
        $profile->password = Hash::make($request->password);
        $profile->save();

        $token = $profile->createToken('my-app-token')->plainTextToken;

        return response()->json([
            'profile' => $profile,
            'token' => $token,
            'message' => 'User Register Successfully.'
        ]);

    }

    public function login(Request $request)
    {
        $profile = profile::where('email', $request->email)->first();
        
        if (!$profile || !Hash::check($request->password, $profile->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $profile->createToken('my-app-token')->plainTextToken;

        return response()->json([
            'profile' => $profile,
            'token' => $token,
            'message' => 'User Register Successfully.'
        ]);
    }
}
