<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstrumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instrumentos')->insert([
            'descricao' => 'Guitarra',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Contra-Baixo',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Violão',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Teclado',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Bateria',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Banjo',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Ukulele',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Viola',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Triângulo',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Vocal',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Saxofone',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Clarinete',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Flauta',
        ]);
        DB::table('instrumentos')->insert([
            'descricao' => 'Percussão',
        ]);
    }
}
