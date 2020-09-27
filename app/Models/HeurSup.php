<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeurSup extends Model
{
    protected $fillable = [
        'nombre_heur', 'taux', 'gain','majoration','type','employer_id'
    ];
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
