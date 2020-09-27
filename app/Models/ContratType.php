<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratType extends Model
{
    public function contrats(){
        return $this->hasMany('App\Contrat');
    }
    protected $fillable = [
        'type',
    ];
    use SoftDeletes;
}
