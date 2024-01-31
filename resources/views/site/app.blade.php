<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="{{ $siteInformation->site_name }}" />
    <meta name="description" content="{{ $description }}" />
    <link rel="canonical" href="{{ env('APP_URL') }}" />
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
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('web/style.css') }}?v={{ $version }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}?v={{ $version }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('web/include/rs-plugin/css/settings.css') }}"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('web/include/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/include/rs-plugin/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
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

<body class="stretched">
    <style>
        .ws_float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 89px;
            right: 22px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 9px;
        }

    </style>
    <style>
        .product_search_box {
            width: 97%;
            box-sizing: border-box;
            border: 1px solid #e8e4e4;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('{{ asset('site_images/searchicon.png') }}');
            background-position: 10px 11px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin: 10px auto 10px auto;
            height: 45px;
        }

    </style>

    <div id="wrapper" class="clearfix">
        <header id="header" class="full-header" data-logo-height="50" data-mobile-logo-height="30"
            data-mobile-sticky=true data-mobile-sticky-logo-height="30" data-sticky-logo-height="30"
            data-menu-padding="32">
            <div id="header-wrap" class="">
                <div class="container">
                    <div class="header-row top-search-parent">

                        <!-- Logo
      ============================================= -->
                        <div id="logo" class="" style="border:none;margin-right: 0px;">
                            <a href="{{ route('home') }}" class="standard-logo"
                                data-dark-logo="{{ asset('web/images/logo/' . $siteInformation->logo) }}">
                                <img src="{{ asset('web/images/logo/' . $siteInformation->logo) }}"
                                    alt="{{ config('app.name') }}">
                            </a>
                            <a href="{{ route('home') }}" class="retina-logo" data-dark-logo="">
                                <img src="{{ asset('web/images/logo/' . $siteInformation->logo) }}"
                                    alt="{{ config('app.name') }}" style="height: 25px !important;">
                            </a>
                        </div>


                        <div class="search-container d-none d-md-block d-lg-block" style="width: 50%;">
                            <form action="/search" method="get"  style="margin-bottom: 0px">
                                <input id="psearch-container d-none d-md-block d-lg-blocksearch-container d-none d-md-block d-lg-blockroduct_search_box1" style="" class="form-control product_search_box" type="text"
                                    placeholder="Search For Product, Brand, Category" name="q">
                            </form>
                        </div>


                        <div class="header-misc" style="text-align:right" >
							@guest
								<div class="">
									<a href="#" class="menu-link user_login" data-toggle="modal" data-target=".show-login-modal"
										style="font-weight:normal; text-transform: none;font-size: 14px;margin-top: 2px; margin-left: 2px ">
										Login
									</a>
								</div>
                        	@endguest
                            <div id="top-cart" class="header-misc-icon d-sm-block">
                                <a href="#" id="top-cart-trigger">
                                    <i class="icon-shopping-cart1"></i>
                                    @if(false)
                                    <span class="top-cart-number" id="top-cart-number"></span>
                                    @endif
                                </a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Cart</h4>
                                    </div>
                                    <div class="top-cart-items" id="top-cart-items">

                                    </div>
                                    <div class="top-cart-action">
                                        <span class="top-checkout-price" id="top-checkout-price"></span>
                                        <a href="{{ route('public.cart.checkout') }}"
                                            class="button button-3d button-small m-0">Checkout</a>
                                    </div>
                                </div>
                            </div><!-- #top-cart end -->
                        </div>
                    </div>
                </div>
				<div class="search-container d-block d-md-none" style="width: 100%; margin: auto">
					<form action="/search" method="get"  style="margin-bottom: 0px">
						<input id="product_search_box1" style="" class="form-control product_search_box" type="text"
							placeholder="Search For Product, Brand, Category" name="q">
					</form>
				</div>
            </div>



            <div class="header-wrap-clone" style="height: 100px;"></div>
        </header>
        <div id="page-menu" class="no-sticky" data-mobile-sticky="false" sticky-page-menu="false">
            <div id="page-menu-wrap">
                <div class="container">
                    <div class="page-menu-row">
                        <nav class="page-menu-nav">
                            <ul class="page-menu-container m-auto">
                                @foreach ($categoriesTypes as $categoryType)
                                    <li class="page-menu-item">
                                        <a href="#">
                                            <div>{{ $categoryType->name }}</div>
                                        </a>
                                        <ul class="page-menu-sub-menu">
                                            @foreach ($categoryType->categories as $category)
                                                <li class="page-menu-item">
                                                    <a href="#">
                                                        <div>{{ $category->name }}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </nav>
                        <div id="page-menu-trigger" class="ml-auto"><i class="icon-reorder"></i></div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

        @include('site.footer')
    </div>
