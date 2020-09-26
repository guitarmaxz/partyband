<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musico extends Model
{
    protected $table = 'musicos';
    protected $fillable = [
        'nome', 'sexo', 'telefone', 'biografia'
    ];

    public function federacaos()
    {
        return $this->hasOne(Federacao::class, 'fed_id', 'id');
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'generos_musicos', 'musico_id', 'genero_id');
    }

  
    public function instrumentos()
    {
        return $this->belongsToMany(Instrumento::class, 'instrumentos_musicos', 'musico_id', 'inst_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
