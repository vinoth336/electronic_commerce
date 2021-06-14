@php
$mode = $mode ?? 'view';
@endphp
<style>
    #five_phase_banner_container .open_file_browse {
        padding:0px !important;
    }
    .file_browse_hint {
        margin-top: 10%;
        text-align: center;
    }
</style>
@php 
    $contentBanner = $contentBanner ?? null;
    $bannerInfo = null;
    $targetUrlInfo = null;
@endphp
<div class="container" id="single_phase_banner_container">
    <div class="row">
            <div id="banner_image_1" class="col-sm-12 text-center open_file_browse" data-target="modal_box_1"
                style="height: 310px;background-color: #328398">
                    <div class="file_browse_hint @if($contentBanner) hide @endif">Click To Add Image</div>
                    @if($contentBanner)
                        @php
                            $bannerInfo = $contentBanner->banner_info;
                            $targetUrlInfo = $contentBanner->target_urls;
                        @endphp
                        <img src="{{ $contentBanner->banner_info[0]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[0]['bannerId'] }}" />
                    @endif
            </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_box_1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="contact_person_name"></h4>
                </div>
                <div class="modal-body">
                    @php
                        $url_1 = '';
                        if($contentBanner) {
                            if($targetUrlInfo[0] ?? false) {
                                $url_1 = $targetUrlInfo[0];
                            }
                        }
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true" value="{{ $url_1 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" id="image_1" data-target="banner_image_1" @if($contentBanner == null) data-required="true" @endif />
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="SinglePhaseNormalManager.saveData('modal_box_1')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="SinglePhaseNormalManager.closeModal('modal_box_1')">Close</button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ route('load_banner_js_file', 'single_phase_normal') }}"></script>
