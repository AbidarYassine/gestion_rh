<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    public function bulletinPaie()
    {
        return $this->belongsTo('App\BulletinPaie');
    }
    protected $fillable = [
        'libelle', 'taux', 'retenu','bulletin_paie_id'
    ];
}
