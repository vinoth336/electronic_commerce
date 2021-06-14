@php
$mode = $mode ?? 'view';
@endphp
<style>
    #five_phase_banner_container .open_file_browse {
        padding:0px !important;
    }
    .file_browse_hint {
        margin-top: 30%;
        text-align: center;
    }
</style>
@php 
    $contentBanner = $contentBanner ?? null;
    $bannerInfo = null;
    $targetUrlInfo = null;
    $bannerInfo = null;
    $targetUrlInfo = null;
    if ($contentBanner) {
        $bannerInfo = $contentBanner->banner_info;
        $targetUrlInfo = $contentBanner->target_urls;
    }

@endphp

<div class="container" id="five_phase_banner_container">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div id="banner_image_1" class="col-sm-12 text-center open_file_browse" data-target="modal_box_1"
                    style="height: 155px;background-color: #328398">
                     <div class="file_browse_hint @if($contentBanner) hide @endif ">Click To Add Image</div>
                     @if($bannerInfo)
                        <img src="{{ $bannerInfo[0]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[0]['bannerId'] }}" />
                     @endif
                </div>
                <div id="banner_image_2" class="col-sm-12 text-center open_file_browse" data-target="modal_box_2"
                    style="height: 155px;background-color: #5ad0d6">
                    <div class="file_browse_hint @if($contentBanner) hide @endif">Click To Add Image</div>
                    @if($bannerInfo)
                        <img src="{{ $bannerInfo[1]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[1]['bannerId'] }}" />
                     @endif
                </div>
            </div>
        </div>
        <div id="banner_image_3" class="col-sm-4 open_file_browse" data-target="modal_box_3"
            style="height: 310px;background-color: #dd4c7b">
            <div class="file_browse_hint @if($contentBanner) hide @endif">Click To Add Image</div>
            @if($bannerInfo)
                        <img src="{{ $bannerInfo[2]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[2]['bannerId'] }}" />
            @endif
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div id="banner_image_4" class="col-sm-12 text-center open_file_browse" data-target="modal_box_4"
                    style="height: 155px;background-color: #52909c">
                    <div class="file_browse_hint @if($contentBanner) hide @endif">Click To Add Image</div>
                    @if($bannerInfo)
                        <img src="{{ $bannerInfo[3]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[3]['bannerId'] }}" />
                     @endif
                </div>
                <div id="banner_image_5" class="col-sm-12 text-center open_file_browse" data-target="modal_box_5"
                    style="height: 155px;background-color: #f3e370">
                    <div class="file_browse_hint @if($contentBanner) hide @endif">Click To Add Image</div>
                    @if($bannerInfo)
                        <img src="{{ $bannerInfo[4]['banner_image'] }}" style="width: 100%;height:100%" />
                        <input type="hidden" name="banner_ids[]" value="{{ $bannerInfo[4]['bannerId'] }}" />
                     @endif
                </div>
            </div>
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
                        if($targetUrlInfo) {
                            $url_1 = $targetUrlInfo[0] ?? "";
                        }
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true"  value="{{ $url_1 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" data-target="banner_image_1" @if($contentBanner == null) data-required="true" @endif />
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="FivePhaseNormalManager.saveData('modal_box_1')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="FivePhaseNormalManager.closeModal('modal_box_1')">Close</button>
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal_box_2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="contact_person_name"></h4>
                </div>
                <div class="modal-body">
                    @php
                    $url_2 = '';
                    if($targetUrlInfo) {
                        $url_2 = $targetUrlInfo[1] ?? "";
                    }
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true" value="{{ $url_2 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" data-target="banner_image_2" @if($contentBanner == null) data-required="true" @endif />
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="FivePhaseNormalManager.saveData('modal_box_2')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="FivePhaseNormalManager.closeModal('modal_box_2')">Close</button>
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal_box_3" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="contact_person_name"></h4>
                </div>
                <div class="modal-body">
                    @php
                        $url_3 = '';
                        if($targetUrlInfo) {
                            $url_3 = $targetUrlInfo[2] ?? "";
                        }
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true" value="{{ $url_3 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" data-target="banner_image_3" @if($contentBanner == null) data-required="true" @endif />
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="FivePhaseNormalManager.saveData('modal_box_3')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="FivePhaseNormalManager.closeModal('modal_box_3')">Close</button>
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal_box_4" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="contact_person_name"></h4>
                </div>
                <div class="modal-body">
                    @php
                    $url_4 = '';
                    if($targetUrlInfo) {
                        $url_4 = $targetUrlInfo[3] ?? "";
                    }
                @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true" value="{{ $url_4 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" data-target="banner_image_4"  @if($contentBanner == null) data-required="true" @endif/>
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="FivePhaseNormalManager.saveData('modal_box_4')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="FivePhaseNormalManager.closeModal('modal_box_4')">Close</button>
                </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal_box_5" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="contact_person_name"></h4>
                </div>
                <div class="modal-body">
                    @php
                    $url_5 = '';
                        if($targetUrlInfo) {
                            $url_5 = $targetUrlInfo[4] ?? "";
                        }
                    @endphp
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    Url
                                </td>
                                <td class="input_section">
                                    <input type="text" name="target_urls[]" class="form-control" data-required="true" value="{{ $url_5 }}" />
                                </td>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td class="input_section">
                                    <input type="file" name="images[]" class="banner_file_upload" data-target="banner_image_5" @if($contentBanner == null) data-required="true" @endif/>
                                </td>    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="FivePhaseNormalManager.saveData('modal_box_5')"  >Save</button>&nbsp;
                    <button type="button" class="btn btn-default" onclick="FivePhaseNormalManager.closeModal('modal_box_5')">Close</button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ route('load_banner_js_file', 'five_phase_normal') }}"></script>
