@extends('layouts.app')
@section('title','Dashboard')
@section("script")
        <!-- Jvector map -->
<script src="{{ asset("assets/libs/jqvmap/jquery.vmap.min.js")}}"></script>
<script src="{{ asset("assets/libs/jqvmap/jquery.vmap.usa.js")}}"></script>
<!-- Dashboard Init JS -->
<script src="{{ asset("assets/js/pages/dashboard.init.js")}}"></script>
@endsection
@section('content')

    <div class="content">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                   data-fgColor="#ffffff" data-bgcolor="rgba(255,255,255,0.2)" value="49" data-skin="tron" data-angleOffset="180"
                                   data-readOnly=true data-thickness=".1"/>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Projects</p>
                            <h3 class="text-white">1200</h3>
                        </div>
                    </div> <!-- end card-box-->
                    <div class="card-box">
                        {{--<div class="dropdown float-right">--}}
                        {{--<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">--}}
                        {{--<i class="mdi mdi-dots-horizontal"></i>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right">--}}
                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item">Settings</a>--}}
                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item">Download</a>--}}
                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item">Upload</a>--}}
                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item">Action</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <h4 class="header-title">Daily Attendance</h4>
                        <p class="text-muted">{{ date("D, d F - Y") }}</p>
                        <div class="mb-3 mt-4">
                            {{--<div class="float-right d-none d-xl-block">--}}
                            {{--<img src="assets/images/cards/visa.png" alt="user-card" height="28" />--}}
                            {{--<img src="assets/images/cards/master.png" alt="user-card" height="28" />--}}
                            {{--<img src="assets/images/cards/american-express.png" alt="user-card" height="28" />--}}
                            {{--</div>--}}
                            <h2 class="font-weight-light">600/1200</h2>
                        </div>
                        <div class="chartjs-chart dash-sales-chart">
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div><!-- end card-box-->



                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card-box">
                        {{--<div class="dropdown float-right">--}}
                            {{--<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">--}}
                                {{--<i class="mdi mdi-dots-horizontal"></i>--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-menu dropdown-menu-right">--}}
                                {{--<!-- item-->--}}
                                {{--<a href="javascript:void(0);" class="dropdown-item">Settings</a>--}}
                                {{--<!-- item-->--}}
                                {{--<a href="javascript:void(0);" class="dropdown-item">Download</a>--}}
                                {{--<!-- item-->--}}
                                {{--<a href="javascript:void(0);" class="dropdown-item">Upload</a>--}}
                                {{--<!-- item-->--}}
                                {{--<a href="javascript:void(0);" class="dropdown-item">Action</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <h4 class="header-title mb-3">Statistics</h4>
                        <div class="row text-center">
                            <div class="col-sm-4 mb-3">
                                <h3 class="font-weight-light">4,000</h3>
                                <p class="text-muted text-overflow">Total Paid</p>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <h3 class="font-weight-light">5,000</h3>
                                <p class="text-muted text-overflow">Open Campaign</p>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <h3 class="font-weight-light">1,000</h3>
                                <p class="text-muted text-overflow">Total Due</p>
                            </div>
                        </div>
                        <div class="chartjs-chart high-performing-product">
                            <canvas id="high-performing-product"></canvas>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col -->


            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->



@endsection
