<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Product\Product;
use App\Models\Promo\Promo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
        $bean = Product::serbuk()->count();
        $beverage = Product::beverage()->count();
        $artikel = Article::count();
        $promo = Promo::count();
        return view('admin.dashboard',[
            'bean' => $bean,
            'beverage' => $beverage,
            'artikel' => $artikel,
            'promo' => $promo
        ]);
    }
}
