<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prime extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
    use SoftDeletes;
}
