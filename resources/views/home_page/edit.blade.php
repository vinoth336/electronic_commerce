@extends('layouts.app', ['activePage' => 'home_page_setup', 'titlePage' => __('Update Home Page')])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-info home_page_container_button" data-show="home_page_container" data-hide="section_container" onclick="HomePageManager.showContainer(this)">
                        Home Page Details
                    </button>
                    <button type="button" class="btn btn-dark section_container_button" data-show="section_container" data-hide="home_page_container" onclick="HomePageManager.showContainer(this)">
                        Sections
                    </button>
                </div>  
            </div>
            <div class="row " id="home_page_container">
                <div class="col-md-8">
                    <form method="post" action="{{ route('home_pages.update', $homePage->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card" style="height: 400px">
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text"
                                                placeholder="{{ __('Home Page Name') }}" value="{{ old('name', $homePage->name) }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Make View') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('make_view') ? ' has-danger' : '' }}">
                                            <select
                                                class="selectpicker form-control {{ $errors->has('make_view') ? ' is-invalid' : '' }}"
                                                name="make_view" id="input-make_view" 
                                                placeholder="{{ __('Variation Attributes') }}" onchange="HomePageManager.showDateSection()">
                                                    <option value="always" @if (old('make_view', $homePage->make_view) == 'always') selected @endif >Always</option>
                                                    <option value="specific" @if(old('make_view', $homePage->make_view) == 'specific') selected @endif>Specific Period</option>
                                            </select>
                                            @if ($errors->has('make_view'))
                                                <span id="make_view-error" class="error text-danger"
                                                    for="input-make_view">{{ $errors->first('make_view') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row date_container hide">
                                    <label class="col-sm-2 col-form-label">{{ __('From Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('from_date') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control specific_date datepicker {{ $errors->has('from_date') ? ' is-invalid' : '' }}"
                                                name="from_date" id="input-from_date" type="text"
                                                placeholder="{{ __('From Date') }}" value="{{ old('from_date', $homePage->from_date) }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('from_date'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-from_date">{{ $errors->first('from_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row date_container hide">
                                    <label class="col-sm-2 col-form-label">{{ __('To Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('to_date') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control datepicker {{ $errors->has('to_date') ? ' is-invalid' : '' }}"
                                                name="to_date" id="input-to_date" type="text"
                                                placeholder="{{ __('To Date') }}" value="{{ old('to_date',  $homePage->to_date) }}"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('to_date'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-to_date">{{ $errors->first('to_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <input style="width: 62px;"
                                                class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                                name="status" id="input-status" type="checkbox" value="1"
                                                @if(old('status', $homePage->status) == 1) checked @endif
                                                aria-required="true" />
                                            @if ($errors->has('status'))
                                                <span id="status-error" class="error text-danger"
                                                    for="input-status">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <a href="{{ route('home_pages.index') }}" class="btn btn-info">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                        @php 
                            if($toShow == 'home_page_container') { 
                                $showContainer = 'home_page_container';
                            }
                            else {
                                $showContainer = 'section_container';
                            }
                        @endphp
                        <input type="hidden" id="TO_SHOW" value="{{ $showContainer }}" />
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card " style="height: 400px">
                        <div class="card-body text-center">
                            <div style="margin-top: 100px" >
                                <div>
                                    <i>
                                        Note : Add Section only enable after the home page created.
                                    </i>
                                </div>
                            <button type="button" class="btn btn-primary" style="margin-top: 20px">
                                Add Section
                            </button>
                            <br>
                            <a href="{{ route('home_page_render_content', $homePage->id) }}" class="btn btn-primary" target="_blank" style="margin-top: 20px">
                                View Page
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row hide" id="section_container">
                @if($toShow == 'show_add_section')
                    @include('home_page.add_section')
                @elseif($toShow == 'show_edit_tag_section')
                    @include('home_page.edit_section_tags')
                @elseif($toShow == 'show_edit_banner_section')
                    @include('home_page.edit_section_banner')
                @else
                    @include('home_page.section_list')
                @endif
            </div>
        </div>
    </div>
    @push('js')
    <script>
        var HomePageManager = {
            showContainer : function(container) {
                var showContainer = $(container).data('show');
                var hideContainer = $(container).data('hide');
                $("#" + showContainer).removeClass('hide');
                $("#" + hideContainer).addClass('hide');
                $("." + showContainer + "_button").removeClass('btn-dark');
                $("." + showContainer + "_button").addClass('btn-info');
                $("." + hideContainer + "_button").removeClass('btn-info')
                $("." + hideContainer + "_button").addClass('btn-dark');
            },

            showDateSection : function() {

                var makeView = $("#make_view").val();

                $(".date_container").each(function() {
                        if(makeView == 'specific') {
                            $(this).removeClass('hide');
                            $(this).find("input").each(function() {
                                    $(this).attr('required', true);
                            });
                        } else {
                            $(this).addClass('hide');
                            $(this).find("input").each(function() {
                                    $(this).removeAttr('required');
                            });
                        }
                });
            },
            initMakeViewAction : function() {
                $("#make_view").trigger('change');
            },
            toShow : function() {
                var toShow = $("#TO_SHOW").val();
                $("." + toShow + "_button").trigger('click');
            },
            init : function() {
                this.initMakeViewAction();
                this.toShow();
            }
        };

        var PageSectionManager = {
            loadSection : function(sectionType) {
                if(sectionType == '')
                    return false;

                $.ajax({
                    "url" : "load/" + sectionType + "/section",
                    "type" : "get",
                    "success" : function(data) {
                            $("#section_content").html(data);
                    }
                });
            },

            init : function() {
                $("#input-section_type").trigger('change');
            }
        };

        var BannerSectionManager = {
        loadBannerStyle : function(bannerStyle) {
            if(bannerStyle == '')
                    return false;

                $.ajax({
                    "url" : "load/style/" + bannerStyle + "/banner",
                    "type" : "get",
                    "success" : function(data) {

                            $(document).find("#load_banner_details").html(data);
                    }
                });
        }
        };

        var SectionTagManager = {
            updateTagName : function() {
                var tagName = '';
                var tag = $(document).find("#tag_id")
                if(tag.val() == '') {
                    tagName = '';
                } else {
                    tagName = tag.find(":selected").data('name');
                }

                $(document).find("#input-tag-name").val(tagName);   
            }
        };

        $(document).ready(function() {
            HomePageManager.init();
            PageSectionManager.init();
            $('.datepicker').datetimepicker({
                format: "YYYY-MM-DD",
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: "fa fa-chevron-left",
                    next: "fa fa-chevron-right",
                    today: "fa fa-screenshot",
                    clear: "fa fa-trash",
                    close: "fa fa-remove"
                }
            });
        });

    function updateSequence()
    {
        var sectionList = $(document).find('#sortable_section_list');
        $.ajax({
            "url" : "/admin/home_pages/home_page_section/update_sequence",
            "type" : "put",
            "dataType": "json",
            "data" : sectionList.find('[name="sequence[]"]').serialize(),
            "success" : function(data) {
                    console.log(data);
                    alert("Update Successfully");
            }
        });

    }
</script>
    
    @endpush
@endsection
