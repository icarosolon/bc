<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'articles_id',
        'title',
        'description',
        'image'

    ];

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }
}
