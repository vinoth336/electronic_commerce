@extends('site.app')

@section('content')
    <style>

#ofBar {
    flex-direction: column;
    align-items: normal;
}


        #ofBar {
    background:#ded7d7;
    z-index: 999999999;
    font-size: 16px;
    color: #fff;
    padding: 6px;
    font-weight: 400;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    bottom: 0px;
    width: 100%;
    border-radius: 5px;
    left: 0;
    right: 0;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 13px 27px -5px rgb(50 50 93 / 25%), 0 8px 16px -8px rgb(0 0 0 / 30%), 0 -6px 16px -6px rgb(0 0 0 / 3%);
}

#ofBar-content {
    background-color: #fff;
    color: #40312d;
    border-radius: 4px;
    padding: 10px 20px;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    font-size: 12px;
    opacity: .95;
    margin-right: 20px;
    box-shadow: 0 5px 10px -3px rgb(0 0 0 / 23%), 0 6px 10px -5px rgb(0 0 0 / 25%);
}

        </style>
    <section id="content">
        <div class="content-wrap" style="padding-top: 10px;">
            <div class="container-fluid clearfix">
                <div class="row gutter-40 col-mb-80">
                    @include('site.side_filter')
                    <div class="postcontent col-lg-9 order-lg-last">
                        <div class="row">
                            <div class="col-lg-6 mb-5">
                                <div class="product_view">
                                    <a style="margin-left: 10px" class="" title="List View"><i
                                            class="icon-line-grid"></i></a>
                                    <a style="margin-left: 10px" class="" title="List View"><i class="icon-list"></i></a>
                                    <a style="margin-left: 10px" class="d-none d-sm-block" title="Product Compare"><i
                                            class="icon-arrows-alt-h"></i>&nbsp;Product Compare</a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right d-none d-sm-block">
                                <h6 class="inline-block">Sort By</h6>
                                <select class="selectpicker input_filter inline-block" name="sort_by" id="sort_by">
                                    <option value="low_to_high" @if (request()->input('sort_by') == 'low_to_high') selected @endif>Low To High</option>
                                    <option value="high_to_low" @if (request()->input('sort_by') == 'high_to_low') selected @endif>High To Low</option>
                                </select>
                            </div>
                        </div>

                        <div id="shop" class="shop row grid-container gutter-20">
                            @foreach ($products as $product)
                                <div class="product col-lg-3 col-md-3 col-sm-6 col-12 col-sm"
                                    id="product_{{ $product->slug }}">
                                    <div class="grid-inner">
                                        <div class="product-image">
                                            @forelse ($product->productImages as $productImage)
                                                <a href="{{ route('view_product', $product->slug) }}">
                                                    <img class="product_image lazy"
                                                        data-src="{{ asset('web/images/product_images/thumbnails/' . $productImage->image) }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            @empty
                                                <a href="{{ route('view_product', $product->slug) }}">
                                                    <img class="product_image lazy"
                                                        data-src="{{ asset('web/images/product_images/thumbnails/no_image.png') }}"
                                                        alt="{{ $product->name }}">
                                                </a>
                                            @endforelse
                                            <div class="sale-flash badge badge-success p-2 text-uppercase">Sale!</div>
                                            <div class="bg-overlay d-none">
                                                <div class="bg-overlay-content align-items-end justify-content-between"
                                                    data-hover-speed="400">
                                                    <a href="#" class="btn btn-dark mr-2"><i
                                                            class="icon-shopping-basket"></i>
                                                    </a>
                                                    <a href="{{ route('view_product', $product->id) }}"
                                                        class="btn btn-dark"><i class="icon-line-expand"></i>
                                                    </a>
                                                </div>
                                                <div class="bg-overlay-bg bg-transparent"></div>
                                            </div>
                                        </div>

                                        <div class="product-desc">
                                            <div class="product-title min-h-30">
                                                <h3><a title="{{ $product->name }}"
                                                        data-code="{{ $product->product_code }}"
                                                        href="{{ route('view_product', $product->slug) }}">{{ $product->name }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-price">
                                                <div class="">
                                                    @if ($product->discount_amount > 0)
                                                        <del>₹ {{ $product->price }}</del>
                                                        <ins>₹ {{ $product->discount_amount }}</ins>
                                                    @else
                                                        <ins>₹ {{ $product->price }}</ins>
                                                    @endif
                                                    <input type="hidden" class="product_price"
                                                        value="{{ $product->actual_price }}" />
                                                    <input type="hidden" class="product_name"
                                                        value="{{ $product->name }}" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-info" onclick="Cart.add(this)"
                                                data-productid="{{ $product->slug }}" class="text-info"
                                                style="font-weight: 300 !important; font-size:18px;" class=""
                                                href="Javascript:void(0)">
                                                <p class="add_cart_container" style="margin-bottom: 1px; line-height: 1">
                                                    <span class="add_cart_label">Add To Cart</span>
                                                    <i class="icon-shopping-cart"></i>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="ofBar" class="d-md-none d-lg-none">
            <div class="ofBar-content">
                <button type="button" class="btn" data-toggle="modal" data-target="#sortby_modal"  style="width: 48%">
                    <i class="icon-sort1"></i>&nbsp;Sort
                </button>
                <button type="button" class="btn mobile_sidebar" data-toggle="modal" data-target="#filter_modal" style="width: 48%">
                    <i class="icon-filter1"></i>&nbsp;
                    Filter
                </button>
            </div>
        </div>
    </section>
    @include('site.mobile_side_filter')
    <link rel="stylesheet" href="{{ asset('web/css/components/bs-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('web/left_right_modal_box.css') }}" type="text/css" />
    <script src="{{ asset('web/js/components/bs-select.js') }}"></script>
    <script src="{{ asset('web/js/components/selectsplitter.js') }}"></script>
@endsection
