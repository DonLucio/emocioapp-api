<?php

namespace Database\Seeders;
use App\Models\Rol;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rols')->delete();
        $data = array(
            ['id' => Str::uuid()->toString(), 'nombre' => 'root', "created_at"=> \Carbon\Carbon::now()],
            ['id' => Str::uuid()->toString(), 'nombre' => 'alumno', "created_at"=> \Carbon\Carbon::now()],
        );
        foreach($data as $row)
            Rol::insert($row); 
    }
}
