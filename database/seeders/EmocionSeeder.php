<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;
use App\Models\Emocion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $alegria = Tipo::where('nombre', '=', 'alegria')->first();
        $sorpresa = Tipo::where('nombre', '=', 'sorpresa')->first();
        $ira = Tipo::where('nombre', '=', 'ira')->first();
        $miedo = Tipo::where('nombre', '=', 'miedo')->first();
        $asco = Tipo::where('nombre', '=', 'disgusto')->first();
        $tristeza = Tipo::where('nombre', '=', 'tristeza')->first();
        DB::table('emocions')->delete();
        //var_dump(alegria);
        
        $data = array(
            ['id' => Str::uuid()->toString(),	'nombre' => 'Orgullo', 'tipo'=>	$alegria->id	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Aceptación', 'tipo'=>	$alegria->id	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Poder', 'tipo'=>	$alegria->id	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Tranquilidad', 'tipo'=>	$alegria->id	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Optimismo', 'tipo'=>	$alegria->id	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Interes', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Inmpresion', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Confusión', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Asombro', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Inquieto', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Liberado', 'tipo'=>	$sorpresa->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Agresión', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Irritación', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Furia', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Odio', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Celos', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Inseguridad', 'tipo'=>	$ira->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Devastado', 'tipo'=>	$miedo->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Humillado', 'tipo'=>	$miedo->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Rechazado', 'tipo'=>	$miedo->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Amenazado', 'tipo'=>	$miedo->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Aterrado', 'tipo'=>	$miedo->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Esceptico', 'tipo'=>	$asco->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Repugnante', 'tipo'=>	$asco->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Repulsivo', 'tipo'=>	$asco->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Detestable', 'tipo'=>	$asco->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Ansioso', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Abandonado', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Desesperado', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Deprimido', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Solitario', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(),	'nombre' => 'Aburrido', 'tipo'=>	$tristeza->id 	 , 'estado'=> 'activo', 'created_at'=> \Carbon\Carbon::now()]
            
        );
        foreach($data as $row)
            Emocion::insert($row);  
            //var_dump($row);

    }
}
