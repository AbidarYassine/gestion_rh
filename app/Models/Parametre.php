<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $fillable = ['tauxCnss', 'tauxAmo', 'chargeFamille','societe_id'];

    public function societe()
    {
        return $this->belongsTo('App\Societe', 'societe_id', 'id');
    }
}
