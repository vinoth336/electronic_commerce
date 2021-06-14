<div class="col-md-12" id="section_tag_container" style="margin-top: 20px">  
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <input
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" id="input-tag-name" type="text"
                placeholder="{{ __('Banner Name') }}" value="{{ old('name') }}"
                required="true" aria-required="true" />
                @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger"
                        for="input-name">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Select Style') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <select class="form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}"
                    name="style" id="input-style" required onchange="BannerSectionManager.loadBannerStyle(this.value)">
                        <option value="">Select Banner Style</option>
                    @foreach (getBannerSectionStyles() as $styles)
                        <option value="{{ $styles->id }}">{{ $styles->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Hide In') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <select 
                    class="form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}" 
                    name="hide_in" id="input-hide_in">
                        <option value="">None</option>
                        <option value="mobile" @if (old('hide_in') == 'mobile') selected @endif>Mobile</option>
                        <option value="desktop" @if (old('hide_in') == 'desktop') selected @endif>Desktop</option>
                </select>
                    @if ($errors->has('hide_in'))
                        <span id="name-error" class="error text-danger"
                            for="input-name">{{ $errors->first('hide_in') }}</span>
                    @endif
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px; margin-top: 20px">
        <div class="col-md-12 text-center">
            <h4>Banner Style</h4>
        </div>
    </div>
    <div class="row" id="load_banner_details">

    </div>
</div>