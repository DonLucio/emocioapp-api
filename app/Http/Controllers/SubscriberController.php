<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Mail\Subscribe;
use App\Mail\Register;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    //
    public function subscribe(Request $request){
        try {
            $data = User::where('email', '=', $request->email)->first();
            if($data) {
                Mail::to($data->email)->send(new Subscribe($data));
                return response()->json([
                    'status' => 201, 
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'status' => 404 
                ], 200);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getCode()
            ], 200);
        }
        
    }
    public function singup(Request $request){
        try {
            $rol = Rol::where('nombre', '=', 'alumno')->first();
            $data = new User();
            $data->id = Str::uuid()->toString();
            $data->nombres = $request->nombres;
            $data->apellidos = $request->apellidos;
            $data->email = $request->email;
            $data->rol = $rol->id;
            $data->password =  bcrypt('123456');
            $data->created_at =  \Carbon\Carbon::now();
            $data->save();
            $data = User::where('email', '=', $request->email)->first();
            Mail::to($data->email)->send(new Register($data));
            return response()->json([
                'status' => 202,
                'data' => $data
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getCode()
            ], 200);
        }
        
    }
}
