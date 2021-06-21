<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("asset/img/logo-black.png") }}">
@stack('css')

<!-- Bootstrap Css -->
    <link href="{{asset("asset/admin/css/bootstrap.min.css")}}" id="bootstrap-stylesheet" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("asset/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset("asset/admin/css/app.min.css")}}" id="app-stylesheet" rel="stylesheet" type="text/css"/>
    <!-- Sweet Alert-->
    <link href="{{asset("asset/admin/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css"/>

    @yield('css')

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset("asset/admin/images/users/user-1.jpg")}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        @include('components.admin.logo')

        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main">@yield('title.page')</h4>
            </li>

        </ul>

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{asset("asset/admin/images/users/user-1.jpg")}}" alt="user-img" title="Mat Helme"
                     class="rounded-circle img-thumbnail avatar-md">
                <div class="dropdown">
                    <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                       aria-expanded="false"> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user mr-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings mr-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock mr-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out mr-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </div>
                <p class="text-muted">Admin</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="text-muted">
                            <i class="mdi mdi-cog"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!--- Sidemenu -->
        @include('components.admin.sidemenu')
        <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('content')

            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <!-- Footer Start -->
    @include('components.admin.footer')
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset("asset/admin/js/vendor.min.js")}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset("asset/admin/libs/sweetalert2/sweetalert2.min.js")}}"></script>

<script>
    window.textEditorConfig = {toolbar: [[{font: []}, {size: []}], ["bold", "italic", "underline", "strike"], [{color: []}, {background: []}], [{script: "super"}, {script: "sub"}], [{header: [!1, 1, 2, 3, 4, 5, 6]}, "blockquote", "code-block"], [{list: "ordered"}, {list: "bullet"}, {indent: "-1"}, {indent: "+1"}], ["direction", {align: []}], ["link", "image", "video", "formula"], ["clean"]]}

    window.dropifyConfig = {
        messages: {
            default: "Seret dan jatuhkan file di sini atau klik",
            replace: "Seret dan lepas atau klik untuk mengganti",
            remove: "Hapus",
            error: "Ups, ada yang salah."
        }, error: {
            fileSize: "Ukuran file terlalu besar (maks 2M).",
            fileExtension: "File yang di perbolehkan berformat JPG, JPEG, dan PNG"
        }
    }

    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2
    })

    function swalSuccess(title = null, text = null) {
        Swal.fire({
            title: title,
            text: text,
            type: "success",
        })
    }

    function swalLoading(title = null, text = null) {
        Swal.fire({
            title: title,
            html: text,
            allowOutsideClick: false,
            onBeforeOpen: () => {
                Swal.showLoading()
            },
        });
    }

    function swalError(title = null, text = null, redirectUrl) {
        Swal.fire({
            title: title,
            text: text,
            type: "error",
        }).then(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl
            }
        })
    }

    function swalErrorHtml(title = null, text = null, redirectUrl) {
        Swal.fire({
            title: title,
            html: text,
            type: "error",
        }).then(() => {
            if (redirectUrl) {
                window.location.href = redirectUrl
            }
        })
    }

    function swalErrorRefresh(title = null, text = null) {
        Swal.fire({
            title: title,
            text: text,
            type: "warning",
        }).then(() => {
            location.reload();
        })
    }

    function setTable(data) {
        let html = `<table class="table">
                        <thead>
                            <tr>
                                <th> Keterangan </th>
                            </tr>
                        </thead>
                        <tbody>`
        $.each(data, function (index, value) {
            html += `<tr>
                        <td class="text-left text-danger" style="font-size: 15px">${value}</td>
                    <tr>`
        });
        html += `</tbody></table>`

        return html;
    }

    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            error: function (x, status, error) {
                switch (x.status) {
                    case 401 :
                        swalError('Kesalahan', 'Sesi anda telah berakhir mohon untuk login kembali', '{{route('login')}}')
                        break
                    case 422 :
                        swalErrorHtml('Kesalahan', setTable(x.responseJSON.errors))
                        break
                    case 403 :
                        swalError('Kesalahan', 'Sesi anda telah berakhir mohon untuk login kembali', '{{route('login')}}')
                        break
                    case 404 :
                        swalError(x.responseJSON.message ? x.responseJSON.message : x.statusText, x.responseJSON.description ? x.responseJSON.description : null)
                        break
                    case 419 :
                        swalErrorRefresh('Kesalahan', 'Kredensial Berubah')
                        break
                    case 500 :
                        swalError(x.responseJSON.exception ? x.responseJSON.exception : x.statusText, x.responseJSON.message ? x.responseJSON.message : null)
                        break
                    default :
                        swalError(x.message)
                }
            }
        });
    });
</script>

@stack('js')

@yield('js')

<!-- App js -->
<script src="{{asset("asset/admin/js/app.min.js")}}"></script>

</body>
</html>
