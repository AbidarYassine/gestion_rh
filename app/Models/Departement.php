<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    public function employers()
    {
        return $this->hasMany('App\Employer');
    }
    protected $fillable = [
        'nom_dep'
    ];
    use SoftDeletes;
}
