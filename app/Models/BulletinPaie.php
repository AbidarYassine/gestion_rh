<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BulletinPaie extends Model
{
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
    public function cotisations()
    {
        return $this->hasMany('App\Cotisation');
    }
    protected $fillable = [
        'date_paie_debut', 'date_paie_dfin', 'id_societe','interit', 'employer_id', 'cout_heurSup', 'avantage', 'exoneration', 'nbr_heur_sup', 'sbg', 'sbi'
    ];
    use SoftDeletes;
}
