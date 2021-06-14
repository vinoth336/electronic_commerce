@extends('layouts.app', ['activePage' => 'Product Images', 'titlePage' => __('Create Product')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('variation.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Variation') }}</h4>

                            </div>
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
                                                placeholder="{{ __('Product Name') }}" value="{{ old('name') }}"
                                                required="true" aria-required="true" onfocusOut='getSlugName($(this).val())' />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Slug Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('slug_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('slug_name') ? ' is-invalid' : '' }}"
                                                name="slug_name" id="input-slug_name" type="text"
                                                placeholder="{{ __('Slug Name') }}" value="{{ old('slug_name') }}"
                                                required="true" aria-required="true" readonly />
                                            @if ($errors->has('slug_name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-slug_name">{{ $errors->first('slug_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Variation Attributes') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Variation Attribute') ? ' has-danger' : '' }}">
                                            <select
                                                class="form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}"
                                                name="variation_attributes[]" id="input-variation_attributes" 
                                                placeholder="{{ __('Variation Attributes') }}" multiple="multiple">
                                                @foreach($variationOptions as $variationOption)
                                                    <option data-value="{{ $variationOption->name }}" value="{{ $variationOption->id }}" @if(in_array($variationOption->id, old('variationOptions', []))) selected @endif >{{ $variationOption->name }}</option>
                                                @endforeach
                                                    
                                            </select>
                                            @if ($errors->has('variation_attributes'))
                                                <span id="variation_attributes-error" class="error text-danger"
                                                    for="input-variation_attributes">{{ $errors->first('variation_attributes') }}</span>
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
            </div>
        </div>
    </div>
    @push('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
            $("#input-variation_attributes").select2({
                tags: true,
                tokenSeparators: [',']
            });

    </script>
    @endpush
@endsection
