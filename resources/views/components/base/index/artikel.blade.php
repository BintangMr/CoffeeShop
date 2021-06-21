<article class="post_item post_item_single post_featured_default post_format_standard page hentry">
    <section class="post_content">
        <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div id="sc_team_358_wrap" class="sc_team_wrap">
                            <div id="sc_team_358"
                                 class="sc_team sc_team_style_team-1 sc_slider_nopagination sc_slider_nocontrols margin_bottom_huge"
                                 data-interval="5641" data-slides-per-view="3" data-slides-min-width="250">
                                <h2 class="sc_team_title sc_item_title">Artikel</h2>
                                <img class="center-block" src="{{ asset('asset/img/bawah_judul.png') }}"/>
                                <div class="sc_team_descr sc_item_descr"></div>
                                <div class="content_wrap">
                                    <div class="content">
                                        <div class="isotope_wrap " data-columns="3">
                                            @foreach($articles as $article)
                                                <div
                                                    class="isotope_item isotope_item_masonry isotope_item_masonry_3 isotope_column_3">
                                                    <article
                                                        class="post_item post_item_masonry post_item_masonry_3 post_format_standard">
                                                        <div class="post_featured">
                                                            <div class="post_thumb"
                                                                 data-image="{{ $article->image->image_url }}"
                                                                 data-title="{{ $article->title }}">
                                                                <a class="hover_icon hover_icon_link"
                                                                   href="{{ route('artikel.detail',$article->id) }}">
                                                                    <img width="370" height="246"
                                                                         alt="{{ $article->title }}"
                                                                         src="{{ $article->image->image_url }}">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="post_content isotope_item_content">
                                                            <h5 class="post_title">
                                                                <a href="{{ route('artikel.detail',$article->id) }}">{{ $article->title }}</a>
                                                            </h5>
                                                            <div class="post_info">
                                        <span class="post_info_item post_info_posted">
                                            <a href="{{ route('artikel.detail',$article->id) }}"
                                               class="post_info_date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</a>
                                        </span>
                                                            </div>
                                                            <div class="post_descr">
                                                                <p>{{ $article->caption }}</p>
                                                                <a href="{{ route('artikel.detail',$article->id) }}" class="post_readmore">
                                                                    <span
                                                                        class="post_readmore_label">Baca Selengkapnya</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<div class="vc_row wpb_row vc_row-fluid margin_top_none">
    <div class="wpb_column vc_column_container margin_top_none vc_col-sm-12">
        <div class="vc_column-inner margin_top_none">
            <div class="wpb_wrapper margin_top_none">
                <div class="sc_section aligncenter w80 margin_top_none"
                     data-animation="animated fadeInUp normal">
                    <div class="sc_section_inner">
                        <a href="{{ route('artikel.list') }}"
                           class="sc_button sc_button_square sc_button_style_border_2 sc_button_size_medium margin_bottom_large">Lebih
                            Banyak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
