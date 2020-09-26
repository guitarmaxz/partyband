<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'objetivo'
    ];
    public function users()
    {

        //lado N - N
        return $this->belongsToMany(User::class);
    }

    public function generos()
    {

        //lado N - N
        return $this->belongsToMany(Genero::class);
    }
}
