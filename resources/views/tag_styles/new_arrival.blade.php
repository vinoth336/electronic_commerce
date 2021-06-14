<section id="content" style="padding:8px;">
    <div class="content-wrap" style="margin-top: 20px; padding: 10px 0px 0px 0px;">
        <div class="row justify-content-center"
            style="background: rgb(251,232,55);background: linear-gradient(205deg, rgba(251,232,55,1) 0%, rgba(238,244,103,1) 70%, rgba(245,244,75,1) 76%, rgba(252,208,85,1) 100%);">
            <div class="col-md-12" style="margin-bottom: 10px;margin-top: 10px">
                <div class="fancy-title title-center title-border">
                    <h3 class="">New Arrival</h3>
                </div>
            </div>
                <div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items-xs="1"
                    data-items-sm="2" data-items-lg="4" data-items-xl="4" style="margin-bottom: 10px">
                    @foreach ($products->splice(0, 10) as $product)
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
