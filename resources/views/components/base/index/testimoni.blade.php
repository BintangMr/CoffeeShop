<article class="post_item post_item_single post_featured_default post_format_standard page hentry">
    <section class="post_content">
        <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div id="sc_testimonials_721"
                             class="sc_testimonials sc_testimonials_style_testimonials-1 sc_slider_swiper swiper-slider-container sc_slider_pagination sc_slider_pagination_bottom sc_slider_nocontrols margin_bottom_medium"
                             data-interval="7005" data-slides-min-width="250">
                            <h2 class="sc_testimonials_title sc_item_title">Testimoni</h2>
                            <div class="slides swiper-wrapper">
                                @foreach($testimonis as $testimoni)
                                    <div class="swiper-slide" data-style="width:100%;">
                                        <div id="{{ $testimoni->id }}" class="sc_testimonial_item">
                                            <div class="sc_testimonial_content">
                                                <p>{{ $testimoni->description }}</p>
                                            </div>
                                            <div class="sc_testimonial_author">
                                                <span class="sc_testimonial_author_name">{{ $testimoni->name }}</span>
                                                <span class="sc_testimonial_author_position">{{ $testimoni->job }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="sc_slider_controls_wrap">
                                <a class="sc_slider_prev" href="#"></a>
                                <a class="sc_slider_next" href="#"></a>
                            </div>
                            <div class="sc_slider_pagination_wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

