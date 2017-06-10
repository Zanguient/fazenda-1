@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/lotes') }}">Lote</a> :
@endsection
@section("contentheader_description", $lote->$view_col)
@section("section", "Lotes")
@section("section_url", url(config('laraadmin.adminRoute') . '/lotes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Lotes Edit : ".$lote->$view_col)

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
				{!! Form::model($lote, ['route' => [config('laraadmin.adminRoute') . '.lotes.update', $lote->id ], 'method'=>'PUT', 'id' => 'lote-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nome')
					@la_input($module, 'data')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/lotes') }}">Cancel</a></button>
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
	$("#lote-edit-form").validate({
		
	});
});
</script>
@endpush
