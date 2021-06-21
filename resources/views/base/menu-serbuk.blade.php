@extends('layouts.base')

@section('title','Menu')

@section('menu-produk','current-menu-item')
@section('body','archive woocommerce woocommerce-page body_filled article_style_stretch layout_excerpt template_excerpt scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive')

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">Menu Serbuk</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{'index'}}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Menu Serbuk</span>
                </div>
            </div>
        </div>
    </div>
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="content">
                <div class="list_products shop_mode_thumbs" id="mennuHandler">
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('index') }}">Beranda</a>&nbsp;&#47;&nbsp;Menu
                    </nav>
                    <div class="mode_buttons" style="display: none">
                        <form action="#" method="post">
                            <a href="#" id="btnThumbnail" class="woocommerce_thumbs icon-th"
                               title="Tampilkan produk sebagai thumbnail"></a>
                            <a href="#" id="btnList" class="woocommerce_list icon-th-list"
                               title="Tampilkan produk sebagai list"></a>
                        </form>
                    </div>
                    <p class="woocommerce-result-count"> Menampilkan {{ $produks->count() }} results</p>
                    <ul class="products">
                        @foreach($produks as $produk)
                            <li class="product has-post-thumbnail column-1_3 @if($produk->discount_price) sale @endif">
                                <a href="{{ route('produk.detail',$produk->id) }}"
                                   class="woocommerce-LoopProduct-link"></a>
                                <div class="post_item_wrap">
                                    <div class="post_featured">
                                        <div class="post_thumb">
                                            <a class="hover_icon hover_icon_link"
                                               href="{{ route('produk.detail',$produk->id) }}">
                                                @if($produk->discount_price) <span class="onsale">Diskon!</span> @endif
                                                <img
                                                    src="{{asset('storage/product/serbuk/'.$produk->image_serbuk->modified_filename)}}"
                                                    class="attachment-shop_catalog size-shop_catalog" alt="arabika-aceh"
                                                    title="{{ $produk->name }}"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post_content">
                                        <h3>
                                            <a href="{{ route('produk.detail',$produk->id) }}">{{ $produk->name }}</a>
                                        </h3>
                                        <div class="description">
                                            <p>{{ $produk->simple_description }}</p>
                                        </div>
                                        <span class="price">
                                            @if($produk->discount_price)
                                                <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>10.00
                                            </span>
                                    </del>
                                                <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>Rp. {{ number_format($produk->original_price - $produl->discount_price) }}
                                            </span>
                                    </ins>
                                            @else
                                                <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#36;</span>Rp. {{ number_format($produk->original_price) }}
                                            </span>
                                    </ins>
                                            @endif
                                        </span>
                                        <a href="{{ route('produk.detail',$produk->id) }}"></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <nav id="pagination" class="pagination_wrap pagination_pages">
                        {{ $produks->links('components.pagination') }}
                    </nav>
                </div>
            </div>
            <div class="sidebar widget_area scheme_original" role="complementary">
                <div class="sidebar_inner widget_area_inner">
                    <aside class="widget woocommerce widget_product_categories">
                        <h5 class="widget_title">Biji dan Serbuk Kopi</h5>
                        <ul class="product-categories">
                            @foreach($categories as $category)
                                <li class="cat-item">
                                    <a href="#">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .btnShopee a.button:before {
            border-color: orange !important;
        }
    </style>
@endpush

@push('js')
@endpush
