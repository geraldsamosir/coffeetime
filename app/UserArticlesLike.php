<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserArticlesLike extends Model
{
    public $timestamps = false;
    public function article() {
        return $this->belongsTo('App\Article','article_id');
    }
}
