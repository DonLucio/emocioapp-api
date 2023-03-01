<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Str;

class ActividadController extends Controller
{
    public function index(Request $request)
    {
        //
        try {
            $data = Actividad::with('tipo')->with('emocion')->where('user', '=', $request->user()->id)->get();
            return response()->json([
                'data'=> $data,
                'status' => 200
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getMessage()
            ], 200);
        }
    }
    public function show($id)
    {
        //
        try {
            $data = Actividad::with('tipo')->with('emocion')->find($id);
            return response()->json([
                'data'=> $data,
                'status' => 200
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getMessage()
            ], 200);
        }
    }
    //
    public function store(Request $request)
    {
        //
        try {                
                $data = new Actividad;
                $data->id = Str::uuid()->toString();
                $data->user = $request->user()->id;                
                $data->tipo = $request->_tipo;
                $data->lugar = $request->lugar;
                $data->created_at =  \Carbon\Carbon::now();
                $data->save();
                $data = Actividad::where('user', '=', $request->user()->id)->where('tipo', '=', $request->_tipo)
                ->where('lugar', '=', $request->lugar)->orderBy("created_at", "DESC")->first();
                return response()->json([
                    'data'=> $data,
                    'status' => 201
                ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getMessage()
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        //
                
        try {
            $data = Actividad::find($id);
            if($request->_emocion)
                $data->emocion = $request->_emocion;
            if($request->cuerpo)
                $data->cuerpo = $request->cuerpo;

            $data->updated_at =  \Carbon\Carbon::now();
            $data->update();
            
            return response()->json([
                'data'=> $data,
                'status' => 201
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => true,
                'status' => $e->getMessage()
            ], 200);
        }
    }
}
