<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from htmldemo.net/ecolife/ecolife/index-19.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2023 09:59:34 GMT -->
<head>
    @php
        $isHomePage = $page ?? false;

        if ($productDetail ?? false) {
            $description = $productDetail->description ?? $productDetail->name . ' Rs ' . number_format($productDetail->actual_price, 2);
        } else {
            $description = $siteInformation->meta_description;
        }
        $description = strip_tags(Str::substr($description, 0, 200));
        $productImages = $productDetail->productImages ?? null;
        if ($productImages == null) {
            $image = asset('web/images/logo/' . $siteInformation->logo);
        } else {
            if ($productImages->count() > 0) {
                $image = asset('web/images/product_images/' . $productImages->first()->image);
            } else {
                $image = asset('web/images/logo/' . $siteInformation->logo);
            }
        }
    @endphp
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="author" content="{{ $siteInformation->site_name }}" />
    <title>{{ $siteInformation->site_name }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('web/images/logo/' . $siteInformation->fav_icon) }}" type="image/x-icon"
          sizes="16x16">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $productDetail->name ?? $siteInformation->site_name }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $productDetail->productUrl ?? env('APP_URL') }}">
    <meta property="og:site_name" content="{{ $siteInformation->site_name }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:type" content="website">
    <meta property="article:publisher" content="">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@{{ $siteInformation->site_name }}">
    <meta name="twitter:site" content="@{{ $siteInformation->site_name }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google Fonts -->
    <link href="{{ asset('web/eco_life/fonts.googleapis.com/cssdd1b.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap') }}"
          rel="stylesheet"/>

    <!-- All CSS Flies   -->
    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/vendor/stroke-gap-icons.css" />
        <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css" /> -->
    <!--===== Plugins CSS (All Plugins Files) =====-->
    <!-- <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
        <link rel="stylesheet" href="assets/css/plugins/venobox.css" />
        <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css" />
        <link rel="stylesheet" href="assets/css/plugins/aos.css" />
        <link rel="stylesheet" href="assets/css/plugins/slick.css" /> -->

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

    <link rel="stylesheet" href="{{ asset('web/eco_life/assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/eco_life/assets/css/plugins/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/eco_life/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/eco_life/assets/css/responsive.min.css') }}">

    <!--===== Main Css Files =====-->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
    <!-- ===== Responsive Css Files ===== -->
    <link rel="stylesheet" href="{{ asset('web/eco_life/assets/css/responsive.css') }}" />

    @stack('css')
    <title>{{ $siteInformation->site_name }}</title>
    <script src="{{ asset('web/js/jquery.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body class="home-5 home-6 home-8 home-9 home-19 home-medical">
<!-- main layout start from here -->
<!--====== PRELOADER PART START ======-->

<!-- <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div> -->

<!--====== PRELOADER PART ENDS ======-->
<div id="main">
    <!-- Header Start -->
    <header class="main-header">
        <!-- Header Buttom Start -->
{{--        <div class="header-navigation d-lg-block d-none">--}}
        <div class="header-navigation d-lg-block d-none">
            <div class="container">
                <div class="row">
                    <!-- Logo Start -->
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('web/images/logo/' . $siteInformation->logo) }}"
                                                      alt="{{ config('app.name') }}" /></a>
                        </div>
                    </div>
                    <!-- Logo End -->
                    <div class="col-md-10 col-sm-10">
                        <!--Header Bottom Account Start -->
                        <div class="header_account_area">
                            <!--Seach Area Start -->
                            <div class="header_account_list search_list">
                                <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                <div class="dropdown_search">
                                    <form action="#">
                                        <input placeholder="Search entire store here ..." class="product_search_box" type="text"/>
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!--Seach Area End -->
                            <!--Contact info Start -->
                            <div class="contact-link-wrap">
                                <div class="contact-link">
                                    <div class="phone">
                                        <p>Call us:</p>
                                        <a href="tel:(+800)345678">(+800)345678</a>
                                    </div>
                                </div>
                                <!--Contact info End -->
                                <!--Cart info Start -->
                                <div class="cart-info d-flex">
                                    <a href="compare.html" class="count-cart random">
                                        <span class="item-quantity-tag">0</span>
                                    </a>
                                    <a href="wishlist.html" class="count-cart heart">
                                        <span class="item-quantity-tag">0</span>
                                    </a>
                                    <div class="mini-cart-warp">
                                        <a href="#offcanvas-cart" class="count-cart offcanvas-toggle color-black">
                                            <span class="amount-tag">$20.00</span>
                                            <span class="item-quantity-tag">02</span>
                                        </a>
                                    </div>
                                </div>
                                <!--Cart info End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header Bottom Account End -->
        <!-- Menu Content Start -->
        <div class="header-buttom-nav sticky-nav d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <div class="d-flex align-items-start justify-content-start">
                            <!--Main Navigation Start -->
                            <div class="main-navigation mt-0px">
                                <ul>
                                    <li class="menu-dropdown">
                                        <a href="#">Health Care <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Home Organic <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="index.html">Organic 1</a></li>
                                                    <li><a href="index-2.html">Organic 2</a></li>
                                                    <li><a href="index-3.html">Organic 3</a></li>
                                                    <li><a href="index-4.html">Organic 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Home Cosmetic <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="index-5.html">Cosmetic 1</a></li>
                                                    <li><a href="index-6.html">Cosmetic 2</a></li>
                                                    <li><a href="index-7.html">Cosmetic 3</a></li>
                                                    <li><a href="index-8.html">Cosmetic 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Home Digital <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="index-9.html">Digital 1</a></li>
                                                    <li><a href="index-10.html">Digital 2</a></li>
                                                    <li><a href="index-11.html">Digital 3</a></li>
                                                    <li><a href="index-12.html">Digital 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Home Furniture <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="index-13.html">Furniture 1</a></li>
                                                    <li><a href="index-14.html">Furniture 2</a></li>
                                                    <li><a href="index-15.html">Furniture 3</a></li>
                                                    <li><a href="index-16.html">Furniture 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Home Medical <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="index-17.html">Medical 1</a></li>
                                                    <li><a href="index-18.html">Medical 2</a></li>
                                                    <li><a href="index-19.html">Medical 3</a></li>
                                                    <li><a href="index-20.html">Medical 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-relative">
                                                <a href="index-21.html">Single Product</a>
                                                <span class="stekar">new</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-dropdown">
                                        <a href="#">Baby Care <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="mega-menu-wrap">
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">Shop Grid</a></li>
                                                    <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>
                                                    <li><a href="shop-4-column.html">Shop Grid 4 Column</a></li>
                                                    <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a>
                                                    </li>
                                                    <li><a href="shop-right-sidebar.html">Shop Grid Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">Shop List</a></li>
                                                    <li><a href="shop-list.html">Shop List</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">Shop List Left
                                                            Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                            Sidebar</a></li>
                                                    <li><a href="shop-filter.html">Shop Filter Page</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">Shop Single</a></li>
                                                    <li><a href="single-product.html">Shop Single</a></li>
                                                    <li><a href="single-product-variable.html">Shop Variable</a>
                                                    </li>
                                                    <li><a href="single-product-affiliate.html">Shop Affiliate</a>
                                                    </li>
                                                    <li><a href="single-product-group.html">Shop Group</a></li>
                                                    <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                                                    <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="mega-menu-title"><a href="#">Shop Single</a></li>
                                                    <li><a href="single-product-slider.html">Shop Slider</a></li>
                                                    <li><a href="single-product-gallery-left.html">Shop Gallery
                                                            Left</a></li>
                                                    <li><a href="single-product-gallery-right.html">Shop Gallery
                                                            Right</a></li>
                                                    <li><a href="single-product-sticky-left.html">Shop Sticky
                                                            Left</a></li>
                                                    <li><a href="single-product-sticky-right.html">Shop Sticky
                                                            Right</a></li>
                                                </ul>
                                            </li>
                                            <li class="banner-wrapper">
                                                <a href="single-product.html"><img
                                                            src='{{ asset("web/eco_life/assets/images/banner-image/banner-menu-7.jpg") }}' alt=""/></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-dropdown">
                                        <a href="#">Beauty Care <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About Page</a></li>
                                            <li><a href="cart.html">Cart Page</a></li>
                                            <li><a href="checkout.html">Checkout Page</a></li>
                                            <li><a href="compare.html">Compare Page</a></li>
                                            <li><a href="login.html">Login & Regiter Page</a></li>
                                            <li><a href="my-account.html">Account Page</a></li>
                                            <li><a href="wishlist.html">Wishlist Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-dropdown">
                                        <a href="#">Medical Equiment <i class="ion-ios-arrow-down"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Blog Grid <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="blog-grid-left-sidebar.html">Blog Grid Left
                                                            Sidebar</a></li>
                                                    <li><a href="blog-grid-right-sidebar.html">Blog Grid Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Blog List <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="blog-list-left-sidebar.html">Blog List Left
                                                            Sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">Blog List Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-dropdown position-static">
                                                <a href="#">Blog Single <i class="ion-ios-arrow-down"></i></a>
                                                <ul class="sub-menu sub-menu-2">
                                                    <li><a href="blog-single-left-sidebar.html">Blog Single Left
                                                            Sidebar</a></li>
                                                    <li><a href="blog-single-right-sidebar.html">Blog Single Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Home Services</a></li>
                                </ul>
                            </div>
                            <!--Main Navigation End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu Content End -->
        <!-- Header mobile area start -->
        <div class="header-bottom d-lg-none sticky-nav py-3 mobile-navigation hover-style-medical">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3 col-sm-3">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle mobile-menu">
                            <i class="ion-navicon"></i>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-4 d-flex justify-content-center">
                        <div class="logo m-0">
                            <a href="index.html"><img src="{{ asset('web/images/logo/' . $siteInformation->logo) }}"
                                                      alt="{{ config('app.name') }}"/></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-5">
                        <!--Cart info Start -->
                        <div class="cart-info d-flex m-0 justify-content-end">
                            <div class="header-bottom-set dropdown hover-style-medical">
                                <button class="dropdown-toggle header-action-btn hover-style-medical"
                                        data-bs-toggle="dropdown"><i class="ion-person"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                    <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                    <li><a class="dropdown-item" href="login.html">Sign in</a></li>
                                </ul>
                            </div>
                            <div class="mini-cart-warp mobile-view-color">
                                <a href="#offcanvas-cart" class="count-cart offcanvas-toggle color-black">
                                    <span class="amount-tag">$20.00</span>
                                    <span class="item-quantity-tag">02</span>
                                </a>
                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header mobile area end -->

    </header>
    <!-- Header End -->
    <div class="mobile-search-option pb-3 d-lg-none hover-style-medical">
        <div class="container-fluid">
            <div class="header-account-list">
                <div class="dropdown-search">
                    <form action="#">
                        <input placeholder="Search entire store here ..." type="text" class="product_search_box"/>
                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- offcanvas overlay start -->
    <div class="offcanvas-overlay"></div>
    <!-- offcanvas overlay end -->
    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart hover-style-medical">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="single-product.html" class="image"><img
                                    src='{{ asset("web/eco_life/assets/images/product-image/mini-cart/1.jpg") }}' alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Juicy Couture...</a>
                            <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img
                                    src=' {{ asset("web/eco_life/assets/images/product-image/mini-cart/2.jpg") }}' alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Water and Wind...</a>
                            <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img
                                    src='{{ asset("web/eco_life/assets/images/product-image/mini-cart/1.jpg") }}' alt="Cart product Image"></a>
                        <div class="content">

                            <a href="single-product.html" class="title">Fila Locker Room...</a>
                            <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="shopping-cart-total">
                <h4>Subtotal : <span>$20.00</span></h4>
                <h4>Shipping : <span>$7.00</span></h4>
                <h4>Taxes : <span>$0.00</span></h4>
                <h4 class="shop-total">Total : <span>$27.00</span></h4>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="cart.html" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->
    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu hover-style-medical">
        <button class="offcanvas-close"></button>
        <!-- contact Info -->
        <div class="contact-info d-flex align-items-center justify-content-center color-black py-3">
            <img class="me-3" src='{{ asset("web/eco_life/assets/images/icons/mobile-contact.png") }}' alt="">
            <p>Call us:</p>
            <a class="color-black" href="tel:(+800)345678">(+800)345678</a>
        </div>
        <!-- offcanvas compare & wishlist -->
        <div class="user-panel">
            <ul class="d-flex justify-content-between">
                <li class="m-0">
                    <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Compare (0)</a>
                </li>
                <li>
                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Wishlist (0)</a>
                </li>
            </ul>
        </div>
        <!-- offcanvas currency -->
        <div class="offcanvas-userpanel">
            <ul>
                <li class="offcanvas-userpanel__role">
                    <a href="#">USD $ <i class="ion-ios-arrow-down"></i></a>
                    <ul class="user-sub-menu">
                        <li><a class="current" href="#">USD $</a></li>
                        <li><a href="#">EUR €</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- offcanvas language -->
        <div class="offcanvas-userpanel">
            <ul>
                <li class="offcanvas-userpanel__role">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/icons/1.jpg") }}' alt="">English <i
                                class="ion-ios-arrow-down"></i></a>
                    <ul class="user-sub-menu">
                        <li><a class="current" href="#"><img src='{{ asset("web/eco_life/assets/images/icons/1.jpg") }}' alt="">English</a></li>
                        <li><a href="#"><img src='{{ asset("web/eco_life/assets/images/icons/2.jpg") }}' alt=""> Français</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="menu-close">
            menu
        </div>
        <!-- offcanvas menu -->
        <div class="inner customScroll">
            <div class="offcanvas-menu mb-4">
                <ul>
                    <li><a href="#"><span class="menu-text">Home</span></a>
                        <ul class="sub-menu">
                            <li><a href="#"><span class="menu-text">Home Organic</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Organic 1</a></li>
                                    <li><a href="index-2.html">Organic 2</a></li>
                                    <li><a href="index-3.html">Organic 3</a></li>
                                    <li><a href="index-4.html">Organic 4</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Home Cosmetic</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index-5.html">Cosmetic 1</a></li>
                                    <li><a href="index-6.html">Cosmetic 2</a></li>
                                    <li><a href="index-7.html">Cosmetic 3</a></li>
                                    <li><a href="index-8.html">Cosmetic 4</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Home Digital</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index-9.html">Digital 1</a></li>
                                    <li><a href="index-10.html">Digital 2</a></li>
                                    <li><a href="index-11.html">Digital 3</a></li>
                                    <li><a href="index-12.html">Digital 4</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Home Furniture</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index-13.html">Furniture 1</a></li>
                                    <li><a href="index-14.html">Furniture 2</a></li>
                                    <li><a href="index-15.html">Furniture 3</a></li>
                                    <li><a href="index-16.html">Furniture 4</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Home Medical</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index-17.html">Medical 1</a></li>
                                    <li><a href="index-18.html">Medical 2</a></li>
                                    <li><a href="index-19.html">Medical 3</a></li>
                                    <li><a href="index-20.html">Medical 4</a></li>
                                </ul>
                            </li>
                            <li class="menu-dropdown position-relative">
                                <a href="index-21.html">Single Product</a>
                                <span class="stekar">new</span>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About Page</a></li>
                            <li><a href="cart.html">Cart Page</a></li>
                            <li><a href="checkout.html">Checkout Page</a></li>
                            <li><a href="compare.html">Compare Page</a></li>
                            <li><a href="login.html">Login & Regiter Page</a></li>
                            <li><a href="my-account.html">Account Page</a></li>
                            <li><a href="wishlist.html">Wishlist Page</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Shop</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><span class="menu-text">Shop Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="shop-3-column.html">Shop Grid 3 Column</a></li>
                                    <li><a href="shop-4-column.html">Shop Grid 4 Column</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Grid Left Sidebar</a>
                                    </li>
                                    <li><a href="shop-right-sidebar.html">Shop Grid Right
                                            Sidebar</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-list-left-sidebar.html">Shop List Left
                                            Sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar.html">Shop List Right
                                            Sidebar</a></li>
                                    <li><a href="shop-filter.html">Shop Filter Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">product Details Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product.html">Shop Single</a></li>
                                    <li><a href="single-product-variable.html">Shop Variable</a>
                                    </li>
                                    <li><a href="single-product-affiliate.html">Shop Affiliate</a>
                                    </li>
                                    <li><a href="single-product-group.html">Shop Group</a></li>
                                    <li><a href="single-product-tabstyle-2.html">Shop Tab 2</a></li>
                                    <li><a href="single-product-tabstyle-3.html">Shop Tab 3</a></li>
                                    <li><a href="single-product-slider.html">Shop Slider</a></li>
                                    <li><a href="single-product-gallery-left.html">Shop Gallery
                                            Left</a></li>
                                    <li><a href="single-product-gallery-right.html">Shop Gallery
                                            Right</a></li>
                                    <li><a href="single-product-sticky-left.html">Shop Sticky
                                            Left</a></li>
                                    <li><a href="single-product-sticky-right.html">Shop Sticky
                                            Right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Blog</span></a>
                        <ul class="sub-menu">
                            <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                            <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                            <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                            <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->
            <div class="offcanvas-social mt-5">
                <ul>
                    <li>
                        <a href="#"><i class="ion-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Menu End -->
    <!-- Header End -->
    <!-- Slider Arae Start -->
    <div class="slider-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                    <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                        <!-- Slider Single Item Start -->
                        <div class="slider-height-19 d-flex align-items-start justify-content-start bg-img"
                             style="background-image: url({{ asset('web/eco_life/assets/images/slider-image/sample-36.jpg') }});">
                            <div class="slider-content-16 slider-content-18 slider-animated-1 text-left">
                                <h1 class="animated">
                                    Nutritional Products<br/>
                                    <strong>& Supplements</strong>
                                </h1>
                                <p class="animated">Untra-Pure & Pharmaceutical Grade</p>
                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                            </div>
                        </div>
                        <!-- Slider Single Item End -->
                        <!-- Slider Single Item Start -->
                        <div class="slider-height-19 d-flex align-items-start justify-content-start bg-img"
                             style="background-image: url({{ asset('web/eco_life/assets/images/slider-image/sample-37.jpg') }});">
                            <div class="slider-content-16 slider-content-18 slider-animated-1 text-left">
                                <h1 class="animated">
                                    Only Available At<br/>
                                    <strong>Supplements</strong>
                                </h1>
                                <p class="animated">100% Whey Protein Isolate</p>
                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item End -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 dis-sm-flex">
                    <div class="banner-wrapper mb-30px sm-6">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/52.jpg") }}' alt=""/></a>
                    </div>
                    <div class="banner-wrapper sm-6">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/53.jpg") }}' alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Arae End -->
    <!-- Static Area Start -->
    <section class="static-area">
        <div class="container">
            <div class="static-area-wrap">
                <div class="row">
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                        <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0">
                            <img src='{{ asset("web/eco_life/assets/images/icons/static-icons-5.png") }}' alt="" class="img-responsive"/>
                            <div class="single-static-meta">
                                <h4>Free Shipping</h4>
                                <p>On all orders over $75.00</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                        <div class="single-static pb-res-md-0 pb-res-sm-0 pb-res-xs-0 pt-res-xs-20">
                            <img src='{{ asset("web/eco_life/assets/images/icons/static-icons-6.png") }}' alt="" class="img-responsive"/>
                            <div class="single-static-meta">
                                <h4>Free Returns</h4>
                                <p>Returns are free within 9 days</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                        <div class="single-static pt-res-md-30 pb-res-sm-30 pb-res-xs-0 pt-res-xs-20">
                            <img src='{{ asset("web/eco_life/assets/images/icons/static-icons-7.png") }}' alt="" class="img-responsive"/>
                            <div class="single-static-meta">
                                <h4>100% Payment Secure</h4>
                                <p>Your payment are safe with us.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                        <div class="single-static pt-res-md-30 pb-res-sm-30 pt-res-xs-20">
                            <img src='{{ asset("web/eco_life/assets/images/icons/static-icons-8.png") }}' alt="" class="img-responsive"/>
                            <div class="single-static-meta">
                                <h4>Support 24/7</h4>
                                <p>Contact us 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <!-- Static Single Item End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Static Area End -->
    <!-- Category Tab Area Start -->
    <section class="category-tab-area mt-60px">
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-30px">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#feature">Featured</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#onsale">OnSale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#bestseller">Bestseller</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- 1st tab start -->
                <div id="feature" class="tab-pane active">
                    <!-- Best Sell Slider Carousel Start -->
                    <div class="best-sell-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€34.21</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Fresh Foam
                                        Ka..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€15.12</li>
                                        <li class="discount-price">-20%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Ano..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Tricot Logo
                                        Strip..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Arishi Sport
                                        v1</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNAR</span></a>
                                <h2><a href="single-product.html" class="product-link">Fila Locker Room Varsity
                                        Jacket</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Water and Wind Resistant
                                        Ins..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Luxury Men's Slim Fit
                                        Shi...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€29.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Originals Kaval
                                        Windbreaker...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€23.90</li>
                                        <li class="current-price">€21.51</li>
                                        <li class="discount-price">-10%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Anor...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Madden by Steve Madden Cale
                                        6</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€11.90</li>
                                        <li class="current-price">€10.12</li>
                                        <li class="discount-price">-15%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€35.90</li>
                                        <li class="current-price">€34.11</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                    </div>
                    <!-- Best Sells Carousel End -->
                </div>
                <!-- 1st tab end -->
                <!-- 2nd tab start -->
                <div id="onsale" class="tab-pane fade">
                    <!-- Best Sell Slider Carousel Start -->
                    <div class="best-sell-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€34.21</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Fresh Foam
                                        Ka..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€15.12</li>
                                        <li class="discount-price">-20%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Ano..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Tricot Logo
                                        Strip..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Arishi Sport
                                        v1</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNAR</span></a>
                                <h2><a href="single-product.html" class="product-link">Fila Locker Room Varsity
                                        Jacket</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Water and Wind Resistant
                                        Ins..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Luxury Men's Slim Fit
                                        Shi...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€29.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Originals Kaval
                                        Windbreaker...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€23.90</li>
                                        <li class="current-price">€21.51</li>
                                        <li class="discount-price">-10%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Anor...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Madden by Steve Madden Cale
                                        6</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€11.90</li>
                                        <li class="current-price">€10.12</li>
                                        <li class="discount-price">-15%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€35.90</li>
                                        <li class="current-price">€34.11</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                    </div>
                    <!-- Best Sells Carousel End -->
                </div>
                <!-- 2nd tab end -->
                <!-- 3rd tab start -->
                <div id="bestseller" class="tab-pane fade">
                    <!-- Best Sell Slider Carousel Start -->
                    <div class="best-sell-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€34.21</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Fresh Foam
                                        Ka..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€18.90</li>
                                        <li class="current-price">€15.12</li>
                                        <li class="discount-price">-20%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Ano..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Tricot Logo
                                        Strip..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Balance Arishi Sport
                                        v1</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNAR</span></a>
                                <h2><a href="single-product.html" class="product-link">Fila Locker Room Varsity
                                        Jacket</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Water and Wind Resistant
                                        Ins..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">New Luxury Men's Slim Fit
                                        Shi...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€29.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Originals Kaval
                                        Windbreaker...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€23.90</li>
                                        <li class="current-price">€21.51</li>
                                        <li class="discount-price">-10%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Brixton Patrol All Terrain
                                        Anor...</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Madden by Steve Madden Cale
                                        6</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€11.90</li>
                                        <li class="current-price">€10.12</li>
                                        <li class="discount-price">-15%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="img-block">
                                <a href="single-product.html" class="thumbnail">
                                    <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a>
                                    <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                        <i class="ion-ios-shuffle-strong"></i>
                                    </a>
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                       data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="product-flag">
                                <li class="new">New</li>
                            </ul>
                            <div class="product-decs text-center">
                                <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                <h2><a href="single-product.html" class="product-link">Juicy Couture Juicy Quilted
                                        Ter..</a></h2>
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price">€35.90</li>
                                        <li class="current-price">€34.11</li>
                                        <li class="discount-price">-5%</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-to-link-btn">
                                <a href="#"> Add to cart</a>
                            </div>
                        </article>
                        <!-- Single Item -->
                    </div>
                    <!-- Best Sells Carousel End -->
                </div>
                <!-- 3rd tab end -->
            </div>
        </div>
    </section>
    <!-- Category Tab Area end -->
    <!-- Banner Area 2 Start -->
    <div class="banner-area-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-inner">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/50.jpg") }}' alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area 2 End -->
    <!-- Hot deal area Start -->
    <section class="hot-deal-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 mb-res-xs-60 mb-res-sm-60 mb-res-md-60">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title custom-style">
                                <h2>Best Sellers</h2>
                            </div>
                            <!-- Section Title End-->
                        </div>
                    </div>
                    <!-- Hot Deal Slider Start -->
                    <div
                            class="category-product-2 owl-carousel custom-nav-style responsive-owl-nav-style owl-nav-style">
                        <!-- Single Item -->
                        <div class="feature-slider-item">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Juicy Couture
                                            Solid...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€29.90</li>
                                            <li class="current-price">€21.51</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Brixton Patrol
                                            Terr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€29.90</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">New Balance Fresh...</a>
                                    </h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€29.90</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Single Item -->
                        <div class="feature-slider-item">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Juicy Couture
                                            Solid...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€29.90</li>
                                            <li class="current-price">€21.51</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/14.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Brixton Patrol
                                            Terr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€10.90</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">New Balance Fresh...</a>
                                    </h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€29.90</li>
                                            <li class="current-price">€21.51</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Single Item -->
                        <div class="feature-slider-item">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/8.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Juicy Couture
                                            Solid...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€20.90</li>
                                            <li class="current-price">€15.51</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Brixton Patrol
                                            Terr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€29.90</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">New Balance Fresh...</a>
                                    </h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€29.90</li>
                                            <li class="current-price">€21.51</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Single Item -->
                    </div>
                    <!-- Hot Deal Slider End -->
                </div>
                <!-- New Arrivals Area Start -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title ml-0px">
                                <h2>Hot Deals</h2>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Hot Deal Slider 2 Start -->
                    <div class="hot-deal-3 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block d-flex">
                                    <div class="nav-container">
                                        <div class="slider-nav">
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-container">
                                        <div class="slider slider-main">
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbreaker Wint...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€18.90</li>
                                            <li class="current-price">€34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/12/31"></div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                                <div class="in-stock text-center">Availability: <span>300 In Stock</span></div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block d-flex">
                                    <div class="nav-container">
                                        <div class="slider-nav">
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-container">
                                        <div class="slider slider-main">
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbreaker Wint...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€18.90</li>
                                            <li class="current-price">€34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/12/31"></div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                                <div class="in-stock text-center">Availability: <span>300 In Stock</span></div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block d-flex">
                                    <div class="nav-container">
                                        <div class="slider-nav">
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-container">
                                        <div class="slider slider-main">
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">New Balance Fresh Foam
                                            Kaymin</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€18.90</li>
                                            <li class="current-price">€34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/12/31"></div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                                <div class="in-stock text-center">Availability: <span>300 In Stock</span></div>
                            </div>
                        </article>
                        <!-- Single Item -->
                        <article class="list-product">
                            <div class="hot-item-inner">
                                <div class="img-block d-flex">
                                    <div class="nav-container">
                                        <div class="slider-nav">
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                            </div>
                                            <div>
                                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-container">
                                        <div class="slider slider-main">
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/9.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/10.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/12.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}'/>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#">
                                                    <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}'/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                    <ul class="product-flag">
                                        <li class="new">New</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-wrapper">
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Madden by Steve Madden
                                            Cale 6</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€18.90</li>
                                            <li class="current-price">€34.21</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clockdiv">
                                    <div class="title_countdown">Hurry Up! Offers ends in:</div>
                                    <div data-countdown="2021/12/31"></div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                                <div class="in-stock text-center">Availability: <span>300 In Stock</span></div>
                            </div>
                        </article>
                        <!-- Single Item -->
                    </div>
                    <!-- Hot Deal Slider 2 Start -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hot Deal Area End -->
    <!-- Banner Area Start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-res-xs-30 mb-res-sm-30">
                    <div class="banner-wrapper">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/54.jpg") }}' alt=""/></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="banner-wrapper">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/55.jpg") }}' alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- Hot deal area Start -->
    <section class="hot-deal-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>Vitamins & Minerals</h2>
                    </div>
                    <!-- Section Title End-->
                </div>
            </div>
            <div class="banner-inner-area d-flex">
                <div class="banner-left">
                    <div class="banner-wrapper">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/51.jpg") }}' alt=""/></a>
                    </div>
                </div>
                <!-- New Arrivals Area Start -->
                <div class="banner-right mt-res-sm-90 mt-res-sm-60">
                    <!-- New Product Slider Start -->
                    <div class="new-product-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€23.90</li>
                                            <li class="current-price">€21.51</li>
                                            <li class="discount-price">-10%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                    <h2><a href="single-product.html" class="product-link">Brixton Patrol All
                                            Terr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€29.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€35.90</li>
                                            <li class="current-price">€34.11</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Madden by Steve
                                            Madd...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€11.90</li>
                                            <li class="current-price">€10.12</li>
                                            <li class="discount-price">-15%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Water and Wind
                                            Resist...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€11.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Juicy Couture Solid
                                            Slee...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€18.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Water and Wind
                                            Resist...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€11.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!-- Product Slider End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hot Deal Area End -->
    <!-- Hot deal area Start -->
    <section class="hot-deal-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h2>Herbs & Botanicals</h2>
                    </div>
                    <!-- Section Title End-->
                </div>
            </div>
            <div class="banner-inner-area d-flex">
                <div class="banner-left">
                    <div class="banner-wrapper">
                        <a href="shop-4-column.html"><img src='{{ asset("web/eco_life/assets/images/banner-image/56.jpg") }}' alt=""/></a>
                    </div>
                </div>
                <!-- New Arrivals Area Start -->
                <div class="banner-right mt-res-sm-90 mt-res-sm-60">
                    <!-- New Product Slider Start -->
                    <div class="new-product-slider-2 owl-carousel owl-nav-style owl-nav-style-5">
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€23.90</li>
                                            <li class="current-price">€21.51</li>
                                            <li class="discount-price">-10%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>GRAPHIC CORNER</span></a>
                                    <h2><a href="single-product.html" class="product-link">Brixton Patrol All
                                            Terr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€29.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Originals Kaval
                                            Windbr...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€35.90</li>
                                            <li class="current-price">€34.11</li>
                                            <li class="discount-price">-5%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Madden by Steve
                                            Madd...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price">€11.90</li>
                                            <li class="current-price">€10.12</li>
                                            <li class="discount-price">-15%</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/5.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Water and Wind
                                            Resist...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€11.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/6.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Juicy Couture Solid
                                            Slee...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€18.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                        <!-- Product Single Item -->
                        <div class="product-inner-item">
                            <article class="list-product mb-30px">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                        <img class="second-img" src='{{ asset("web/eco_life/assets/images/product-image/medical/7.jpg") }}' alt=""/>
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="wishlist.html" title="Add to wishlist">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                        <a class="quick_view mlr-10px" href="compare.html" title="Add to compare">
                                            <i class="ion-ios-shuffle-strong"></i>
                                        </a>
                                        <a class="quick_view" href="#" data-link-action="quickview"
                                           title="Quick view" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs text-center">
                                    <a class="inner-link" href="shop-4-column.html"><span>STUDIO DESIGN</span></a>
                                    <h2><a href="single-product.html" class="product-link">Water and Wind
                                            Resist...</a></h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="old-price not-cut">€11.90</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link-btn">
                                    <a href="#"> Add to cart</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!-- Product Slider End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hot Deal Area End -->
    <!-- Brand area start -->
    <div class="brand-area">
        <div class="container">
            <div class="brand-slider owl-carousel owl-nav-style owl-nav-style-2">
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/1.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/2.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/3.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/4.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/5.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/1.jpg") }}' alt=""/></a>
                </div>
                <div class="brand-slider-item">
                    <a href="#"><img src='{{ asset("web/eco_life/assets/images/brand-logo/2.jpg") }}' alt=""/></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->
    <!-- Footer Area start -->
    <footer class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- footer single wedget -->
                    <div class="col-md-6 col-lg-4">
                        <!-- footer logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="{{ asset('web/images/logo/' . $siteInformation->logo) }}"
                                                      alt="{{ config('app.name') }}"/></a>
                        </div>
                        <!-- footer logo -->
                        <div class="about-footer">
                            <p class="text-info">We are a team of designers and developers that create high quality
                                HTML template</p>
                            <div class="need-help">
                                <p class="phone-info">
                                    NEED HELP?
                                    <span>
                                            (+800) 345 678 <br/>
                                            (+800) 123 456
                                        </span>
                                </p>
                            </div>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- footer single wedget -->
                    <div class="col-md-6 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Information</h4>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Delivery</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Secure Payment</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                    <li><a href="#">Stores</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- footer single wedget -->
                    <div class="col-md-6 col-lg-2 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Custom Links</h4>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Legal Notice</a></li>
                                    <li><a href="#">Prices Drop</a></li>
                                    <li><a href="#">New Products</a></li>
                                    <li><a href="#">Best Sales</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- footer single wedget -->
                    <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Newsletter</h4>
                            <div class="subscrib-text">
                                <p>You may unsubscribe at any moment. For that purpose, please find our contact info
                                    in the legal notice.</p>
                            </div>

                            <div id="mc_embed_signup" class="subscribe-form">
                                <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank"
                                      name="mc-embedded-subscribe-form" method="post"
                                      action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" required=""
                                               placeholder="Enter your email here.." name="EMAIL" value=""/>
                                        <div class="mc-news" aria-hidden="true"
                                             style="position: absolute; left: -5000px;">
                                            <input type="text" value="" tabindex="-1"
                                                   name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"/>
                                        </div>
                                        <div class="clear">
                                            <input id="mc-embedded-subscribe" class="button" type="submit"
                                                   name="subscribe" value="Sign Up"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="img_app">
                                <a href="#"><img src='{{ asset("web/eco_life/assets/images/icons/app_store.png") }}' alt=""/></a>
                                <a href="#"><img src='{{ asset("web/eco_life/assets/images/icons/google_play.png") }}' alt=""/></a>
                            </div>
                        </div>
                    </div>
                    <!-- footer single wedget -->
                </div>
            </div>
        </div>
        <!--  Footer Bottom Area start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-center text-md-start order-2 order-md-1 mt-4 mt-md-0">
                        <p class="copy-text">Copyright © <a href="https://hasthemes.com/"> HasThemes</a>. All Rights
                            Reserved</p>
                    </div>
                    <div class="col-md-6 col-lg-7 text-center text-md-end order-1 order-md-2">
                        <img class="payment-img" src='{{ asset("web/eco_life/assets/images/icons/payment.png") }}' alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <!--  Footer Bottom Area End-->
    </footer>
    <!--  Footer Area End -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/>
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/>
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/>
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/>
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav owl-nav-style owl-nav-style-2"
                                 role="tablist">
                                <a class="active" data-bs-toggle="tab" href="#pro-1"><img
                                            src='{{ asset("web/eco_life/assets/images/product-image/medical/1.jpg") }}' alt=""/></a>
                                <a data-bs-toggle="tab" href="#pro-2"><img
                                            src='{{ asset("web/eco_life/assets/images/product-image/medical/2.jpg") }}' alt=""/></a>
                                <a data-bs-toggle="tab" href="#pro-3"><img
                                            src='{{ asset("web/eco_life/assets/images/product-image/medical/3.jpg") }}' alt=""/></a>
                                <a data-bs-toggle="tab" href="#pro-4"><img
                                            src='{{ asset("web/eco_life/assets/images/product-image/medical/4.jpg") }}' alt=""/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Originals Kaval Windbr</h2>
                            <p class="reference">Reference:<span> demo_17</span></p>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut">€18.90</li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore
                                et dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco
                            </p>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1"/>
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a href="#"> + Add To Cart</a>
                                </div>
                            </div>
                            <div class="pro-details-wish-com">
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                </div>
                            </div>
                            <div class="pro-details-social-info">
                                <span>Share</span>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ion-social-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Scripts to be loaded  -->
<!-- JS
                                ============================================ -->

<!--====== Vendors js ======-->
<!-- <script src='{{ asset("web/eco_life/js/vendor/jquery-3.6.0.min.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/vendor/bootstrap.min.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/vendor/jquery-migrate-3.3.2.min.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/vendor/modernizr-3.11.2.min.js") }}'></script> -->

<!--====== Plugins js ======-->

<!-- <script src='{{ asset("web/eco_life/js/plugins/owl-carousel.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/jquery.nice-select.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/venobox.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/countdown.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/elevateZoom.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/jquery-ui.min.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/slick.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/scrollup.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/aos.js") }}'></script>
        <script src='{{ asset("web/eco_life/js/plugins/range-script.js") }}'></script> -->

<!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->

<script src="{{ asset('web/eco_life/assets/js/vendor/vendor.min.js') }}" ) }}
"></script>
<script src="{{ asset('web/eco_life/assets/js/plugins/plugins.min.js') }}" ) }}
"></script>

<!-- Main Activation JS -->
<script src="{{ asset('web/eco_life/assets/js/main.js') }}" ) }}
"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    // cookie policy
    $(document).ready(function() {

        if (document.cookie.indexOf("accepted_cookies=") < 0) {
            //$('.cookie-overlay').removeClass('d-none').addClass('d-block');
        }

        $('.accept-cookies').on('click', function() {
            document.cookie = "accepted_cookies=yes;"
            if(document.cookie.indexOf("accepted_cookies=") < 0) {
                alert("We can't Process your request, please change the cookies setting Browser Level");
            } else {
                //$('.cookie-overlay').removeClass('d-block').addClass('d-none');
            }
        })

        // expand depending on your needs
        $('.close-cookies').on('click', function() {
            //$('.cookie-overlay').removeClass('d-block').addClass('d-none');
        })
    })

</script>

@stack('js')

<script>
    $(document).ready(function() {
        var showLoginFormPopup = false;
        @if(session()->has('login_failed') || session()->has('login_success'))
            showLoginFormPopup = true;
        @endif
                @if($errors->has('phone_no') || $errors->has('password') )
            showLoginFormPopup = true;
        @endif
                @if($errors->has('forgot_password_phone_no'))
            showLoginFormPopup = true;
        //showForgotPasswordForm();
        @endif
        @guest
        var nw = new Date();
        if((localStorage.showLoginForm == null || localStorage.showLoginForm <= nw.getTime())) {
            var dt = new Date();
            dt.setMinutes( dt.getMinutes() + 1 ); //Show login form for every 3 mins
            localStorage.showLoginForm = dt.getTime();
            if(!showLoginFormPopup) {
                setTimeout(function() {
                    triggerLoginForm()
                }, 2000);
            }
        }
        @endguest
        if(showLoginFormPopup) {
            //triggerLoginForm()
        }
    });

    function triggerLoginForm()
    {
        $(".user_login:first").trigger('click');
    }

    $(function() {
        $( ".product_search_box" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "/search_product",
                    dataType: "json",
                    data: {
                        q: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            minLength: 3,
            select: function( event, ui ) {
                if(typeof ui.item.value != 'undefined') {
                    window.location.href="/product/" + ui.item.value;
                } else {
                    window.location.href="/search?q=" + ui.item.value;
                }
            },
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        });
    });

    function showForgotPasswordForm()
    {
        $("#login_form").addClass('d-none');
        $("#show_forgot_password").removeClass('d-none');
    }

    function showLoginForm()
    {
        $("#login_form").removeClass('d-none');
        $("#show_forgot_password").addClass('d-none');
    }

</script>
</body>


<!-- Mirrored from htmldemo.net/ecolife/ecolife/index-19.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Sep 2023 09:59:41 GMT -->
</html>