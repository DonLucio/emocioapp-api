<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emocion;

class EmocionController extends Controller
{
    //
    public function all($id){
        $data =  Emocion::where('tipo', '=', $id)->get();
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
}
