@extends('layouts.app', ['activePage' => 'home_page_setup', 'titlePage' => __('Home Page Setup')])

@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">

        @if (session('status'))

            <div class="col-md-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status') }}</span>
                </div>
            </div>

    @endif

        <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title float-left">{{ __('Home Pages') }}</h4>
                        <a href="{{ route('home_pages.create') }}" class="btn btn-success float-right"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-body ">
                        <ul class="accordion">
                            @foreach ($homePages as $homePage )
                            <li class="card">
                                <div class="card-header" id="heading{{ $homePage->id }}">
                                    <div class="pull-left">
                                        <h5 class="mb-0" data-toggle="collapse"
                                                data-target="#collapse{{ $homePage->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $homePage->id }}">
                                                {{ ucwords($homePage->name) }}
                                        </h5>
                                        <input type="hidden" name="sequence[]" value="{{ $homePage->id }}" />
                                    </div>
                                    <div class="pull-right">
                                        <form onsubmit="Javascript: return confirm('Are You Sure, Want To Remove This ?');"  method="POST" action="{{ route('home_pages.destroy', $homePage->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            @if($homePage->is_default)
                                                <label class="btn btn-danger" disabled type="button">
                                                    Default Page
                                                </label>
                                            @else
                                            <a href="{{ route('home_pages.make_default', $homePage->id) }}" class="btn btn-sm btn-warning" data-original-title title>
                                                Make As Default
                                            </a>
                                            @endif
                                            <a href="{{ route('home_page_render_content', $homePage->id) }}" target="_blank" class="btn btn-sm btn-info" data-original-title title>
                                                View
                                            </a>
                                            <a href="{{ route('home_pages.edit', $homePage->id) }}" class="btn btn-sm btn-success" data-original-title title>
                                                <i class="material-icons">edit</i>
                                            </a>
                                           <button type="submit" class="btn  btn-sm btn-danger"><i class="material-icons" data-original-title title>close</i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<script>

    function updateSequence()
    {
        $.ajax({
            "url" : "/admin/faqs/update_sequence",
            "type" : "put",
            "dataType": "json",
            "data" : $("#sortable").find('[name="sequence[]"]').serialize(),
            "success" : function(data) {
                    console.log(data);
                    alert("Update Successfully");
            }
        });

    }

</script>

@endsection
