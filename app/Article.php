<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArticleCategory;


class Article extends Model
{
    use \Conner\Tagging\Taggable;

    public function category(){
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
