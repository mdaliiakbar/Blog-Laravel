<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield("title") - {{config('constants.software.name')}}</title>

    <!-- favicon -->
    <link rel="icon" href="demo-landing/img/favicon.png">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('news/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('news/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('news/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('news/css/responsive.css') }}">

</head>
<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- search popup area start -->
    <div class="search-popup" id="search-popup">
        <form action="#" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- //. search Popup -->
    <div class="body-overlay" id="body-overlay"></div>

    @include("news.layouts.header")
    @yield("content")
  
    <!-- footer area start -->
    <footer class="footer-area pd-top-80">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="widget widget_about">
                            <div class="logo">
                                Kiante
                            </div>
                            <p class="text-white">The stars will never align, and the traffic lights of life will never all be green at the same time.The stars will never align.</p>
                            <ul>
                                <li><span>Email</span> : info@example.com</li>
                                <li><span>Phone</span> : 00249 123 333 719</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <h5 class="widget-title">Quick Links</h5>
                        <div class="widget widget_link">
                            <ul>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Motivation</a></li>
                                <li><a href="#">Politics</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Technology</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <h5 class="widget-title">Entertainment</h5>
                        <div class="widget widget_link">
                            <ul>
                                <li><a href="#">Hollywood
                                </a></li>
                                <li><a href="#">Music
                                </a></li>
                                <li><a href="#">Videos
                                </a></li>
                                <li><a href="#">TV News
                                </a></li>
                                <li><a href="#">Celebrity News
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <h5 class="widget-title">Overview</h5>
                        <div class="widget widget_link">
                            <ul>
                                <li><a href="#">Business
                                </a></li>
                                <li><a href="#">About
                                </a></li>
                                <li><a href="#">Contact
                                </a></li>
                                <li><a href="#">Blog
                                </a></li>
                                <li><a href="#">Marketing
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; {{config('constants.software.name')}} {{ date("Y") }}. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-long-arrow-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="{{ asset('news/js/vendor.js') }}"></script>
    <script src="{{ asset('news/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('news/js/main.js') }}"></script>
</body>
</html>