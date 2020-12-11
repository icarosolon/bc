<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'id',
        'article_id',
        'name',
        'document',
    ];

    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
