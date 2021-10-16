<section id="content" style="">
    <div class="content-wrap" style="padding: 10px 25px 10px 25px">
        <div class="row justify-content-center">
            <div class="col-md-12" style="">
                <div class="fancy-title title-center title-border">
                    <h3>{{ $name }}</h3>
                </div>
            </div>
            <div class="col-md-12" style="">
                <div id="oc-products_{{ str_replace(" ","", $name) }}" class="owl-carousel products-carousel carousel-widget" data-pagi="true"
                    data-items-xs="2" data-items-sm="2" data-items-md="3" data-items-lg="6">
                    @foreach ($products as $product)
                        @php
                            $productImage = $product->productImages()->first();
                            $productImage = $productImage->image ?? 'no-image.png';
                        @endphp
                        <div class="oc-item">
                            <div class="product" id="product_{{ $product->slug }}">
                                <div class="product-image">
                                    <a href="{{ route('view_product', $product->slug) }}" target="_blank">
                                        <img class="product_image"
                                            src="{{ asset('web/images/product_images/thumbnails/' . $productImage) }}"
                                            alt="{{ $product->name }}" >
                                    </a>
                                    @if ($product->discount_amount > 0)
                                        <div class="sale-flash badge badge-success p-2 d-none d-md-block d-lg-none">
                                            Best Offer
                                        </div>
                                    @endif
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title">
                                        <h3>
                                            <a href="{{ route('view_product', $product->slug) }}" target="_blank">
                                                {{ substr($product->name, 0, 20) }}
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="product-price" style="height: 40px;">
                                        <div class="text-center">
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
