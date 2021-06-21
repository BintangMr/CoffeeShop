<div data-vc-full-width="true" data-vc-full-width-init="false"
     style="background-image: url({{ asset('asset/img/bg_produk_serbuk.jpg') }})"
     class="vc_row wpb_row vc_row-fluid vc_custom_1455545189644">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="vc_empty_space space10p">
                    <span class="vc_empty_space_inner"></span>
                </div>
                <h2 class="sc_title sc_title_regular sc_align_center">Biji dan Serbuk Kopi </h2>
                <img class="center-block" src="{{ asset('asset/img/bawah_judul.png') }}"/>
                <div id="sc_services_258_wrap" class="sc_services_wrap">
                    <div id="sc_services_258"
                         class="sc_services sc_services_style_services-3 sc_services_type_icons sc_slider_nopagination sc_slider_nocontrols margin_top_huge margin_bottom_huge"
                         data-interval="5914" data-slides-per-view="3" data-slides-min-width="250"
                         data-animation="animated fadeInUp normal">
                        <div class="sc_columns columns_wrap">
                            @foreach($serbuk as $item)
                                <div class="column-1_4 column_padding_bottom">
                                    <div id="{{$item->id}}" class="sc_services_item">
                                        <div class="sc_services_item_featured post_featured">
                                            <div class="post_thumb"
                                                 data-image="{{ $item->image_serbuk->image_url }}"
                                                 data-title="Arabika">
                                                <a class="hover_icon hover_icon_link" href="{{ route('produk.detail',$item->id) }}">
                                                    <img alt="{{ $item->name }}"
                                                         src="{{ asset('storage/product/serbuk/'.$item->image_serbuk->modified_filename) }}">
                                                </a>
                                            </div>
                                        </div>
                                        <h4 class="sc_services_item_title margin_top_small produk-title">
                                            <a href="{{ route('produk.detail',$item->id) }}">{{ $item->name }}</a>
                                        </h4>
                                        <h4 class="sc_services_item_title margin_top_small produk-title">
                                            <a href="{{ route('produk.detail',$item->id) }}">Rp. {{ number_format($item->original_price - $item->discount_price) }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .produk-title {
            font-family: Droid Serif !important;
        }

        .sc_services_style_services-3 .sc_services_item:hover .sc_services_item_title a, .sc_services_style_services-3 .sc_services_item_title a:hover{
            color: #DAA520FF;
        }
    </style>
@endpush
