<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{

    protected $fillable = [
        'employer_id', 'nom', 'email', 'subject', 'id_societe','repondre',
    ];
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
}
