<style>
    .rounded-edge-15 {
        border-radius: 15px;
    }
</style>
<section id="content" style="padding:8px;margin-top: 20px; padding-top: 10px;">
    <div class="content-wrap" style="padding: 0px;backgroud: rgba(255, 255, 255, 1); box-shadow: 0 -5px 20px -5px rgb(0 0 0 / 20%">
        <div class="row align-items-stretch" style="padding: 10px;">
            <div class="col-md-4">
                <div class="row">
                    <div id="banner_image_1" class="col-md-12 text-center" data-target="modal_box_1"
                        style="height: 155px;">
                        @if ($bannerInfo)
                            <a class="grid-inner d-block h-100 rounded-edge-15"
                               @if($bannerInfo[0]['target_url'])
                                   href="{{ $bannerInfo[0]['target_url'] }}"
                               @endif
                            >
                                <img src="{{ $bannerInfo[0]['banner_image'] }}" style="width: 100%;height:100%" />

                                @if($bannerInfo[0]['title'])
                                    <div>
                                        {{ $bannerInfo[0]['title'] }}
                                    </div>
                                @endif
                                @if($bannerInfo[0]['description'])
                                    <div>
                                        {{ $bannerInfo[0]['description'] }}
                                    </div>
                                @endif
                            </a>
                        @endif
                    </div>
                    <div id="banner_image_2" class="col-md-12 text-center open_file_browse" data-target="modal_box_2"
                        style="height: 155px;margin-top: 10px;margin-bottom: 10px">

                        @if ($bannerInfo && isset($bannerInfo[1]))
                            <a class="grid-inner d-block h-100 rounded-edge-15"
                               @if($bannerInfo[0]['target_url'])
                                   href="{{ $bannerInfo[0]['target_url'] }}"
                               @endif
                            >
                                <img src="{{ $bannerInfo[1]['banner_image'] }}" style="width: 100%;height:100%" />

                                @if($bannerInfo[1]['title'])
                                    <div>
                                        {{ $bannerInfo[1]['title'] }}
                                    </div>
                                @endif
                                @if($bannerInfo[1]['description'])
                                    <div>
                                        {{ $bannerInfo[1]['description'] }}
                                    </div>
                                @endif
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div id="banner_image_3" class="col-md-4 open_file_browse" data-target="modal_box_3"
                style="height: 330px;margin-bottom: 10px">

                @if ($bannerInfo)
                <a class="grid-inner d-block h-100 rounded-edge-15"
                   @if($bannerInfo[2]['target_url'])
                       href="{{ $bannerInfo[2]['target_url'] }}"
                   @endif

                >
                    <img src="{{ $bannerInfo[2]['banner_image'] }}" style="width: 100%;height:100%" />

                    @if($bannerInfo[2]['title'])
                        <div>
                            {{ $bannerInfo[2]['title'] }}
                        </div>
                    @endif
                    @if($bannerInfo[2]['description'])
                        <div>
                            {{ $bannerInfo[2]['description'] }}
                        </div>
                    @endif
                </a>
                @endif
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div id="banner_image_4" class="col-md-12 text-center open_file_browse" data-target="modal_box_4"
                        style="height: 155px;margin-bottom: 10px">

                        @if ($bannerInfo)
                        <a class="grid-inner d-block h-100 rounded-edge-15"
                           @if($bannerInfo[3]['target_url'])
                               href="{{ $bannerInfo[3]['target_url'] }}"
                           @endif
                        >
                            <img src="{{ $bannerInfo[3]['banner_image'] }}" style="width: 100%;height:100%" />

                            @if($bannerInfo[3]['title'])
                                <div>
                                    {{ $bannerInfo[3]['title'] }}
                                </div>
                            @endif
                            @if($bannerInfo[3]['description'])
                                <div>
                                    {{ $bannerInfo[3]['description'] }}
                                </div>
                            @endif
                        </a>
                        @endif
                    </div>
                    <div id="banner_image_5" class="col-md-12 text-center open_file_browse" data-target="modal_box_5"
                        style="height: 155px;margin-bottom: 10px">

                        @if ($bannerInfo)
                        <a class="grid-inner d-block h-100 rounded-edge-15"
                           @if($bannerInfo[4]['target_url'])
                               href="{{ $bannerInfo[4]['target_url'] }}"
                           @endif
                        >
                            <img src="{{ $bannerInfo[4]['banner_image'] }}" style="width: 100%;height:100%" />

                            @if($bannerInfo[4]['title'])
                                <div>
                                    {{ $bannerInfo[4]['title'] }}
                                </div>
                            @endif
                            @if($bannerInfo[4]['description'])
                                <div>
                                    {{ $bannerInfo[4]['description'] }}
                                </div>
                            @endif
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
