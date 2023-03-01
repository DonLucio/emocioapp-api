<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    //
    public function index()
    {
        $data =  Tipo::all();
        try {
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
            $data = Tipo::find($id);
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
}
