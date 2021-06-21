@extends('layouts.base')

@section('title','Bersama Kopi Temukan Inspiras')
@section('menu-beranda','current-menu-item')
@section('body','home page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide preloader vc_responsive')

@push('css')
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/esg/settings.css")}}' type='text/css' media='all'/>
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/esg/lightbox.css")}}' type='text/css' media='all'/>
@endpush

@section('banner')
    @include('components.base.index.banner')
@endsection

@section('content')
    {{--  Intermezzo Section  --}}
    @include('components.base.index.intermezzo')
    {{--  End Intermezzo Section  --}}

    <div class="vc_row-full-width" id="about-section"></div>

    {{--  Tentang Kami Section  --}}
    @include('components.base.index.about')
    {{--  End Tentang Kami Section  --}}
    <div class="vc_row-full-width"></div>

    <div class="vc_row-full-width"></div>

    {{--  Tentang Kami Section  --}}
    @include('components.base.index.promo')
    {{--  End Tentang Kami Section  --}}
    <div class="vc_row-full-width"></div>

    {{--  Kenapa Memilih kami  --}}
    @include('components.base.index.kenapa-memilih')
    {{--  End  Kenapa Memilih kami  --}}

    <div class="vc_row-full-width"></div>

    {{--  Menu Section  --}}
    @include('components.base.index.menu')
    {{--  Menu Section  --}}

    <div class="vc_row-full-width"></div>
    {{--  Produk Section  --}}
    @include('components.base.index.produk')
    {{--  Produk Section  --}}

    <div class="vc_row-full-width margin_top_huge" ></div>

    @include('components.base.index.testimoni')

    <div class="vc_row-full-width margin_top_huge" id="artikel-section"></div>

    {{--  Article Section  --}}
    @include('components.base.index.artikel')
    {{--  End Article Section  --}}

    <div class="vc_row-full-width"></div>
    {{--  Galeri Section  --}}
    @include('components.base.index.galeri')
    {{--  End Galeri Section  --}}
    <div class="vc_row-full-width" id="kontak-section"></div>

    @include('components.base.index.maps')

@endsection

@push('css')
    <link rel='stylesheet' href='{{asset("asset/base/js/vendor/swiper/swiper.css")}}' type='text/css' media='all' />
@endpush

@push('js')
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/esg/lightbox.js")}}'></script>
    <script type='text/javascript'
            src='{{asset("asset/base/js/vendor/esg/jquery.themepunch.essential.min.js")}}'></script>
    <script type='text/javascript' src='{{ asset('asset/base/js/custom/core.utils.js')}}'></script>
    <script type='text/javascript' src='{{ asset('asset/base/js/vendor/ui/widget.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('asset/base/js/vendor/ui/tabs.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('asset/base/js/vendor/ui/effect.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('asset/base/js/vendor/ui/effect-fade.min.js')}}'></script>
    <script type='text/javascript' src='{{asset("asset/base/js/vendor/swiper/swiper.js")}}'></script>
@endpush
