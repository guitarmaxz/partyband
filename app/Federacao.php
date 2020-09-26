<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federacao extends Model
{
    protected $table = 'federacaos';
    protected $fillable = [
        'descricao'
    ];

    public function users()
    {
        //lado 1 - N
        return $this->hasMany(User::class, 'fed_id', 'id');
    }
}
