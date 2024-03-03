
<header id="theme-header-one" class="header-style-one">	
    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-6">
                    {{-- <div class="header-weather"><i class="fa fa-weather"></i>38°C</div>                   --}}
                    <div class="header-date">{{ date("D F d, Y")}}</div>
                </div>
                <div class="col-md-6 col-sm-6 text-end">
                    <div class="htop_social">
                        <a href="#" class="social-list__link"><i class="fa fa-facebook-f"></i></a>
                        <a href="#" class="social-list__link"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-list__link"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="social-list__link"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</header>



    <!-- navbar start -->
    <div class="navbar-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <a class="main-logo" href="{{ url("/") }}"><img src="assets/img/logo.png" alt="img"></a>
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="{{ url("/") }}"><img src="assets/img/logo.png" alt="img"></a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#miralax_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="miralax_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li><a href="{{ url("/") }}">Home</a></li>
                        <li><a href="blog-category.html">Business</a></li>
                        <li><a href="blog-category.html">Politics</a></li>
                        <li><a href="blog-category.html">Tech</a></li>
                        <li class="menu-item-has-children current-menu-item">
                            <a href="#">Features</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog Layout</a></li>
                                <li><a href="blog-category.html">Category Layout</a></li>
                                <li><a href="blog-details.html">Post Layout</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="nav-right-part nav-right-part-desktop">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end -->

    <div class="container">
        <div class="braking-news-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="braking-news-wrap">
                        <span>Braking News</span>
                        <div class="marquee">
                            <p>In the news: small businesses for expect revenue growth in 2022.</p>
                            <div class="breaking-news-post-date">March 16</div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    