<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUser $request){
       try{
        $user = new User();
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->password = Hash::make ($request->password);
        $user->save();
        return response()->json([
            'status_code' =>200,
            'status_message'=>'utilisateur ajouté',
            'user' =>$user,
        ]);
       }catch(Exception $e){
        return response()->json($e);
       }
    }
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MA_CLE')->plainTextToken;
    
            return response()->json([
                'statut_code' => 200,
                'statut_message' => 'Utilisateur connecté',
                'user' => $user,
                'token' => $token,
            ]);
        }
    
        return response()->json([
            'statut_code' => 403,
            'statut_message' => 'Informations non valides',
        ]);
    }
}
