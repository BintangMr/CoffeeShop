@extends('layouts.base')

@section('title','Menu')

@section('menu-','current-menu-item')
@section('body','single single-product woocommerce woocommerce-page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive')

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">{{ $produk->name }}</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{'index'}}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $produk->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <article class="post_item post_item_single post_item_product">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('index') }}">Home</a>&nbsp;&#47;&nbsp;
                    &nbsp;{{ $produk->name }}
                </nav>
                <div id="product-140" class="post-140 product has-post-thumbnail first sale">
                    @if($produk->discount_price)
                    <span class="onsale">Sale!</span>
                    @endif
                    <div class="images">
                        <a href="{{asset('storage/product/serbuk/'.$produk->image_serbuk->modified_filename)}}"
                           class="woocommerce-main-image zoom" title=""
                           data-rel="prettyPhoto[product-gallery]">
                            <img src="{{asset('storage/product/serbuk/'.$produk->image_serbuk->modified_filename)}}"
                                 class="attachment-shop_single size-shop_single"
                                 alt="{{ $produk->name }}" title="{{ $produk->name }}"/>
                        </a>
                        <div class="thumbnails columns-4">
                            <a href="{{asset('storage/product/serbuk/'.$produk->image_serbuk->modified_filename)}}"
                               class="zoom first" title=""
                               data-rel="prettyPhoto[product-gallery]">
                                <img src="{{asset('storage/product/serbuk/'.$produk->image_serbuk->modified_filename)}}"
                                     class="attachment-shop_thumbnail size-shop_thumbnail"
                                     alt="croissant" title="croissant"/></a>
                            </a>
                        </div>
                    </div>
                    <div class="summary entry-summary">
                        <h1 class="product_title entry-title">{{ $produk->name }}</h1>
                        <div>
                            <p class="price">
                                @if($produk->discount_price)
                                    <del>
                                            <span class="woocommerce-Price-amount amount">
                                                 Rp. {{ number_format($produl->discount_price) }}
                                            </span>
                                    </del>
                                    <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                Rp. {{ number_format($produk->original_price - $produl->discount_price) }}
                                            </span>
                                    </ins>
                                @else
                                    <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                Rp. {{ number_format($produk->original_price) }}
                                            </span>
                                    </ins>
                                @endif

                            </p>
                        </div>
                        <div>
                            <p>{{ $produk->simple_description }}</p>
                        </div>
                        <form class="cart" method="post" enctype='multipart/form-data'>
                            <a href="{{ $contact->whatsapp }}" target="_blank" class="single_add_to_cart_button button alt color-gold">Whatsapp</a>
                            <a href="{{ $contact->market_place }}" target="_blank" class="single_add_to_cart_button button alt color-gold"">Market Place</a>
                        </form>
                    </div>
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="tabs wc-tabs">
                            <li class="description_tab" id="desc-btn">
                                <a href="#tab-description">Deskripsi</a>
                            </li>
                        </ul>
                        <div
                            class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                            id="tab-description">
                            <h2>Deskripsi Produk</h2>
                            {!! $produk->long_description !!}
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>

@endsection

@push('css')
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/magnific/magnific-popup.css")}}' type='text/css'
          media='all'/>
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/prettyPhoto/prettyPhoto.css")}}' type='text/css'
          media='all'/>
    <style>
        .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce-account .addresses .title .edit {
            border: 2px solid #DAA520FF;
            color: #DAA520FF;
        }
        .woocommerce a.button:before, .woocommerce button.button:before, .woocommerce input.button:before, .woocommerce #respond input#submit:before, .woocommerce #content input.button:before, .woocommerce-page a.button:before, .woocommerce-page button.button:before, .woocommerce-page input.button:before, .woocommerce-page #respond input#submit:before, .woocommerce-page #content input.button:before, .woocommerce a.button.alt:before, .woocommerce button.button.alt:before, .woocommerce input.button.alt:before, .woocommerce #respond input#submit.alt:before, .woocommerce #content input.button.alt:before, .woocommerce-page a.button.alt:before, .woocommerce-page button.button.alt:before, .woocommerce-page input.button.alt:before, .woocommerce-page #respond input#submit.alt:before, .woocommerce-page #content input.button.alt:before, .woocommerce-account .addresses .title .edit:before{
            border-color: #DAA520FF;
        }
    </style>
@endpush

@push('js')
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/add-to-cart.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/woocommerce-add-to-cart.js")}}'></script>
    <script type='text/javascript'
            src='{{asset("asset/base/js/vendor/magnific/jquery.magnific-popup.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/ui/datepicker.min.js")}}'></script>
    <script type='text/javascript'
            src='{{asset("asset/base/js/vendor/prettyPhoto/jquery.prettyPhoto.min.js")}}'></script>
    <script type='text/javascript'
            src='{{asset("asset/base/js/vendor/prettyPhoto/jquery.prettyPhoto.init.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/single-product.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/jquery.blockUI.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/jquery.cookie.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/woo/cart-fragments.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/core.reviews.js")}}'></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#desc-btn').trigger('click');
        });
    </script>
@endpush
