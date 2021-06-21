<?php

namespace App\Models\Promo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    public function image(){
        return $this->hasOne(Image::class,'promo_id','id');
    }
}
