<?php

namespace Database\Seeders;
use App\Models\Tipo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipos')->delete();
        $data = array(
            ['id' => Str::uuid()->toString(), 'nombre' => 'alegria', "color" =>"#f8c800ff", "created_at"=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(), 'nombre' => 'sorpresa', "color" =>"#ff772bff", "created_at"=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(), 'nombre' => 'ira', "color" =>"#e80039ff", "created_at"=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(), 'nombre' => 'miedo', "color" =>"#c237dcff", "created_at"=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(), 'nombre' => 'disgusto', "color" =>"#02ac49ff", "created_at"=> \Carbon\Carbon::now()],            
            ['id' => Str::uuid()->toString(), 'nombre' => 'tristeza', "color" =>"#607af8ff", "created_at"=> \Carbon\Carbon::now()],            
        );
        foreach($data as $row)
            Tipo::insert($row);  
    }
}
