<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
        //
        
        public function signUp(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string'
            ]);
    
            User::create([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
    
            return response()->json([
                'message' => 'Successfully created user!'
            ], 201);
        }
        
        /**
         * Inicio de sesión y creación de token
         */
        public function login(Request $request)
        {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
                $user = Auth::user(); 
                $token = $user->createToken('Emocioapp')-> accessToken;                
       
                return response()->json([
                    'access_token' => $token,
                    'user' => $user,
                    'token_type' => 'Bearer',
                    'status' => 200,
                    //'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
                ]);
            } 
            else{ 
                return response()->json([
                    'status' => 401
                ], 200);
            }
        }
        public function recover(Request $request)
        {
            try {
                $data = User::where('email', '=', $request->email)->first();
                if($data){
                    return response()->json([
                        'access_token' => $token,
                        'user' => $user,
                        'status' => 200,
                        //'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
                    ]);
                } 
                else{ 
                    return response()->json([
                        'status' => 401
                    ], 200);
                }
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => true,
                    'status' => $e->getMessage()
                ], 200);
            }
        }

        /**
         * Cierre de sesión (anular el token)
         */
        public function logout(Request $request)
        {
            //$user->tokens()->delete();
            $request->user()->token()->revoke();
    
            return response()->json([                
                'status' => 200
            ], 200);
        }
    
        /**
         *
         */
   
        /**
         *
         */
    
        public function guardRol(Request $request, $rol){
            try {
                
                $data = DB::table('users')
                ->select('users.id as id')
                ->join('rols', 'rols.id', '=', 'users.rol') 
                ->where('rols.nombre', $rol)
                ->where('users.id', $request->user()->id)                
                ->first();
                if($data){
                    $band = true;
                } else {
                    $band = false;
                }
                return response()->json([
                    'data'=> $band,
                    'status' => 200
                ], 200);
            }
            catch(\Exception $e){
                return response()->json([
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    
        /**
         * Obtener el objeto User como json
         */
        public function user(Request $request)
        {
            $roles = [];
            foreach(Auth::user()->Perfiles as $item){
                $roles[] = Role::find($item->rol);
            }
            return response()->json(
                [
                    'data' => $request->user(),
                    'profiles' =>  $roles
                ]
            );
        }
}
