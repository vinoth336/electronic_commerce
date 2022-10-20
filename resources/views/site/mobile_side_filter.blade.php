<!-- Modal -->

<div class="modal modal_outer right_modal fade" id="filter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
    <div class="modal-dialog" role="document">
       <form method="post"  id="get_quote_frm">
        <div class="modal-content ">
            <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
            <div class="modal-header">
              <h2 class="modal-title">Filter</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body get_quote_view_modal_body">
                <div class="row">
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
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                <div class="col-lg-12 " style="text-align: right; margin-top:10px">
                    <a href="Javascript:void(0)" class="btn btn-danger"  id="reset" onclick="Filter.resetFilter()">
                    Reset
                    </a>
                    <a href="Javascript:void(0)" class="btn btn-success"  id="reset" onclick="Filter.fetchDatas()">Search</a>
                </div>
                </div>
            </div>
        </div><!-- modal-content -->
      </form>
    </div><!-- modal-dialog -->
</div>

<div class="modal modal_outer right_modal fade" id="sortby_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
    <div class="modal-dialog" role="document">
       <form method="post"  id="get_quote_frm">
        <div class="modal-content ">
            <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
            <div class="modal-header">
              <h2 class="modal-title">Sort By</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body get_quote_view_modal_body">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <h6>Sort By</h6>
                        <select class="selectpicker" name="sort_by" id="sort_by">
                            <option value="low_to_high" @if(request()->get('sort_by') == 'low_to_high') selected @endif>Low To High</option>
                            <option value="high_to_low"  @if(request()->get('sort_by') == 'high_to_low') selected @endif>High To Low</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                <div class="col-lg-12 " style="text-align: right; margin-top:10px">
                    <a href="Javascript:void(0)" class="btn btn-danger"  id="reset" onclick="Filter.resetFilter()">
                    Reset
                    </a>
                    <a href="Javascript:void(0)" class="btn btn-success"  id="reset" onclick="Filter.fetchDatas()">Search</a>
                </div>
                </div>
            </div>
        </div><!-- modal-content -->
      </form>
    </div><!-- modal-dialog -->
</div>