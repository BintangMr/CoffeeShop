<?php

namespace App\Models\Product;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
