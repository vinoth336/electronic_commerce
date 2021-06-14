<div class="col-md-12" id="section_tag_container" style="margin-top: 20px">  
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Select Tag') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <select class="
                    form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}"
                        name="tag_id" id="tag_id" onchange="SectionTagManager.updateTagName()">
                        @if($tags->count())
                            <option value="">Select Tag</option>
                        @endif
                        @forelse ($tags as $tag)
                            <option value="{{ $tag->id }}" data-name="{{ $tag->name }}">{{ $tag->name }} ({{ $tag->product_tags()->count() }})</option>
                        @empty
                            <option value="">No Tags Available</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-7">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    name="name" id="input-tag-name" type="text"
                    placeholder="{{ __('Tag Name') }}" value="{{ old('name') }}"
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
                        name="style" id="input-style" required>
                        @if($tags->count())
                            <option value="">Select Styles</option>
                        @endif
                        @foreach (getTagSectionStyles() as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
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
        <div class="row" id="load_products">

        </div>
</div>

@push('js')
    <script>
        
    </script>    

@endpush