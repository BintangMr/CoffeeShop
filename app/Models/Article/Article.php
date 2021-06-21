<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

    public function image(){
        return $this->hasOne(Image::class,'article_id','id');
    }
}
