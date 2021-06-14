<div class="col-md-12" id="section_list_container">
    <div class="card ">
        <div class="card-header card-header-primary">
            <h4 class="card-title float-left">{{ __('Home Page Sections List') }}</h4>
            <a href="{{ $homePage->renderRoute('show_add_section') }}" class="btn btn-success float-right"><i class="material-icons">add</i></a>
        </div>
        <div class="card-body ">
            <ul class="accordion" id="sortable_section_list">
                @forelse ($homePageSections as $homePageSection )
                <li class="card">
                    <div class="card-header" id="heading{{ $homePageSection->id }}">
                        <div class="pull-left">
                            <h5 class="mb-0" data-toggle="collapse"
                                    data-target="#collapse{{ $homePageSection->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $homePageSection->id }}">
                                    <a class="hand"><i class="material-icons">reorder</i></a>
                                    <b>{{ strtoupper($homePageSection->type) }}</b> - {{ ucwords($homePageSection->name) }}
                            </h5>
                            <input type="hidden" name="sequence[]" value="{{ $homePageSection->id }}" />
                        </div>
                        <div class="pull-right">
                            <form onsubmit="Javascript: return confirm('Are You Sure, Want To Remove This ?');"  method="POST" action="{{ route('home_page_delete_section', ['homePage' => $homePage->id, 'homePageSection' => $homePageSection->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('home_page_render_section', ['homePage' => $homePage->id, 'homePageSection' => $homePageSection->id]) }}" class="btn btn-sm btn-success" target="_blank">View</a>
                                    @if($homePageSection->type == 'tags') 
                                        <a href="{{ route('home_page_edit_tag_section', ['homePage' => $homePage->id, 'homePageSection' => $homePageSection->id]) }}" class="btn btn-sm btn-success" data-original-title title><i class="material-icons">edit</i></a>
                                    @else
                                        <a href="{{ route('home_page_edit_banner_section', ['homePage' => $homePage->id, 'homePageSection' => $homePageSection->id]) }}" class="btn btn-sm btn-success" data-original-title title><i class="material-icons">edit</i></a>
                                    @endif
                               <button type="submit" class="btn  btn-sm btn-danger"><i class="material-icons" data-original-title title>close</i></button>
                            </form>
                        </div>
                    </div>
                </li>
                @empty
                    <li class="card">
                        <div class="text-center">
                            <h3>No Section Found</h3>
                            <a href="{{ $homePage->renderRoute('show_add_section') }}" class="btn btn-primary" style="margin-top: 20px">
                                Add Section
                            </a>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
<div class="col-md-12 hide" id="create_section_container">
</div>


@push('js')
<link rel="stylesheet" href="{{ asset('web/css/draganddrop.css') }}" type="text/css" />
<script src="{{ asset('web/js/draganddrop.js') }}"></script>
<script>
$(document).ready(function() {
    $("#sortable_section_list")
        .sortable({
            handle: '.hand',
            group: true,
            update: function(event, ui) {
                updateSequence();
            }
        })
});
</script>
@endpush