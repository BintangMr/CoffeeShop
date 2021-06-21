<?php

namespace App\Models\Product;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    private $beverage = "BEVERAGE";
    private $serbuk = "POWDER";
    protected $table = 'product_categories';
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function scopeBeverage($query)
    {
        return $query->where('type', $this->beverage);;
    }

    public function scopeSerbuk($query)
    {
        return $query->where('type', $this->serbuk);;
    }
}
