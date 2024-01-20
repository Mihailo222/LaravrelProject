<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function register(Request $request) { //request prima parametre za registraciju
        

        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|max:50|email|unique:users',
            'password'=>['required', Password::min(8)->letters()->numbers()->mixedCase()]

        ]);


        if($validator->fails())
            return response()->json(['warnning:' => 'Sifra mora imati minimalno 8 karaktera. Mora sadrzati barem jedno veliko i barem jedno malo slovo, kao i barem 1 broj.']);


        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);


        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['data' => $user, 'access_token' => $token, 'token_type'=>'Bearer']);






    }



        


}
    
