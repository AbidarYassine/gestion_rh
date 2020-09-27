<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conget extends Model
{
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
    public function congetType()
    {
        return $this->belongsTo('App\CongetType');
    }
    use SoftDeletes;
    protected $fillable = [
        'date_debut', 'durre', 'employer_id', 'conget_type_id', 'status','id_societe','raison'
    ];
}
