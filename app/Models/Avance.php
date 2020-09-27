<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avance extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
    use SoftDeletes;
    protected $fillable = [
        'date_affectation', 'montant', 'employer_id',
    ];
}
