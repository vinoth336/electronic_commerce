@extends('layouts.app', ['activePage' => 'Product Images', 'titlePage' => __('Create Product')])

@section('content')
    <style>
        /* change border radius for the tab , apply corners on top*/
        #exTab3 .nav-pills>li>a {
            border-radius: 4px 4px 0 0;
        }

        .specification_field, .feature_field {
            width : 300px;
        }

        .specification_value_field, .feature_value_field {
            width: 300px;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('product.store') }}" autocomplete="off" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Product Images') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div id="" class="container">
                                        <ul class="nav nav-pills">
                                            <li class="active nav-item">
                                                <a href="#basic_info" class="active nav-link" data-toggle="tab">
                                                    Basic Info
                                                </a>
                                            </li>
                                            <li class="active nav-item">
                                                <a href="#product_specification" class="nav-link" data-toggle="tab">
                                                    Specification
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#product_features" class="nav-link" data-toggle="tab">
                                                    Features
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="basic_info">
                                        <div>
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
                                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                            name="name" id="input-name" type="text"
                                                            placeholder="{{ __('Product Name') }}" value="{{ old('name') }}"
                                                            required="true" aria-required="true"
                                                            onfocusOut='getSlugName($(this).val())' />
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
                                                <label class="col-sm-2 col-form-label">{{ __('Product Code') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('product_code') ? ' has-danger' : '' }}">
                                                        <input
                                                            class="form-control{{ $errors->has('product_code') ? ' is-invalid' : '' }}"
                                                            name="product_code" id="input-product_code" type="text"
                                                            placeholder="{{ __('Product Code') }}"
                                                            value="{{ old('product_code') }}" required="true" aria-required="true" />
                                                        @if ($errors->has('product_code'))
                                                            <span id="product_code-error" class="error text-danger"
                                                                for="input-product_code">{{ $errors->first('product_code') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Category') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('service') ? ' has-danger' : '' }}">
                                                        <select
                                                            class="selectpicker form-control{{ $errors->has('service') ? ' is-invalid' : '' }}"
                                                            name="services[]" id="input-service" multiple>
                                                            <option value=''>Select Category</option>
                                                            @foreach ($services as $service)

                                                                <option value="{{ $service->id }}" @if ($service->id == old('service')) selected @endif>{{ $service->name }}</option>

                                                            @endforeach

                                                        </select>
                                                        @if ($errors->has('service'))
                                                            <span id="service-error" class="error text-danger"
                                                                for="input-service">{{ $errors->first('service') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Sub Category') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('sub_category') ? ' has-danger' : '' }}">
                                                        <select
                                                            class="selectpicker form-control{{ $errors->has('sub_category') ? ' is-invalid' : '' }}"
                                                            name="sub_category" id="input-service" type="text"
                                                            placeholder="{{ __('Sub Category') }}">
                                                            <option value=''>Select Sub Category</option>
                                                            @foreach ($subCategories as $subCategory)
                                                                <option value="{{ $subCategory->id }}" @if ($subCategory->id == old('sub_category')) selected @endif>{{ $subCategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('service'))
                                                            <span id="service-error" class="error text-danger"
                                                                for="input-service">{{ $errors->first('sub_category') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Brand') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('brand') ? ' has-danger' : '' }}">
                                                        <select
                                                            class="selectpicker form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}"
                                                            name="brand" id="input-brand" type="text"
                                                            placeholder="{{ __('Brand Name') }}">
                                                            <option value=''>Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}" @if ($brand->id == old('brand')) selected @endif>{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('brand'))
                                                            <span id="brand-error" class="error text-danger"
                                                                for="input-brand">{{ $errors->first('brand') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Tags') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('tag') ? ' has-danger' : '' }}">
                                                        <select class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}"
                                                            name="tags[]" id="input-tags" placeholder="{{ __('Tags') }}"
                                                            multiple="multiple">
                                                            @foreach ($tags as $tag)
                                                                <option data-value="{{ $tag->name }}" value="{{ $tag->name }}"
                                                                    @if (in_array($tag->id, old('tags', []))) selected @endif>{{ $tag->name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @if ($errors->has('tags'))
                                                            <span id="tags-error" class="error text-danger"
                                                                for="input-tags">{{ $errors->first('tags') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                        <textarea
                                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                            name="description" id="description"
                                                            placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                                        @if ($errors->has('description'))
                                                            <span id="phone_no-error" class="error text-danger"
                                                                for="input-phone_no">{{ $errors->first('description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                        <input
                                                            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                            name="price" id="input-price" type="text"
                                                            placeholder="{{ __('Price') }}" value="{{ old('price') }}"
                                                            required="true" aria-required="true" />
                                                        @if ($errors->has('price'))
                                                            <span id="price-error" class="error text-danger"
                                                                for="input-price">{{ $errors->first('price') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Discount Amount') }}</label>
                                                <div class="col-sm-7">
                                                    <div
                                                        class="form-group{{ $errors->has('discount_amount') ? ' has-danger' : '' }}">
                                                        <input
                                                            class="form-control{{ $errors->has('discount_amount') ? ' is-invalid' : '' }}"
                                                            name="discount_amount" id="input-discount_amount" type="text"
                                                            placeholder="{{ __('Discount Amount') }}"
                                                            value="{{ old('discount_amount') }}" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('discount_amount'))
                                                            <span id="discount_amount-error" class="error text-danger"
                                                                for="input-discount_amount">{{ $errors->first('discount_amount') }}</span>
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
                                                            name="status" id="input-status" type="checkbox" value="1" @if (old('status') == 1) checked @endif
                                                            aria-required="true" />
                                                        @if ($errors->has('status'))
                                                            <span id="status-error" class="error text-danger"
                                                                for="input-status">{{ $errors->first('status') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h2 class="col-sm-2 col-form-label ">
                                                    Product Images
                                                </h2>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-7">
                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <input type="file" name="product_images[]"
                                                            accept="image/x-png,image/jpg,image/jpeg" multiple>
                                                    </div>
                                                    @if ($errors->has('product_images'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('product_images') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="product_specification">
                                        <table class="table table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="text-center">Value</th>
                                                    <th class="text-center">Highlight</th>
                                                </tr>
                                            </thead>
                                            <tbody id="specification_section">
                                                @php
                                                    $specificationsRequest = $_REQUEST['specifications'] ?? [] ;
                                                    $specificationEntries = count($specificationsRequest) + 1;
                                                    $i = 1;
                                                @endphp
                                                @while($i <= $specificationEntries)
                                                <tr class="specification_record_section">
                                                    <td>
                                                        <select class="form-control specification_field"
                                                            name="specifications[]"  placeholder="{{ __('Name') }}">
                                                            @foreach ($specifications as $specification)
                                                                <option value="{{ $specification->id }}" 
                                                                    @if(old('specifications.' . $i) == $specification->id) 
                                                                        selected
                                                                    @endif>
                                                                    {{ $specification->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td  class="text-center">
                                                        <select class="form-control specification_value_field"
                                                            name="specification_values[]"  placeholder="{{ __('Value') }}">
                                                            @foreach ($specificationValues as $specificationValue)
                                                            <option value="{{ $specificationValue->id }}" 
                                                                @if(old('specification_values.' . $i) == $specificationValue->id) 
                                                                        selected
                                                                    @endif>
                                                                {{ $specificationValue->name }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="" name="specification_highlights[]" value="1" /> 
                                                        <a href="Javascript:void(0);" onclick="AddProduct.removeSpecificationRecordSection(this)"  class="text-danger float-right" >
                                                            <i class="material-icons" data-original-title title>close</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endwhile
                                            </tbody>
                                    </table>   
                                    <button class="btn btn-primary float-right" type="button" onclick="AddProduct.addSpecification()">
                                        Add
                                    </button>
                                    </div>
                                    <div class="tab-pane" id="product_features">
                                        <table class="table table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="text-center">Value</th>
                                                    <th class="text-center">Highlight</th>
                                                </tr>
                                            </thead>
                                            <tbody id="feature_section">
                                                @php
                                                    $featuresRequest = $_REQUEST['features'] ?? [] ;
                                                    $featureEntries = count($featuresRequest) + 1;
                                                    $i = 1;
                                                @endphp
                                                @while($i <= $featureEntries)
                                                <tr class="feature_record_section">
                                                    <td>
                                                        <select class="form-control feature_field"
                                                            name="features[]"  placeholder="{{ __('Name') }}">
                                                            @foreach ($features as $feature)
                                                                <option value="{{ $feature->id }}" 
                                                                    @if(old('features.' . $i) == $feature->id) 
                                                                        selected
                                                                    @endif>
                                                                    {{ $feature->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td  class="text-center">
                                                        <select class="form-control feature_value_field"
                                                            name="feature_values[]"  placeholder="{{ __('Value') }}">
                                                            @foreach ($featureValues as $featureValue)
                                                            <option value="{{ $featureValue->id }}" 
                                                                @if(old('feature_values.' . $i) == $featureValue->id) 
                                                                        selected
                                                                    @endif>
                                                                {{ $featureValue->name }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" class="" name="feature_highlights[]" value="1" /> 
                                                        <a href="Javascript:void(0);" onclick="AddProduct.removeFeatureRecordSection(this)"  class="text-danger float-right" >
                                                            <i class="material-icons" data-original-title title>close</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endwhile
                                            </tbody>
                                    </table>   
                                    <button class="btn btn-primary float-right" type="button" onclick="AddProduct.addFeatures()">
                                        Add
                                    </button>
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
    <input type="hidden" id="specification_content" value="{{ getValuesToJson($specifications) }}" />
    <input type="hidden" id="specification_value_content" value="{{ getValuesToJson($specificationValues) }}" />
    <input type="hidden" id="feature_content" value="{{ getValuesToJson($features) }}" />
    <input type="hidden" id="feature_value_content" value="{{ getValuesToJson($featureValues) }}" />

    @push('js')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            CKEDITOR.replace('description');
            var specificationContent = $.parseJSON($("#specification_content").val());
            var specificationValueContent = $.parseJSON($("#specification_value_content").val());
            var featureContent = $.parseJSON($("#feature_content").val());
            var featureValueContent = $.parseJSON($("#feature_value_content").val());

            $("#input-tags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $(".specification_field").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $(".specification_value_field").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $(".feature_field").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $(".feature_value_field").select2({
                tags: true,
                tokenSeparators: [',']
            });
            var randomId = '123';
            var AddProduct = {
                addSpecification : function() {
                        var rowId = 'Rw' + randomId;
                        var htmlContent = `<tr id='${rowId}' class="specification_record_section">`;
                        htmlContent += `<td>` + this.generateSpecificationSection() + `</td>`;
                        htmlContent += `<td class='text-center'>` + this.generateSpecificationValueSection() + `</td>`;
                        htmlContent += `<td class='text-center'>` + this.generateHighlightSection() + `</td>`;
                        htmlContent += `</tr>`;
                        this.updateRandomId();
                        $("#specification_section").append(htmlContent);
                        this.updateSelect2(rowId, 'specification_section');
                },
                addFeatures : function() {
                        var rowId = 'Rw' + randomId;
                        var htmlContent = `<tr id='${rowId}' class="feature_record_section">`;
                        htmlContent += `<td>` + this.generateFeatureSection() + `</td>`;
                        htmlContent += `<td class='text-center'>` + this.generateFeatureValueSection() + `</td>`;
                        htmlContent += `<td class='text-center'>` + this.generateHighlightSection() + `</td>`;
                        htmlContent += `</tr>`;
                        this.updateRandomId();
                        $("#feature_section").append(htmlContent);
                        this.updateSelect2(rowId, 'feature_section');
                },
                removeSpecificationRecordSection : function(container) {
                    var totalRecordCount = $("#specification_section").find("tr").length;
                    if (totalRecordCount > 1) {
                        container.closest('.specification_record_section').remove();
                    } else {
                        alert("You can't remove this");
                    }
                },
                generateSpecificationSection : function() {
                    var fieldId = 'S' + randomId;
                    var htmlContent = `<select id='${fieldId}' class="form-control specification_field" name="specifications[]">`;
                    $.each(specificationContent, function(key, value) {
                        htmlContent += `<option value='${key}' >${value.name}</option>`;
                    });
                    htmlContent += `</select>`;

                    return htmlContent;
                },
                generateSpecificationValueSection : function() {
                    var fieldId = 'SV' + randomId;
                    var htmlContent = `<select id='${fieldId}' class="form-control specification_value_field" name="specification_values[]" >`;
                    $.each(specificationValueContent, function(key, value) {
                        htmlContent += `<option value='${key}' >${value.name}</option>`;
                    });
                    htmlContent += `</select>`;

                    return htmlContent;
                },
                generateHighlightSection : function() {
                        return `<input type="checkbox" class="" name="specification_highlights[]" value="1" /> 
                                    <a href="Javascript:void(0);" onclick="AddProduct.removeSpecificationRecordSection(this)" class="text-danger float-right" >
                                        <i class="material-icons" data-original-title title>close</i>
                                    </a>`;
                },
                generateFeatureSection : function() {
                    var fieldId = 'F' + randomId;
                    var htmlContent = `<select id='${fieldId}' class="form-control feature_field" name="features[]">`;
                    $.each(featureContent, function(key, value) {
                        htmlContent += `<option value='${key}' >${value.name}</option>`;
                    });
                    htmlContent += `</select>`;

                    return htmlContent;
                },
                generateFeatureValueSection : function() {
                    var fieldId = 'FV' + randomId;
                    var htmlContent = `<select id='${fieldId}' class="form-control feature_value_field" name="feature_values[]" >`;
                    $.each(featureValueContent, function(key, value) {
                        htmlContent += `<option value='${key}' >${value.name}</option>`;
                    });
                    htmlContent += `</select>`;

                    return htmlContent;
                },
                generateFeatureHighlightSection : function() {
                        return `<input type="checkbox" class="" name="feature_highlights[]" value="1" /> 
                                    <a href="Javascript:void(0);" onclick="AddProduct.removeFeatureRecordSection(this)" class="text-danger float-right" >
                                        <i class="material-icons" data-original-title title>close</i>
                                    </a>`;
                },
                removeFeatureRecordSection : function(container) {
                    var totalRecordCount = $("#feature_section").find("tr").length;
                    if (totalRecordCount > 1) {
                        container.closest('.feature_record_section').remove();
                    } else {
                        alert("You can't remove this");
                    }
                },
                updateSelect2 : function(containerId, parentContainer) {
                    var container =  $("#" + parentContainer).find("#" + containerId);
                    container.find('select').select2({
                        tags: true,
                        tokenSeparators: [',']
                    });
                },
                updateRandomId : function() {
                    return randomId++;
                }

            }
            
        </script>
    @endpush
@endsection
