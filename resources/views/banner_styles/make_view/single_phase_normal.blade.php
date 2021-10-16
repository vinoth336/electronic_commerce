<section id="content" style="padding:8px;margin-top: 20px; padding-top: 10px;">
    <div class="content-wrap" style="padding: 0px;">
        <div class="row align-items-stretch">
            <div id="banner_image_1" class="col-sm-12 text-center single_banner min-vh-20" data-target="modal_box_1">
                    @if($bannerInfo)
                        @if($targetUrlInfo)
                            <a href="{{ $targetUrlInfo[0] }}" target="_blank" >
                        @endif
                        <img src="{{ $bannerInfo[0]['banner_image'] }}" style="width:100%;height:100%" />
                        @if($targetUrlInfo)
                            </a>
                        @endif
                    @endif
            </div> 
        </div>
    </div>
</section>