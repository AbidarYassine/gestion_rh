<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emploi extends Model
{
    public function employers(){
        return $this->hasMany('App\Employer');
    }
    protected $fillable = [
        'fonction', 'date_debut', 'date_fin','salaire_base'.'descrip',
    ];
    use SoftDeletes;

}
