<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li>
            <a href="{{ route('admin.dashboard') }}" class="@yield('page.dashboard')">
                <i class="mdi mdi-view-dashboard"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="menu-title">Produk</li>

        <li>
            <a href="{{ route('admin.product.beverage.index') }}" class="@yield('page.product.beverage')">
                <i class="mdi mdi-coffee"></i>
                <span> Beverage </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.product.serbuk.index') }}" class="@yield('page.product.serbuk')">
                <i class="mdi mdi-sack"></i>
                <span> Serbuk </span>
            </a>
        </li>

        <li class="menu-title">UTIL</li>

        <li>
            <a href="{{ route('admin.article.index') }}" class="@yield('page.about')">
                <i class="mdi mdi-file-document"></i>
                <span> Artikel </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.testimoni.index') }}" class="@yield('page.tersimoni')">
                <i class="mdi mdi-account-heart-outline"></i>
                <span> Testimoni </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="mdi mdi-file-image-outline"></i>
                <span> Galeri </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                    <a href="{{ route('admin.gallery.image.index') }}" class="@yield('page.about')">Gambar</a>
                </li>

                <li>
                    <a href="{{ route('admin.gallery.video.index') }}" class="@yield('page.about')">Video</a>
                </li>
            </ul>
        </li>


        <li>
            <a  href="{{ route('admin.about.index') }}" class="@yield('page.about')">
                <i class="mdi mdi-account-group"></i>
                <span> About Us </span>
            </a>
        </li>

        <li>
            <a  href="{{ route('admin.contact.index') }}" class="@yield('page.contact')">
                <i class="mdi mdi-phone"></i>
                <span> Kontak </span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.promo.index') }}" class="@yield('page.promo')">
                <i class="mdi mdi-clover"></i>
                <span> Promo </span>
            </a>
        </li>

        <li class="menu-title">ACCESS</li>

        <li>
            <a href="{{ route('admin.user.index') }}" class="@yield('page.user')">
                <i class="mdi mdi-account"></i>
                <span> User </span>
            </a>
        </li>

    </ul>

</div>
