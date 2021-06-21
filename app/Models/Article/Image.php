<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;

    protected $table = 'article_images';

    protected $appends = ['image_url'];

    private $path = 'storage'.DIRECTORY_SEPARATOR.'article';

    /**
     * The getter that return accessible URL for user photo.
     *
     * @var array
     */
    public function getImageUrlAttribute()
    {
        return asset($this->path.DIRECTORY_SEPARATOR.$this->modified_filename);
    }
}
