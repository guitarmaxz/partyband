<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federacao extends Model
{
    protected $table = 'federacaos';
    public $timestamps = false;
    protected $fillable = [
        'uf'
    ];

    public function users()
    {
        //lado 1 - N
        return $this->hasMany(User::class, 'fed_id', 'id');
    }
}
