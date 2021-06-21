@extends('layouts.base')

@section('title','Menu')

@section('menu-promo','current-menu-item')
@section('body','page teampg body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide preloader vc_responsive')

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">Promo</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{'index'}}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Promo</span>
                </div>
            </div>
        </div>
    </div>

    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="content">
                <article class="post_item post_item_single post_featured_default post_format_standard page hentry">
                    <section class="post_content">
                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div id="sc_team_358_wrap" class="sc_team_wrap">
                                            <div id="sc_team_358" class="sc_team sc_team_style_team-1 sc_slider_nopagination sc_slider_nocontrols margin_bottom_huge" data-interval="5641" data-slides-per-view="3" data-slides-min-width="250">
                                                <div class="sc_columns columns_wrap">
                                                    @foreach($promos as $promo)
                                                    <div class="column-1_3 column_padding_bottom">
                                                        <div id="{{$promo->id}}" class="sc_team_item sc_team_item_3">
                                                            <div class="sc_team_item_avatar">
                                                                <img width="370" height="370" alt="" src="{{ $promo->image->image_url }}">
                                                            </div>
                                                            <div class="sc_team_item_info">
                                                                <h5 class="sc_team_item_title">
                                                                    <a href="{{ $contact->market_place }}" target="_blank">{{ $promo->title }}</a>
                                                                </h5>
                                                                <div class="sc_team_item_description">{{ $promo->description }}</div>
                                                            </div>
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
                    </section>
                </article>
                <section class="related_wrap related_wrap_empty"></section>
            </div>
        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')
@endpush
