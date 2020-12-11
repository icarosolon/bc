<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'units_id',
        'name',
        'description'
    ];
    
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function units()
    {
        return $this->belongsTo('App\Unit');
    }
}
