<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Admin Liberica</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Liberica" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/img/logo-black.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{asset("asset/admin/css/bootstrap.min.css")}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("asset/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset("asset/admin/css/app.min.css")}}" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{asset("asset/admin/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css" />
    @stack('css')

</head>


<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center">
                    <a href="{{ route('index') }}" class="logo">
                        <img src="{{ asset('asset/img/logo-alternative.png') }}" alt="" height="100" class="logo-light mx-auto">
                        <img src="{{ asset('asset/img/logo-alternative.png') }}" alt="" height="100" class="logo-dark mx-auto">
                    </a>
                    <p class="text-muted mt-2 mb-4">Kedai Kopi Liberica Cipasung</p>
                </div>
                @yield('content')

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<!-- Vendor js -->
<script src="{{asset("asset/admin/js/vendor.min.js")}}"></script>

<!-- App js -->
<script src="{{asset("asset/admin/js/app.min.js")}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset("asset/admin/libs/sweetalert2/sweetalert2.min.js")}}"></script>

<script>
   function swalSuccess(e=null,a=null){Swal.fire({title:e,text:a,type:"success"})}function swalLoading(e=null,a=null){Swal.fire({title:e,html:a,allowOutsideClick:!1,onBeforeOpen:()=>{Swal.showLoading()}})}function swalError(e=null,a=null,s){Swal.fire({title:e,text:a,type:"error"}).then(()=>{s&&(window.location.href=s)})}function swalErrorRefresh(e=null,a=null){Swal.fire({title:e,text:a,type:"warning"}).then(()=>{location.reload()})}$(document).ready(function(e){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},error:function(e,a,s){switch(e.status){case 422:swalError("Kesalahan","Username atau password salah");break;case 403:swalError("Kesalahan","Sesi anda telah berakhir mohon untuk login kembali",route("login"));break;case 404:swalError(e.responseJSON.message?e.responseJSON.message:e.statusText,e.responseJSON.description?e.responseJSON.description:null);break;case 419:swalErrorRefresh("Kesalahan","Kredensial Berubah");break;case 500:swalError(e.responseJSON.exception?e.responseJSON.exception:e.statusText,e.responseJSON.message?e.responseJSON.message:null);break;default:swalError(e.message)}}})});
</script>
@stack('js')
</body>
</html>
