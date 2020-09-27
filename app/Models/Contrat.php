<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrat extends Model
{
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }

    public function contrattype()
    {
        return $this->belongsTo('App\ContratType', 'contra_type_id');
    }

    protected $fillable = [
        'employer_id', 'date_embauche', 'contra_type_id'
    ];
    use SoftDeletes;
}
