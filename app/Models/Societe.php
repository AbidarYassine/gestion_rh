<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Societe extends Model
{
    public function employers()
    {
        return $this->hasMany('App\Employer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'nom_societe', 'devise', 'description', 'adresse', 'GSM', 'email', 'pays', 'ville', 'code_postall', 'site_internet', 'user_id', 'description'
    ];

    public function demande_paies()
    {
        return $this->hasMany('App\DemandePaie');
    }

    public function parametre()
    {
        return $this->hasOne('App\Parametre', 'societe_id');
    }

    use SoftDeletes;
}
