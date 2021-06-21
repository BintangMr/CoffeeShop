<?php

namespace App\Models\Product;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    private $beverage = "BEVERAGE";
    private $serbuk = "POWDER";
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function image_beverage(){
        return $this->hasOne(Image::class,'product_id','id');
    }

    public function image_serbuk(){
        return $this->hasOne(Image::class,'product_id','id');
    }

    public function category_beverage(){
        return $this->belongsTo(Category::class,'category_id','id')->where('type', $this->beverage);
    }

    public function category_serbuk(){
        return $this->belongsTo(Category::class,'category_id','id')->where('type', $this->serbuk);
    }

    public function scopeBeverage($query)
    {
        return $query->whereHas('category_beverage')->with('category_beverage','image_beverage');
    }

    public function scopeSerbuk($query)
    {
        return $query->whereHas('category_serbuk')->with('category_serbuk','image_serbuk');
    }

}
