<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{
    protected $fillable = [
        'employers_id', 'presences_id'
    ];
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
    use SoftDeletes;
}
