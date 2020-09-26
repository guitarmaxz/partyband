<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'descricao' => 'Rock'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Sertanejo'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Pop'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Pagode'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Metal'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'MPB'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Classica'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Samba'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Gospel'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Country'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Blues'
        ]);

        DB::table('generos')->insert([
            'descricao' => 'Jazz'
        ]);
    }
}
