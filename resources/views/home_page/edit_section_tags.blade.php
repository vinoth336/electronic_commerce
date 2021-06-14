<div class="col-md-12" style="margin-top: 20px">
    <form method="POST" action="{{ route('home_page_update_section', ['homePage' => $homePage->id, 'homePageSection' => $homePageSection->id]) }}">
        @method('put')
        @csrf
        <input type="hidden" name="section_type" value="tags" />
        <div class="card ">
            <div class="card-header card-header-primary">
                <h4 class="card-title float-left">{{ __('Edit Tag Section') }}</h4>
            </div>
            <div class="card-body ">
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Tag') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <select class="
                form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}" name="tag_id" id="tag_id"
                                onchange="SectionTagManager.updateTagName()">
                                @if ($tags->count())
                                    <option value="">Select Tag</option>
                                @endif
                                @forelse ($tags as $tag)
                                    <option value="{{ $tag->id }}" data-name="{{ $tag->name }}" @if ($contentTag->tag_id == $tag->id) selected @endif>{{ $tag->name }} ({{ $tag->product_tags()->count() }})</option>
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
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                id="input-tag-name" type="text" placeholder="{{ __('Tag Name') }}"
                                value="{{ old('name', $contentTag->name) }}" required="true" aria-required="true" />
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
                                @if ($tags->count())
                                    <option value="">Select Styles</option>
                                @endif
                                @foreach (getTagSectionStyles() as $styles)
                                    <option value="{{ $styles->id }}" @if ($styles->id == $contentTag->style) selected @endif>{{ $styles->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Hide In') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <select class="form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}"
                                name="hide_in" id="input-hide_in">
                                <option value="">None</option>
                                <option value="mobile" @if (old('hide_in', $contentTag->hide_in) == 'mobile') selected @endif>Mobile</option>
                                <option value="desktop" @if (old('hide_in', $contentTag->hide_in) == 'desktop') selected @endif>Desktop</option>
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
                <div class="card-footer ml-auto mr-auto">
                    <a href="{{ route('home_pages.edit', ['home_page' => $homePage->id, 'show' => 'section_container']) }}" class="btn btn-info">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>

            </div>
        </div>

    </form>
</div>

@push('js')
    <script>

    </script>

@endpush
