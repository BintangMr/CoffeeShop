<li class="menu-item @yield('menu-beranda')">
    <a href="{{ route('index') }}">Beranda</a></li>
<li class="menu-item">
    <a
        @if( 'index' == Route::currentRouteName())
        href="#about-section"
        @else
        href="{{route('index')}}#about-section"
        @endif>
        Tentang
    </a>
</li>
<li class="menu-item @yield('menu-promo')"><a href="{{ route('promo') }}">Promo</a></li>

<li class="menu-item @yield('menu-menu')">
    <a
        @if( 'index' == Route::currentRouteName())
        href="#menu-section"
        @else
        href="{{route('index')}}#menu-section"
        @endif>
        Beverage
    </a>
</li>
<li class="menu-item @yield('menu-produk')"><a href="{{ route('menu.serbuk') }}">Produk</a></li>
<li class="menu-item @yield('menu-artikel')"><a href="{{ route('artikel.list') }}">Artikel</a></li>
<li class="menu-item">
    <a
        @if( 'index' == Route::currentRouteName())
        href="#galeri-section"
        @else
        href="{{route('index')}}#galeri-section"
        @endif>
        Galeri
    </a>
</li>

<li class="menu-item">
    <a
        @if( 'index' == Route::currentRouteName())
        href="#kontak-section"
        @else
        href="{{route('index')}}#kontak-section"
        @endif>
        Kontak
    </a>
</li>
{{--<li class="menu-item menu-item-has-children @yield('menu-produk')"><a href="#">Produk</a>--}}
{{--    <ul class="sub-menu">--}}
{{--        <li class="menu-item"><a href="{{ route('menu.instan') }}">Kopi Instan</a></li>--}}
{{--        <li class="menu-item"><a href="{{ route('menu.serbuk') }}">Kopi Serbuk</a></li>--}}
{{--        <li class="menu-item menu-item-has-children"><a href="#">Blog Masonry</a>--}}
{{--            <ul class="sub-menu">--}}
{{--                <li class="menu-item"><a href="masonry-3-columns.html">Masonry 3 Columns</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</li>
