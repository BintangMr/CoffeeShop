<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
     class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="wpb_revslider_element wpb_content_element">
                    <div id="rev_slider_2_2_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                        <div id="rev_slider_2_2" class="rev_slider fullwidthabanner" data-version="5.1">
                            <ul>
                                @foreach($promos as $promo)
                                    <li data-index="{{ $promo->id }}" data-transition="fade" data-slotamount="default"
                                        data-easein="default" data-easeout="default" data-masterspeed="300"
                                        data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide"
                                        data-description="">
                                        <img src="{{ asset("asset/base/images/transparent.png") }}" alt=""
                                             data-bgposition="center center" data-bgfit="cover"
                                             data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                        <div class="tp-caption Hotcoffee-style-7 tp-resizeme" id="slide-4-layer-1"
                                             data-x="643" data-y="238" data-width="['auto']" data-height="['auto']"
                                             data-transform_idle="o:1;"
                                             data-transform_in="opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="opacity:0;s:500;s:500;" data-start="500"
                                             data-splitin="none" data-splitout="none" data-responsive_offset="on">Promo!
                                        </div>
                                        <div class="tp-caption Hotcoffee-style-8 tp-resizeme" id="slide-4-layer-2"
                                             data-x="645" data-y="359" data-width="['auto']" data-height="['auto']"
                                             data-transform_idle="o:1;"
                                             data-transform_in="opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="opacity:0;s:500;s:500;" data-start="500"
                                             data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                            {{ $promo->title }}
                                        </div>
                                        <div class="tp-caption Hotcoffee-style-9 tp-resizeme" id="slide-4-layer-3"
                                             data-x="645" data-y="454" data-width="['auto']" data-height="['auto']"
                                             data-visibility="['on','on','on','off']" data-transform_idle="o:1;"
                                             data-transform_in="opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="opacity:0;s:500;s:500;" data-start="500"
                                             data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                                {!! $promo->description !!}
                                        </div>
                                        <div class="tp-caption no-style" id="slide-4-layer-4" data-x="654" data-y="565"
                                             data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;"
                                             data-transform_in="opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="opacity:0;s:500;s:500;" data-start="500"
                                             data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                             data-responsive="off">
                                            <a href="{{ $contact->market_place }}" target="_blank"
                                               class="sc_button sc_button_square sc_button_style_border_2 sc_button_size_medium">Market Place</a>
                                        </div>
                                        <div class="tp-caption tp-resizeme" id="slide-4-layer-5" data-x="70"
                                             data-y="205" data-width="['none','none','none','none']"
                                             data-height="['none','none','none','none']" data-transform_idle="o:1;"
                                             data-transform_in="x:-50px;opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="x:-50px;opacity:0;s:500;s:500;" data-start="500"
                                             data-responsive_offset="on">
                                            <img src="{{ $promo->image->image_url }}" alt="" width="524"
                                                 height="523" data-ww="524px" data-hh="523px" data-no-retina>
                                        </div>
                                        <div class="tp-caption tp-resizeme" id="slide-4-layer-6" data-x="649"
                                             data-y="118" data-width="['none','none','none','none']"
                                             data-height="['none','none','none','none']" data-transform_idle="o:1;"
                                             data-transform_in="opacity:0;s:500;e:Power2.easeInOut;"
                                             data-transform_out="opacity:0;s:500;s:500;" data-start="500"
                                             data-responsive_offset="on">
                                            <img src="{{ asset("asset/base/images/second_slider_el_2.png") }}" alt=""
                                                 width="202" height="104" data-ww="202px" data-hh="104px"
                                                 data-no-retina>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tp-bannertimer tp-bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
