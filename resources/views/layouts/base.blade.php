<!DOCTYPE html>
<html lang="en-US" class="scheme_original">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" type="image/x-icon" href="{{ asset("asset/img/logo-black.png") }}" />
    <title>Liberica &#8211; @yield('title') </title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i|Grand+Hotel|Open+Sans:300,400,600,700,800|Raleway:100,200,300,400,500,600,700,800,900|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;subset=latin-ext" type='text/css' media='all' >
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/revslider/settings.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/woo/woocommerce-layout.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/woo/woocommerce-smallscreen.css") }}' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/woo/woocommerce.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/fontello/css/fontello.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/style.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/core.animation.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/shortcodes.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/woo/plugin.woocommerce.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/skin.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/doc-style.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/responsive.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/skin.responsive.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/js/vendor/comp/comp.min.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/custom.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/core.messages.css") }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset("asset/base/css/core.portfolio.css") }}' type='text/css' media='all' />
    <link href="{{asset("asset/admin/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css"/>

    @stack('css')

    @yield('css')

    <style>
        .scroll_to_top{
            background-color : #7E481C;
        }
        .scroll_to_top:hover{
            background-color : #DAA520FF;
        }
        .custom-footer{
            color : #7E481C !important;
        }
        .custom-footer:hover{
            color : #DAA520FF !important;
        }

        .post_title a:hover {
            color : #DAA520FF !important;
        }
        .sc_team_item .sc_team_item_info .sc_team_item_title a:hover{
            color : #DAA520FF !important;
        }

        .sc_testimonials.sc_slider_swiper .sc_slider_pagination_wrap .swiper-pagination-bullet-active, .sc_testimonials.sc_slider_swiper .sc_slider_pagination_wrap span:hover {
            border-color: #DAA520FF;
            background-color: #DAA520FF;
        }
        .isDisabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }

        .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li.ui-state-active a, .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li.sc_tabs_active a {
            border-color: #7E481C;
        }
        .sc_tabs.sc_tabs_style_2 .sc_tabs_titles li a:hover {
            border-color: #7E481C;
            color: #7E481C;
        }
    </style>
</head>

<body class="@yield('body')">
<div id="page_preloader"></div>
<a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="{{ route('index') }}" data-separator="yes"></a>
<a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>

<div class="body_wrap">
    <div class="page_wrap">
        <div class="top_panel_fixed_wrap"></div>
        <header class="top_panel_wrap top_panel_style_3 scheme_original">
            <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
                <div class="top_panel_middle">
                    <div class="content_wrap">
                        <div class="contact_logo">
                            <div class="logo">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset("asset/img/logo-black.png")}}" class="logo_main" style="height: 100px;" alt="" width="120" height="124">
                                    <img src="{{ asset("asset/img/logo-alternative.png") }}" class="logo_fixed" alt="" >
                                </a>
                            </div>
                        </div>
                        <div class="menu_main_wrap">
                            <a href="#" class="menu_main_responsive_button icon-menu"></a>
                            <nav class="menu_main_nav_area">
                                <ul id="menu_main" class="menu_main_nav">
                                    @include('components.base.nav')
                                </ul>
                            </nav>
                            <div class="contact_cart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header_mobile">
            <div class="content_wrap">
                <div class="menu_button icon-menu alignright"></div>
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset("asset/img/logo-black.png") }}" class="logo_main" alt="" width="128" height="124">
                    </a>
                </div>
            </div>
            <div class="side_wrap">
                <div class="close">Close</div>
                <div class="panel_top">
                    <nav class="menu_main_nav_area">
                        <ul id="menu_main_mobile" class="menu_main_nav">
                            @include('components.base.nav')
                        </ul>
                    </nav>
                </div>
                <div class="panel_bottom">
                    <div class="contact_socials">
                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                            @include('components.base.social')
                        </div>
                    </div>
                </div>
            </div>
            <div class="mask"></div>
        </div>
        @yield('banner')
        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single post_featured_default post_format_standard page hentry">
                        <section class="post_content">
                            @yield('content')
                        </section>
                    </article>
                    <section class="related_wrap related_wrap_empty"></section>
                </div>
            </div>
        </div>
        @include('components.base.footer')
    </div>
</div>
<div id="popup_registration" class="popup_wrap popup_registration bg_tint_light">
    <a href="#" class="popup_close"></a>
    <div class="form_wrap">
        <form name="registration_form" method="post" class="popup_form registration_form">
            <input type="hidden" name="redirect_to" value="#" />
            <div class="form_left">
                <div class="popup_form_field login_field iconed_field icon-user">
                    <input type="text" id="registration_username" name="registration_username" value="" placeholder="User name (login)">
                </div>
                <div class="popup_form_field email_field iconed_field icon-mail">
                    <input type="text" id="registration_email" name="registration_email" value="" placeholder="E-mail">
                </div>
                <div class="popup_form_field agree_field">
                    <input type="checkbox" value="agree" id="registration_agree" name="registration_agree">
                    <label for="registration_agree">I agree with</label>
                    <a href="#">Terms &amp; Conditions</a>
                </div>
                <div class="popup_form_field submit_field">
                    <input type="submit" class="submit_button" value="Sign Up">
                </div>
            </div>
            <div class="form_right">
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input type="password" id="registration_pwd" name="registration_pwd" value="" placeholder="Password">
                </div>
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input type="password" id="registration_pwd2" name="registration_pwd2" value="" placeholder="Confirm Password">
                </div>
                <div class="popup_form_field description_field">Minimum 6 characters</div>
            </div>
        </form>
        <div class="result message_block"></div>
    </div>
</div>
<div id="popup_login" class="popup_wrap popup_login bg_tint_light">
    <a href="#" class="popup_close"></a>
    <div class="form_wrap">
        <div class="form_left">
            <form action="#" method="post" name="login_form" class="popup_form login_form">
                <input type="hidden" name="redirect_to" value="#">
                <div class="popup_form_field login_field iconed_field icon-user">
                    <input type="text" id="log" name="log" value="" placeholder="Login or Email">
                </div>
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input type="password" id="password" name="pwd" value="" placeholder="Password">
                </div>
                <div class="popup_form_field remember_field">
                    <a href="#" class="forgot_password">Forgot password?</a>
                    <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                    <label for="rememberme">Remember me</label>
                </div>
                <div class="popup_form_field submit_field">
                    <input type="submit" class="submit_button" value="Login">
                </div>
            </form>
        </div>
        <div class="form_right">
            <div class="login_socials_title">You can login using your social profile</div>
            <div class="login_socials_list">
                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_facebook">
                            <span class="icon-facebook"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_twitter">
                            <span class="icon-twitter"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_gplus">
                            <span class="icon-gplus"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="login_socials_problem"><a href="#">Problem with login?</a></div>
            <div class="result message_block"></div>
        </div>
    </div>
</div>

<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
<div class="custom_html_section"></div>

<script type='text/javascript' src='{{ asset("asset/base/js/vendor/jquery/jquery.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/jquery/jquery-migrate.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/custom.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/esg/jquery.themepunch.tools.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/revslider/jquery.themepunch.revolution.min.js") }}'></script>
<script type="text/javascript" src="{{ asset("asset/base/js/vendor/revslider/extensions/revolution.extension.slideanims.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("asset/base/js/vendor/revslider/extensions/revolution.extension.layeranimation.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("asset/base/js/vendor/revslider/extensions/revolution.extension.navigation.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("asset/base/js/vendor/revslider/extensions/revolution.extension.parallax.min.js") }}"></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/modernizr.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/ui/core.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/superfish.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/jquery.slidemenu.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/core.utils.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/core.init.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/init.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/embed.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/shortcodes.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/custom/core.messages.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/comp/comp_front.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/isotope.pkgd.min.js") }}'></script>
<script type='text/javascript' src='{{ asset("asset/base/js/vendor/jquery.hoverdir.js") }}'></script>


@stack('js')

@yield('js')
</body>

</html>
