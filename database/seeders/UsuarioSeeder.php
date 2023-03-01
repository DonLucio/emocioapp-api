<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rol = Rol::where('nombre', '=', 'alumno')->first();
        DB::table('users')->delete();
        $data = array(
            [
                'id' => Str::uuid()->toString(),
                'nombres' => 'gonzalo',
                'apellidos' => 'lucio',
                'email' => 'glucio@gmail.com',
                'password' => bcrypt('123456789'),
                'rol' => $rol->id,
                "created_at"=> \Carbon\Carbon::now()],
        );
        foreach($data as $row)
            User::insert($row); 
    }
}
