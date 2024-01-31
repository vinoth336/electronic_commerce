
    <div class="col-md-12">
        <form method="POST" action="{{ route('home_page_save_section', $homePage->id) }}" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="card ">
                <div class="card-body ">
                    <div class="row hide" id="section_status">
                        <div class="col-sm-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('status') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Create Section') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <select
                                    class="selectpicker form-control{{ $errors->has('variationOption') ? ' is-invalid' : '' }}"
                                    name="" id="input-section_type" onchange="PageSectionManager.loadSection(this.value)">
                                    <option value="">Select Section</option>
                                    <option value="banner" @if (old('section_type') == 'banner') selected @endif>Banner</option>
                                    <option value="tags" @if (old('section_type') == 'tags') selected @endif>Tags</option>
                                    <option value="tags" @if (old('section_type') == 'main_slider') selected @endif>Main Slider</option>
                                </select>
                                @if ($errors->has('section_type'))
                                    <span id="section_type-error" class="error text-danger"
                                        for="input-section_type">{{ $errors->first('section_type') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" id="section_content">

                    </div>
                </div>

                <div class="card-footer ml-auto mr-auto">
                    <a href="{{ route('home_pages.edit', ['home_page' => $homePage->id, 'show' => 'section_container']) }}" class="btn btn-info">{{ __('Cancel') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>

@push('js')
   
    
@endpush