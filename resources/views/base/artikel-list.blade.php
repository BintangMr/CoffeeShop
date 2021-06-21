@extends('layouts.base')

@section('title','Kontak')

@section('menu-artikel','current-menu-item')

@section('body','archive body_filled article_style_stretch layout_masonry_3 template_masonry scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide preloader vc_responsive')

@push('css')
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/magnific/magnific-popup.css")}}' type='text/css'
          media='all'/>
@endpush

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">List Artikel</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ route('index') }}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">List Artikel</span>
                </div>
            </div>
        </div>
    </div>
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="content">
                <div class="isotope_wrap " data-columns="3">
                    @foreach($articles as $article)
                        <div class="isotope_item isotope_item_masonry isotope_item_masonry_3 isotope_column_3">
                            <article class="post_item post_item_masonry post_item_masonry_3 post_format_standard">
                                <div class="post_featured">
                                    <div class="post_thumb" data-image="{{ $article->image->image_url }}" data-title="{{ $article->title }}">
                                        <a class="hover_icon hover_icon_link" href="{{ route('artikel.detail',$article->id) }}">
                                            <img width="370" height="246" alt="{{ $article->title }}" src="{{$article->image->image_url}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content isotope_item_content">
                                    <h5 class="post_title">
                                        <a href="{{ route('artikel.detail',$article->id) }}">{{ $article->title }}</a>
                                    </h5>
                                    <div class="post_info">
                                        <span class="post_info_item post_info_posted">
                                            <a href="{{ route('artikel.detail',$article->id) }}" class="post_info_date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</a>
                                        </span>
                                    </div>
                                    <div class="post_descr">
                                        <p>{{ $article->caption }}</p>
                                        <a href="{{ route('artikel.detail',$article->id) }}" class="post_readmore">
                                            <span class="post_readmore_label">Basa Selengkapnya</span>
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
@endsection
