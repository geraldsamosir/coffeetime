<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArticleCategory;
use Voyager;


class Article extends Model
{
    use \Conner\Tagging\Taggable;

    public function categoryId(){
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }

    public function productId(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function parentId(){
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function userId(){
        return $this->belongsTo(Voyager::modelClass('User'), 'user_id');
    }
}
