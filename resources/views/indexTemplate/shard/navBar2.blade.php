<header class="main-header">

    <!--Header Top-->
    <div class="header-top">
        <div class="auto-container clearfix">
            <div class="top-left clearfix">
                <ul class="list">
                    <li><span class="icon fas fa-envelope"></span> 2130 Fulton Street San Diego CA 94117-1080 USA</li>
                    <li><span class="icon fas fa-phone"></span> <a href="tel:+555–123–2323"> 555–123–2323</a></li>
                </ul>
            </div>
            <div class="top-right clearfix">
                <ul class="social-icons">
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                    <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container">
            <div class="auto-container clearfix">
                <!--Info-->
                <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="{{ asset('assets/img/logo-v.png') }}"
                                style="width: 160px; height: auto;" alt="" title=""></a></div>
                </div>

                 <!--Nav Box-->
                 <div class="nav-outer clearfix">
                     <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                     <nav class="main-menu navbar-expand-md navbar-light">
                         <div class="navbar-header">
                             <!-- Togg le Button -->      
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="icon flaticon-menu"></span>
                             </button>
                         </div>
                         
                         <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                             <ul class="navigation clearfix">
                                 <li class=""><a href="{{ route('welcome') }}">Home</a>
                                 
                                 </li>
                                          <li class="dropdown"><a href="#">About us</a>
                                     <ul>
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="team.html">Our Team</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="{{ route('services') }}">Services</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="comming-soon.html">Comming Soon</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown has-mega-menu"><a href="#">Pages</a>
                                    <div class="mega-menu">
                                        <div class="mega-menu-bar row clearfix">
                                            <div class="column col-md-3 col-xs-12">
                                                <h3>About Us</h3>
                                                <ul>
                                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                                    <li><a href="team.html">Our Team</a></li>
                                                    <li><a href="faq.html">Faq</a></li>
                                                    <li><a href="{{ route('services') }}">Services</a></li>
                                                </ul>
                                            </div>
                                            <div class="column col-md-3 col-xs-12">
                                                <h3>Doctors</h3>
                                                <ul>
                                                    <li><a href="{{ route('doctors') }}">Doctors</a></li>
                                                    <li><a href="{{ route('doctors-detail') }}">Doctors Detail</a></li>
                                                </ul>
                                            </div>
                                            <div class="column col-md-3 col-xs-12">
                                                <h3>Blog</h3>
                                                <ul>
                                                    <li><a href="blog.html">Our Blog</a></li>
                                                    <li><a href="blog-classic.html">Blog Classic</a></li>
                                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                                </ul>
                                            </div>
                                            <div class="column col-md-3 col-xs-12">
                                                <h3>Shops</h3>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-single.html">Shop Details</a></li>
                                                    <li><a href="shoping-cart.html">Cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown"><a href="#">Doctors</a>
                                    <ul>
                                        <li><a href="{{ route('doctors') }}">Doctors</a></li>
                                        <li><a href="{{ route('doctors-detail') }}">Doctors Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Department</a>
                                    <ul>
                                        <li><a href="department.html">Department</a></li>
                                        <li><a href="department-detail.html">Department Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-classic.html">Blog Classic</a></li>
                                        <li><a href="blog-detail.html">Blog Detail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop-single.html">Shop Details</a></li>
                                        <li><a href="shoping-cart.html">Cart Page</a></li>
                                        <li><a href="checkout.html">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('evaluation.create') }}">evaluation</a></li>
                                @auth
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <!-- Search Btn -->
                        <div class="search-box-btn"><span class="icon flaticon-search"></span></div>
                        <!-- Button Box -->
                        <div class="btn-box">
                            <a href="{{ route('patient.appointments.available') }}"
                                class="theme-btn btn-style-one"><span class="txt">Appointment</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt=""
                        title=""></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon far fa-window-close"></span></div>

        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="images/nav-logo.png" alt=""
                        title=""></a></div>

            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
