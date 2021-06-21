<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article\Article;
use App\Models\Contact;
use App\Models\GalleryImage;
use App\Models\GalleryVideo;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Promo\Promo;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request){
        $beverage = Category::beverage()->with('product.image_beverage')->get();
        $serbuk = Product::serbuk()->with('image_serbuk')->where('status',true)->get();
        $about = About::first();
        $contact = Contact::first();
        $promos = Promo::where('status',true)->get();
        $testimonis = Testimoni::where('status',true)->get();
        $articles = Article::where('status',true)->get();
        $image = GalleryImage::where('status',true)->paginate(9);
        $video = GalleryVideo::where('status',true)->get();
        return view('index',[
            'beverages' => $beverage,
            'about' => $about,
            'contact' => $contact,
            'promos' => $promos,
            'serbuk' => $serbuk,
            'testimonis' => $testimonis,
            'articles' => $articles,
            'images' => $image,
            'videos' => $video,
        ]);
    }

    public function promo(Request $request){
        $promos = Promo::all();
        $contact = Contact::first();

        return view('base.promo',[
            'promos' => $promos,
            'contact' => $contact
        ]);
    }

    public function artikel_list(Request $request){
        $articles = Article::all();

        return view('base.artikel-list',[
            'articles' => $articles,
        ]);
    }

    public function artikel_detail(Request $request,$id){
        $article = Article::findOrFail($id);

        return view('base.artikel',[
            'article' => $article,
        ]);
    }

    public function produk_detail(Request $request,$id){
        $produk = Product::findOrFail($id);
        $contact = Contact::first();

        return view('base.produk',[
            'produk' => $produk,
            'contact' => $contact,
        ]);
    }

    public function produk_list(Request $request){
        $produks = Product::serbuk()->paginate(6);
        $contact = Contact::first();
        $category = Category::serbuk()->get();

        return view('base.menu-serbuk',[
            'produks' => $produks,
            'contact' => $contact,
            'categories' => $category,
        ]);
    }
}
