<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CongetType extends Model
{
    public function congets(){
        return $this->hasMany('App\Conget');
    }
    use SoftDeletes;
    protected $fillable = [
        'type',
    ];
}
