<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandePaie extends Model
{
    protected $fillable=[
         'date_debut','date_fin','employer_id','societe_id','id_bulltein'
    ];
     public function employer(){
         return $this->belongsTo('App\Employer');
     }
     public function societe(){
        return $this->belongsTo('App\Societe');
    }
}
