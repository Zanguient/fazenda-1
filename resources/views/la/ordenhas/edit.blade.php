@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/ordenhas') }}">Ordenha</a> :
@endsection
@section("contentheader_description", $ordenha->$view_col)
@section("section", "Ordenhas")
@section("section_url", url(config('laraadmin.adminRoute') . '/ordenhas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Ordenhas Edit : ".$ordenha->$view_col)

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
				{!! Form::model($ordenha, ['route' => [config('laraadmin.adminRoute') . '.ordenhas.update', $ordenha->id ], 'method'=>'PUT', 'id' => 'ordenha-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'animal')
					@la_input($module, 'ordenha1')
					@la_input($module, 'ordenha2')
					@la_input($module, 'total')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/ordenhas') }}">Cancel</a></button>
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
	$("#ordenha-edit-form").validate({
		
	});
});
</script>
@endpush
