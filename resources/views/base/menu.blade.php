@extends('layouts.base')

@section('title','Menu')

@section('menu-menu','current-menu-item')
@section('body','archive woocommerce woocommerce-page body_filled article_style_stretch layout_excerpt template_excerpt scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive')

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">Menu</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{'index'}}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Menu</span>
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
                    <div class="mode_buttons">
                        <form action="#" method="post">
                            <a href="#" id="btnThumbnail" class="woocommerce_thumbs icon-th"
                               title="Tampilkan produk sebagai thumbnail"></a>
                            <a href="#" id="btnList" class="woocommerce_list icon-th-list"
                               title="Tampilkan produk sebagai list"></a>
                        </form>
                    </div>
                    <p class="woocommerce-result-count"> Showing 1&ndash;4 of 8 results</p>
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby">
                            <option value="menu_order" selected='selected'>Tidak ada pengurutan</option>
                            <option value="popularity">Berdasarkan Popularitas</option>
                            <option value="rating">Berdasarkan Rating</option>
                            <option value="date">Terbaru</option>
                            <option value="price">Harga rendah ke tinggi</option>
                            <option value="price-desc">Harga tinggi ke rendah</option>
                        </select>
                        <input type="hidden" name="q" value="#"/>
                    </form>
                    <ul class="products">
                        <li class="product has-post-thumbnail column-1_2 first sale">
                            <a href="#" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="#">
                                            <span class="onsale">Diskon!</span>
                                            <img src="{{asset("asset/img/arabika_aceh.jpg")}}"
                                                 class="attachment-shop_catalog size-shop_catalog" alt="arabika-aceh"
                                                 title="Arabika Aceh"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="#">Arabika Aceh</a>
                                    </h3>
                                    <div class="description">
                                        <p>Deskripsi di sini</p>
                                    </div>
                                    <span class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>RP. 35.000</span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>Rp. 30.000
                                                </span>
                                            </ins>
                                        </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="140"
                                       data-product_sku=""
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart">Market Place</a>
                                </div>
                            </div>
                        </li>
                        <li class="product has-post-thumbnail column-1_2 last">
                            <a href="#" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="#">
                                            <img src="{{asset("asset/img/arabika_bali.jpg")}}"
                                                 class="attachment-shop_catalog size-shop_catalog" alt="arabika bali"
                                                 title="arabika bali"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="#">Arabika Bali</a>
                                    </h3>
                                    <div class="description">
                                        <p>Deskripsi di sini</p>
                                    </div>
                                    <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span>Rp. 35.000</span>
                                            </span>
                                    <a href="#"></a>
                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="139"
                                       data-product_sku=""
                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart">Market Place</a>
                                </div>
                            </div>
                        </li>
                        <li class="product has-post-thumbnail column-1_2 last">
                            <a href="#" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="#">
                                            <span class="onsale">Diskon!</span>
                                            <img src="{{asset("asset/img/kopi_susu.jpg")}}"
                                                 class="attachment-shop_catalog size-shop_catalog"
                                                 alt="Kopi Susu Gula Aren" title="Kopi Susu"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="#">Kopi Susu</a>
                                    </h3>
                                    <div class="description">
                                        <p>Deskripsi di sini</p>
                                    </div>
                                    <span class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>RP. 10.000</span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>Rp. 9.000
                                                </span>
                                            </ins>
                                        </span>
                                    <a href="#"></a>
                                </div>
                            </div>
                        </li>

                        <li class="product has-post-thumbnail column-1_2 last">
                            <a href="#" class="woocommerce-LoopProduct-link"></a>
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a class="hover_icon hover_icon_link" href="#">
                                            <span class="onsale">Diskon!</span>
                                            <img src="{{asset("asset/img/kopi_susu_gula_aren.jpeg")}}"
                                                 class="attachment-shop_catalog size-shop_catalog"
                                                 alt="Kopi Susu Gula Aren" title="Kopi Susu Gula Aren"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h3>
                                        <a href="#">Kopi Susu Gula Aren</a>
                                    </h3>
                                    <div class="description">
                                        <p>Deskripsi di sini</p>
                                    </div>
                                    <span class="price">
                                            <del>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>RP. 20.000</span>
                                            </del>
                                            <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">&#36;</span>Rp. 10.000
                                                </span>
                                            </ins>
                                        </span>
                                    <a href="#"></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <nav id="pagination" class="pagination_wrap pagination_pages">
                        <span class="pager_current active ">1</span>
                        <a href="#" class="">2</a>
                        <a href="#" class="pager_next"></a>
                        <a href="#" class="pager_last"></a>
                    </nav>
                </div>
            </div>
            <div class="sidebar widget_area scheme_original" role="complementary">
                <div class="sidebar_inner widget_area_inner">
                    <aside class="widget woocommerce widget_product_categories">
                        <h5 class="widget_title">Biji dan Serbuk Kopi</h5>
                        <ul class="product-categories">
                            <li class="cat-item">
                                <a href="#">Arabika</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Blend</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Robusta</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget woocommerce widget_product_categories">
                        <h5 class="widget_title">Kopi Instan</h5>
                        <ul class="product-categories">
                            <li class="cat-item">
                                <a href="#">Espresso</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Kopi Susu</a>
                            </li>
                            <li class="cat-item">
                                <a href="#">Manual Brew</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget_socials">
                        <h5 class="widget_title">Ikuti Kami</h5>
                        <div class="widget_inner">
                            <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                                @include('components.base.social')
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        jQuery(document).ready(function (){
            var btnThumbnail = jQuery('#btnThumbnail')
            var btnList = jQuery('#btnList')

            var menuHandler = jQuery('#mennuHandler');

            jQuery('.description').each(function(i, obj) {
                jQuery(this).hide()
            });

            btnThumbnail.click(function (e){
                e.preventDefault();
                menuHandler.removeClass('shop_mode_list').addClass('shop_mode_thumbs')
                jQuery('.description').each(function(i, obj) {
                    jQuery(this).hide()
                });
            })

            btnList.click(function (e){
                e.preventDefault();
                menuHandler.removeClass('shop_mode_thumbs').addClass('shop_mode_list')
                jQuery('.description').each(function(i, obj) {
                    jQuery(this).show()
                });
            })
        })
    </script>
@endpush
