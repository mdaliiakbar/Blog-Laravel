  <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="{{ route("home") }}" target="_blank">
                                    <i class="dripicons-web"></i>
                                    <span> Visit Website </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("dashboard") }}">
                                    <i class="dripicons-device-desktop"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            {{--<li class="menu-title">Components</li>--}}

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-list"></i>
                                    <span> Category </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route("add-category") }}">Add New</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category') }}">Category List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-list"></i>
                                    <span> Tags </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route("add-tag") }}">Add New</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tags') }}">Tag List</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-list"></i>
                                    <span> Breaking News </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route("add-tag") }}">Running News</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tags') }}">Archive</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="dripicons-blog"></i>
                                    <span> Blog Manger </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ route("add-news") }}">New</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('news') }}">All Blogs</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('news-trash') }}">Trash Box</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route("dashboard") }}">
                                    <i class="dripicons-gear"></i>
                                    <span> Home Page Setting</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
