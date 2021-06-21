@extends('layouts.base')

@section('title','Kontak')

@section('menu-artikel','current-menu-item')

@section('body','single single-post body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_right sidebar_outer_hide preloader vc_responsive')

@push('css')
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/magnific/magnific-popup.css")}}' type='text/css'
          media='all'/>
@endpush

@section('banner')
    <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
        <div
            class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
            <div class="content_wrap">
                <h1 class="page_title">{{ $article->title }}</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ route('index') }}">Beranda</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $article->title }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="">
                <article
                    class="post_item post_item_single post_featured_default post_format_standard post has-post-thumbnail hentry">
                    <section class="post_featured">
                        <div class="post_thumb" data-image="{{ $article->image->image_url }}"
                             data-title="Jangan di buang! Inilah manfaat ampas kopi untukmu">
                            <a class="hover_icon hover_icon_view" href="{{ $article->image->image_url }}"
                               title="Jangan di buang! Inilah manfaat ampas kopi untukmu">
                                <img alt="" src="{{$article->image->image_url}}">
                            </a>
                        </div>
                    </section>
                    <section class="post_content">
                        <div class="post_info">
                                <span class="post_info_item post_info_posted">
                                    <a href="#" class="post_info_date date updated"
                                       content="2015-11-29 11:08:46">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</a>
                                </span>
                        </div>
                        <div>
                            {!! $article->description !!}
                        </div>
                    </section>
                    <div class="post_info post_info_bottom post_info_share post_info_share_horizontal">
                        <div class="sc_socials sc_socials_size_small sc_socials_share sc_socials_dir_horizontal">
                            <span class="share_caption">Share:</span>
                            <div class="sc_socials_item social_item_popup">
                                <a href="" class="social_icons social_facebook"
                                   data-link="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fhotcoffee.themerex.net%2Fenglish-coffeehouses-in-the-17th-century%2F">
                                    <span class="icon-facebook"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item social_item_popup">
                                <a href="" class="social_icons social_twitter"
                                   data-link="https://twitter.com/intent/tweet?text=English+Coffeehouses+in+the+17th+Century&#038;url=http%3A%2F%2Fhotcoffee.themerex.net%2Fenglish-coffeehouses-in-the-17th-century%2F">
                                    <span class="icon-twitter"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item social_item_popup">
                                <a href="" class="social_icons social_linkedin"
                                   data-link="http://www.linkedin.com/shareArticle?mini=true&#038;url=http%3A%2F%2Fhotcoffee.themerex.net%2Fenglish-coffeehouses-in-the-17th-century%2F&#038;title=English+Coffeehouses+in+the+17th+Century">
                                    <span class="icon-linkedin"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script type='text/javascript' src='{{asset("asset/base/js/custom/social-share.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/comment-reply.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/embed.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/shortcodes.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/core.messages.js")}}'></script>
    <script type='text/javascript'
            src='{{asset("asset/base/js/vendor/magnific/jquery.magnific-popup.min.js")}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/custom/forms-api.min.js")}}'></script>
@endpush
