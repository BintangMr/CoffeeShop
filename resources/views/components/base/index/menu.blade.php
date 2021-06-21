<div data-vc-full-width="true" data-vc-full-width-init="false" id="menu-section"
     style="background-image: url({{ asset('asset/img/begron.jpg') }})"
     class="vc_row wpb_row vc_row-fluid vc_custom_1455545189644">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="vc_empty_space space10p">
                    <span class="vc_empty_space_inner"></span>
                </div>
                <div class="sc_section aligncenter">
                    <div class="sc_section_inner">
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <h1 class="sc_title sc_title_regular sc_align_center">Beverage</h1>
                                <img class="center-block" src="{{ asset('asset/img/bawah_judul.png') }}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sc_tabs_730" class="sc_tabs sc_tabs_style_2 margin_top_large" data-active="0">
                    <ul class="sc_tabs_titles">
                        @foreach($beverages as $category)
                            <li class="sc_tabs_title">
                                <a href="#{{ $category->id }}-beverage" class="theme_button"
                                   id="{{ $category->id }}-beverage-tab">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @foreach($beverages as $category)
                        <div id="{{ $category->id }}-beverage" class="sc_tabs_content">
                            <div id="{{ $category->id }}-beverage_wrap" class="sc_menuitems_wrap">
                                <div id="{{ $category->id }}-beverage-menu"
                                     class="sc_menuitems sc_menuitems_style_menuitems-1 sc_slider_nopagination sc_slider_nocontrols margin_top_medium"
                                     data-interval="7492" data-slides-per-view="2">
                                    <div class="sc_columns columns_wrap">
                                        @foreach($category->product as $product)
                                            @if($product->status)
                                                <div class="column-1_2 column_padding_bottom">
                                                    <div id="{{ $product->id }}-beverage"
                                                         class="sc_menuitems_item sc_menuitems_item_1" data-url="#">
                                                        <div class="sc_menuitem_image">
                                                            <a class="show_popup_menuitem" href="#">
                                                                <img width="90" height="90" alt=""
                                                                     style="border-radius: 100%"
                                                                     @if($product->image_beverage) src="{{ asset('storage/product/beverage/'.$product->image_beverage->modified_filename) }}"
                                                                     @else src="{{asset("asset/base/images/2000x2000.png")}}" @endif>
                                                            </a>
                                                        </div>
                                                        <div class="sc_menuitem_price">
                                                            @if($product->discount_price)
                                                                <del style="color: #3a4250">
                                                                    Rp. {{ number_format($product->original_price) }} </del>
                                                                Rp. {{ number_format($product->original_price - $product->discount_price) }}
                                                            @else
                                                                Rp. {{ number_format($product->original_price) }}
                                                            @endif
                                                        </div>
                                                        <div class="sc_menuitem_title">
                                                            <a class="show_popup_menuitem menu-text"
                                                               href="#">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="sc_menuitem_description menu-desc">
                                                            {{ $product->simple_description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .menu-text {
            color: #7E481C;
        }

        .menu-text:hover {
            color: #DAA520FF;
        }

        .menu-desc {
            color: #453e3c;
        }
    </style>
@endpush



