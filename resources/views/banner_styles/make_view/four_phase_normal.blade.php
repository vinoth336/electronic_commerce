<style>
    .rounded-edge-15 {
        border-radius: 15px;
    }

</style>
<section id="content" style="padding:8px;margin-top: 20px; padding-top: 10px;">
    <div class="content-wrap"
        style="padding: 0px;backgroud: rgba(255, 255, 255, 1); box-shadow: 0 -5px 20px -5px rgb(0 0 0 / 20%">
        <div class="row align-items-stretch" style="padding: 10px;">
            <div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items-xs="1" data-items-sm="2" data-items-lg="4" data-items-xl="4">
                @php
                    $i = 0;
                @endphp

                @while ($i <= 3)
                    <div class="oc-item text-center" style="height: 330px;margin-top: 10px">
                        @if ($bannerInfo)
                            <a class="grid-inner d-block h-100 rounded-edge-15"

                                    @if(isset($bannerInfo['target_url']))
                                        href="{{ $bannerInfo['target_url'] }}"
                                    @endif
                                >
                                <img src="{{ $bannerInfo[$i]['banner_image'] }}" style="width: 100%;height:100%" />
                                @if(isset($bannerInfo['title']))
                                    <div>
                                        {{ $bannerInfo['title'] }}
                                    </div>
                                @endif
                                @if(isset($bannerInfo['description']))
                                    <div>
                                        {{ $bannerInfo['description'] }}
                                    </div>
                                @endif

                            </a>
                        @endif
                    </div>
                    @php
                        $i++;
                    @endphp
                @endwhile

            </div>
        </div>
    </div>
</section>
