@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/patrimonios') }}">Patrimonio</a> :
@endsection
@section("contentheader_description", $patrimonio->$view_col)
@section("section", "Patrimonios")
@section("section_url", url(config('laraadmin.adminRoute') . '/patrimonios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Patrimonios Edit : ".$patrimonio->$view_col)

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
				{!! Form::model($patrimonio, ['route' => [config('laraadmin.adminRoute') . '.patrimonios.update', $patrimonio->id ], 'method'=>'PUT', 'id' => 'patrimonio-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'numero')
					@la_input($module, 'tipo')
					@la_input($module, 'valor')
					@la_input($module, 'data_entrada')
					@la_input($module, 'depreciacao')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/patrimonios') }}">Cancel</a></button>
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
	$("#patrimonio-edit-form").validate({
		
	});
});
</script>
@endpush
