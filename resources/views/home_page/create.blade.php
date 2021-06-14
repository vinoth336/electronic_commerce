@extends('layouts.app', ['activePage' => 'home_page_setup', 'titlePage' => __('Home Page Create')])

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-info home_page_container_button" data-show="home_page_container" data-hide="section_container" onclick="HomePageManager.showContainer(this)">
                        Create Page
                    </button>
                    <button type="button" class="btn btn-dark section_container_button" data-show="section_container" data-hide="home_page_container" onclick="HomePageManager.showContainer(this)">
                        Sections
                    </button>
                </div>  
            </div>
            <div class="row" id="home_page_container">
                <div class="col-md-8">
                    <form method="post" action="{{ route('home_pages.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')
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
                                                placeholder="{{ __('Home Page Name') }}" value="{{ old('name') }}"
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
                                                name="make_view" id="make_view" 
                                                placeholder="{{ __('Variation Attributes') }}" onchange="HomePageManager.showDateSection()">
                                                    <option value="always" @if (old('make_view', 'always') == 'always') selected @endif >Always</option>
                                                    <option value="specific" @if(old('make_view') == 'specific') selected @endif>Specific Period</option>
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
                                                placeholder="{{ __('From Date') }}" value="{{ old('from_date') }}"
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
                                                placeholder="{{ __('To Date') }}" value="{{ old('to_date') }}"
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
                                                @if(old('status') == 1) checked @endif
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
                                <a href="{{ route('product.index') }}" class="btn btn-info">{{ __('Cancel') }}</a>

                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                            </div>
                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
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

                    init : function() {
                        $("#make_view").trigger('change');
                    }
                };

                $(document).ready(function() {
                    HomePageManager.init();
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
        </script>
    
    @endpush
@endsection
