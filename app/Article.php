<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'sectors_id',
        'title',
        'description',
        'rank_search',
        'rank_like',
        'keywords'
    ];

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function sectors()
    {
        return $this->belongsTo('App\Sector');
    }

}
