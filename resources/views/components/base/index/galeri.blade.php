<div class="page_content_wrap page_paddings_yes" id="galeri-section">
    <div class="content_wrap">
        <h2 class="sc_team_title sc_item_title">Galeri</h2>
        <img class="center-block margin_bottom_small" src="{{ asset('asset/img/bawah_judul.png') }}"/>
        <div class="content">
            <article class="post_item post_item_single post_featured_default post_format_standard page hentry">
                <section class="post_content">
                    <div class="sc_section margin_bottom_large">
                        <div class="sc_section_inner">
                            <article class="myportfolio-container minimal-light" id="esg-grid-1-1-wrap">
                                <div id="esg-grid-1-1" class="esg-grid">
                                    <article class="esg-filters esg-singlefilters">
                                        <div class="esg-filter-wrapper esg-fgc-1">
                                            <div class="esg-filterbutton selected esg-allfilter" style="display: none"
                                                 data-filter="filterall" data-fid="-1">
                                                <span>All</span>
                                            </div>
                                            <div class="esg-filterbutton" data-fid="11"
                                                 data-filter="filter-our-clients" style="display: none">
                                                <span>Cafe</span>
                                                <span class="esg-filter-checked">
                                                            <i class="eg-icon-ok-1"></i>
                                                        </span>
                                            </div>
                                            <div class="esg-filterbutton" data-fid="12"
                                                 data-filter="filter-desserts" style="display: none">
                                                <span>Mantap</span>
                                                <span class="esg-filter-checked">
                                                            <i class="eg-icon-ok-1"></i>
                                                        </span>
                                            </div>
                                            <div class="esg-filterbutton" data-fid="13"
                                                 data-filter="filter-drinks" style="display: none">
                                                <span>Kopi</span>
                                                <span class="esg-filter-checked">
                                                            <i class="eg-icon-ok-1"></i>
                                                        </span>
                                            </div>
                                            <div class="esg-filterbutton" data-fid="14"
                                                 data-filter="filter-events" style="display: none">
                                                <span>Events</span>
                                                <span class="esg-filter-checked">
                                                            <i class="eg-icon-ok-1"></i>
                                                        </span>
                                            </div>
                                            <div class="eg-clearfix"></div>
                                        </div>
                                    </article>
                                    <div class="esg-clear-no-height"></div>
                                    <ul>
                                        @foreach($images as $image)
                                            <li class="filterall filter-blog-with-sidebar filter-blog-without-sidebar filter-masonry-2-columns filter-masonry-3-columns filter-desserts filter-events filter-video eg-washington-wrapper eg-post-id-56"
                                                data-date="1441107707">
                                                <div class="esg-media-cover-wrapper">
                                                    <div class="esg-entry-media">
                                                        <img src="{{ asset('storage/gallery/image/'.$image->modified_filename) }}" alt="">
                                                    </div>
                                                    <div class="esg-entry-cover esg-fade" data-delay="0">
                                                        <div class="esg-overlay esg-fade eg-washington-container"
                                                             data-delay="0"></div>
                                                        <div
                                                            class="esg-center eg-post-56 eg-washington-element-0-a esg-falldown"
                                                            data-delay="0.1">
                                                            <a class="eg-washington-element-0 eg-post-56 esgbox"
                                                               href="{{ asset('storage/gallery/image/'.$image->modified_filename) }}">
                                                                <i class="eg-icon-search"></i>
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="esg-center eg-post-56 eg-washington-element-1-a esg-falldown"
                                                            data-delay="0.2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                            <div class="clear">
                                <nav id="pagination" class="pagination_wrap pagination_pages">
                                    {{ $images->links('components.pagination-gallery') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </article>
            @foreach($videos as $video)
                {!! $video->prod_embed !!}
            @endforeach
            <section class="related_wrap related_wrap_empty"></section>
        </div>
    </div>
</div>
