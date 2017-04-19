@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/bovinos') }}">Bovino</a> :
@endsection
@section("contentheader_description", $bovino->$view_col)
@section("section", "Bovinos")
@section("section_url", url(config('laraadmin.adminRoute') . '/bovinos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Bovinos Edit : ".$bovino->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($bovino, ['route' => [config('laraadmin.adminRoute') . '.bovinos.update', $bovino->id ], 'method'=>'PUT', 'id' => 'bovino-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nome')
					@la_input($module, 'sexo')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/bovinos') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#bovino-edit-form").validate({
		
	});
});
</script>
@endpush
