@extends('site.app')
@section('content')
    <section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-25 min-vh-md-50" data-autoplay="5000"
        data-speed="650" data-loop="true" data-effect="fade" data-progress="true">

    </section>

    <div class="home_page_section" style="background-color: #f1f3f6">

        @foreach($homePageSections as $homePageSection)
            @php
                $content = $homePageSection->content;
                echo $content->makeView();
            @endphp
        @endforeach

        @if(false)
            <div class="section footer-stick" style="background: #fff; margin-top: 20px;padding-top: 10px">
                <h3 class="center">Our Brands</h3>
                <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel carousel-widget"
                    data-margin="30" data-nav="true" data-pagi="false" data-autoplay="5000" data-items-xs="3"
                    data-items-sm="3" data-items-md="5" data-items-lg="6" data-items-xl="7">

                    @foreach ($brands as $brand )
                        <div class="oc-item">
                            <a href="{{ route('public.product_list') }}?brand={{ $brand->slug }}">
                                @if(file_exists(public_path('web/images/brand_images/thumbnails/' . $brand->logo)) && $brand->logo)
                                    <img src="{{ asset('web/images/brand_images/thumbnails/' . $brand->logo ) }}" alt="{{ $brand->name }}"/>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--- WISHLIST -->
        @if(false)
            <section id="content" style="margin-top: 20px; padding-top: 10px;">
                <div class="content-wrap" style="padding: 0px">
                    <div class="row justify-content-center">
                        <div class="col-md-12" style="margin-bottom: 10px">
                            <div class="fancy-title title-center title-border">
                                <h3>Your WishList</h3>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 10px">
                            <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-pagi="false"
                                data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
                                @php
                                    $i=1;
                                @endphp
                                @while ($i <=5)
                                    <div class="oc-item">
                                        <div class="product">
                                            <div class="product-image">
                                                <a href="#"><img src="{{ asset('site_images/ryzen.jpg') }}" alt="Checked Short Dress"></a>
                                                <div class="sale-flash badge badge-success p-2">50% Off*</div>
                                                <div class="bg-overlay">
                                                    <div class="bg-overlay-content align-items-end justify-content-between"
                                                        data-hover-animate="fadeIn" data-hover-speed="400">
                                                        <a href="#" class="btn btn-dark mr-2"><i
                                                                class="icon-shopping-basket"></i></a>
                                                        <a href="include/ajax/shop-item.html" class="btn btn-dark"
                                                            data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                                    </div>
                                                    <div class="bg-overlay-bg bg-transparent"></div>
                                                </div>
                                            </div>
                                            <div class="product-desc center">
                                                <div class="product-title">
                                                    <h3><a href="#">Ryzen 7 3800XT</a></h3>
                                                </div>
                                                <div class="product-price"><del>31,590</del> <ins>31,000</ins></div>
                                                <div class="product-rating">
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star3"></i>
                                                    <i class="icon-star-half-full"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endwhile
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif

        <section id="content">
            <div class="section mb-0">
                <div class="container">

                    <div class="row col-mb-50">
                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-thumbs-up2"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>100% Original</h3>
                                    <p class="mt-0">We guarantee you the sale of Original Brands.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-credit-cards"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>Payment Options</h3>
                                    <p class="mt-0">We accept Visa, MasterCard and American Express.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-truck2"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>Free Shipping</h3>
                                    <p class="mt-0">Free Delivery to 100+ Locations on orders above $40.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-undo"></i>
                                </div>
                                <div class="fbox-content">
                                    <h3>30-Days Returns</h3>
                                    <p class="mt-0">Return or exchange items purchased within 30 days.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


@endsection
