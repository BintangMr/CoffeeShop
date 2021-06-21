<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;

    protected $appends = ['embed','prod_embed'];

    /**
     * The getter that return accessible URL for user photo.
     *
     * @var array
     */
    public function getEmbedAttribute()
    {
        $embed = parse_url($this->url);
        parse_str($embed['query'], $query);
        return '<iframe width="200" height="100" src="https://www.youtube.com/embed/'.$query['v'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    /**
     * The getter that return accessible URL for user photo.
     *
     * @var array
     */
    public function getProdEmbedAttribute()
    {
        $embed = parse_url($this->url);
        parse_str($embed['query'], $query);
        return '<iframe class="column-1_3"  width="90%" height="315" width="560" height="315" src="https://www.youtube.com/embed/'.$query['v'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}
