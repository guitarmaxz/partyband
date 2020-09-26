<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FederacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('federacaos')->insert([
            'uf' => 'RO'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'AC'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'AM'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'RR'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'PA'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'AP'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'TO'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'MA'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'PI'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'CE'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'RN'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'PB'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'PE'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'AL'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'SE'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'BA'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'MG'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'ES'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'RJ'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'SP'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'PR'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'SC'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'RS'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'MS'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'MT'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'GO'
        ]);
        DB::table('federacaos')->insert([
            'uf' => 'DF'
        ]);
    }
}
