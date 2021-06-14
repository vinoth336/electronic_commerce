<div class="sidebar col-lg-3 d-none d-sm-block" style="border-right: 11px solid #edeff2">
    <div class="row">
        <div class="col-lg-12" style="border-bottom: 1px solid #000; margin-bottom: 10px;padding-bottom: 10px">
            <h5 class="inline-block">Filter</h5>
            <button type="button"  class="inline-block button button-mini button-red float-right" name="clear_search" id="clear_search">Clear</button>

        </div>
        <div class="col-lg-12">
            <div class="toggle">
                <div class="toggle-header">
                    <div class="toggle-icon">
                        <i class="toggle-closed icon-line-plus"></i>
                        <i class="toggle-open icon-line-minus"></i>
                    </div>
                    <div class="toggle-title">
                        Select Category
                    </div>
                </div>
                <div class="toggle-content max-vh-50" style="overflow-y: auto">
                        <ul class="list-group">
                          {{--  @foreach ($categories as $category )
                               <li> <input type="checkbox" name="categories[]" value="{{ $category->slug }}"
                                    @if(in_array($category->slug, ($input['categories'] ?? [])))
                                        checked
                                    @endif
                            >&nbsp;{{ $category->name }}
                               </li>
                    @endforeach
                    --}}
                        </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="toggle">
                <div class="toggle-header">
                    <div class="toggle-icon">
                        <i class="toggle-closed icon-line-plus"></i>
                        <i class="toggle-open icon-line-minus"></i>
                    </div>
                    <div class="toggle-title">
                        Sub Category
                    </div>
                </div>
                <div class="toggle-content max-vh-50" style="overflow-y: auto">
                        <ul class="list-group">
                            @foreach ($subCategories as $brand )
                               <li> <input type="checkbox" name="brands[]" value="{{ $brand->slug }}"
                                    @if(in_array($brand->slug, ($input['brands'] ?? [])))
                                        checked
                                    @endif
                            >&nbsp;{{ $brand->name }}
                               </li>
                    @endforeach
                        </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="toggle">
                <div class="toggle-header">
                    <div class="toggle-icon">
                        <i class="toggle-closed icon-line-plus"></i>
                        <i class="toggle-open icon-line-minus"></i>
                    </div>
                    <div class="toggle-title">
                        Select Brand
                    </div>
                </div>
                <div class="toggle-content max-vh-50" style="overflow-y: auto">
                        <ul class="list-group">
                            @foreach ($brands as $brand )
                               <li> <input type="checkbox" name="brands[]" value="{{ $brand->slug }}"
                                    @if(in_array($brand->slug, ($input['brands'] ?? [])))
                                        checked
                                    @endif
                            >&nbsp;{{ $brand->name }}
                               </li>
                    @endforeach
                        </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-3">
            <div class="white-section" style="margin-left: 10px">
                <label>Price</label>
                <input class="range_03" />
            </div>
        </div>
        <div class="col-lg-12 mb-3">
            <div class="" style="text-align: right; margin-bottom:10px">
                <a href="Javascript:void(0)" class="button btn-danger button-mini"  id="reset" onclick="Filter.resetFilter()">Reset Filter</a>
                <a href="Javascript:void(0)" class="button btn-success button-mini"  id="reset" onclick="Filter.listionFilter()">Search</a>
            </div>
        </div>
    </div>
</div>

@push('css')
<link rel="stylesheet" href="{{ asset('web/css/components/bs-select.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('web/css/components/ion.rangeslider.css') }}" type="text/css" />
@endpush

@push('js')
<script src="{{ asset('web/js/components/bs-select.js') }}"></script>
<script src="{{ asset('web/js/components/selectsplitter.js') }}"></script>
<script type="text/javascript" src="{{ asset('web/js/filter.js') }}?v={{ $version }}"></script>
<script type="text/javascript" src="{{ asset('web/js/components/rangeslider.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".range_03").ionRangeSlider({
				type: "double",
				prefix: "₹",
				min: 0,
				max: 1000,
				from: 200,
				to: 800,
			});
    });  
</script>
@endpush
