<section id="content" class="d-none d-xl-block">
    <div class="content-wrap" style="padding: 10px 0px 0px 0px;">
        <div class="row justify-content-center"
            style="background: rgb(251,232,55);background: linear-gradient(205deg, rgba(251,232,55,1) 0%, rgba(238,244,103,1) 70%, rgba(245,244,75,1) 76%, rgba(252,208,85,1) 100%);">
            <div class="col-md-12" style="margin-bottom: 10px;">
                <div class="fancy-title title-center title-border">
                    <h3 class="">New Arrival</h3>
                </div>
            </div>
            <div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items-xs="1" data-items-sm="2"
                data-items-lg="4" data-items-xl="4" style="margin-bottom: 10px">
                @php
                    $productContent = $products;
                @endphp
                @foreach ($productContent as $product)
                    @php
                        $productImage = $product->productImages()->first();
                        $productImage = $productImage->image ?? 'no-image.png';
                    @endphp
                    <div class="oc-item" style="width:100%">
                        <div class="feature-box text-center media-box fbox-bg bg-white"
                            style="border: 1px solid #e5e5e5;border-radius: 15px; margin:auto; width: 95%">
                            <div class="fbox-media">
                                <img src="{{ asset('web/images/product_images/thumbnails/' . $productImage) }}"
                                    alt="{{ $product->name }}" loading="lazy" style="width: 80%; margin: auto">
                            </div>
                            <div class="fbox-content" style="border: none; border-radius: 15px">
                                <h5>{{ substr($product->name, 0, 20) }}</h5>
                                <span class="subtitle" style="margin-top: 5px"><i
                                        class="icon-rupee"></i>&nbsp;{{ number_format($product->price, 2) }}</span>
                                <p><a href="{{ route('view_product', $product->slug) }}" class="btn btn-info">Shop
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<section id="content" style="" class="d-block d-md-none ">
    <div class="content-wrap">
        <div class="row justify-content-center "
            style="background: rgb(251,232,55);background: linear-gradient(205deg, rgba(251,232,55,1) 0%, rgba(238,244,103,1) 70%, rgba(245,244,75,1) 76%, rgba(252,208,85,1) 100%);">
                <div class="col-md-12" style="margin-bottom: 10px;margin-top: 10px; ">
                    <div class="fancy-title title-center title-border">
                        <h3 class="">New Arrival</h3>
                    </div>
                </div>
                <div class="col-md-12 bg-white ">
                    <div id="shop" class="shop row grid-container gutter-20">
                        @php
                            $productContent = $products;
                        @endphp
                        @foreach ($products as $product)
                            @php
                                $productImage = $product->productImages()->first();
                                $productImage = $productImage->image ?? 'no-image.png';
                            @endphp

                            <div class="product col-lg-3 col-md-3 col-sm-6 col-12 col-sm"
                                id="product_{{ $product->slug }}" style="overflow:hidden">
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
                                    </div>
                                    <div class="product-desc" style="padding:10px">
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
                                                <input type="hidden" class="product_name" value="{{ $product->name }}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-12 " style="background: rgb(251,232,55);background: linear-gradient(205deg, rgba(251,232,55,1) 0%, rgba(238,244,103,1) 70%, rgba(245,244,75,1) 76%, rgba(252,208,85,1) 100%);min-height: 20px">
                </div>
        </div>
    </div>
</section>
