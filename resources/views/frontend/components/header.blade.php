<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueFromSettingTable('phone_contact') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueFromSettingTable('email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getConfigValueFromSettingTable('facebook_address') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ config('app.base_url') . '/'}}eshopper/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            @can('access-admin')
                                <li><a href="{{ route('admin.home') }}"><i class="fa fa-user"></i> Admin page</a></li>
                            @endcan
                            
                            <li><a href="{{ route('product.checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if (Auth::check())
                                <li>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-lock"></i>{{ Auth::user()->name }}
                                        </a>
                                    
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logOut') }}">Log out</a>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ route('logIn') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    @include('frontend.components.main-menu')
                    
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="search" type="GET">
                            <input type="text" name="search" placeholder="Search"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->