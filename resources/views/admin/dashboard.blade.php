@extends('layouts.admin')

@section('title','Liberica Admin')

@section('title.page','DASHBOARD')

@section('page.dashboard','active')

@section('content')
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Serbuk</h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $bean }} </h2>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Beverage</h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $beverage }} </h2>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Artikel</h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $artikel }} </h2>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-4">Total Promo</h4>

                <div class="widget-chart-1">
                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $promo }} </h2>
                    </div>
                </div>
            </div>

        </div><!-- end col -->



    </div>
@endsection

@push('js')
    <!-- knob plugin -->
    <script src="{{asset("asset/admin/libs/jquery-knob/jquery.knob.min.js")}}"></script>

    <!--Morris Chart-->
    <script src="{{asset("asset/admin/libs/morris-js/morris.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/raphael/raphael.min.js")}}"></script>

    <!-- Dashboard init js-->
    <script src="{{asset("asset/admin/js/pages/dashboard.init.js")}}"></script>
@endpush
