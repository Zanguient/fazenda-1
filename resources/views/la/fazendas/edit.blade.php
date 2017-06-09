@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fazendas') }}">Fazenda</a> :
@endsection
@section("contentheader_description", $fazenda->$view_col)
@section("section", "Fazendas")
@section("section_url", url(config('laraadmin.adminRoute') . '/fazendas'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Fazendas Edit : ".$fazenda->$view_col)

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
				{!! Form::model($fazenda, ['route' => [config('laraadmin.adminRoute') . '.fazendas.update', $fazenda->id ], 'method'=>'PUT', 'id' => 'fazenda-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'estado')
					@la_input($module, 'codigo')
					@la_input($module, 'nome')
					@la_input($module, 'cidade')
					@la_input($module, 'telefone')
					@la_input($module, 'cep')
					@la_input($module, 'contato')
					@la_input($module, 'endereco')
					@la_input($module, 'celular')
					@la_input($module, 'pais')
					@la_input($module, 'cnpj')
					@la_input($module, 'inscri_estadual')
					@la_input($module, 'tecnico')
					@la_input($module, 'registro_conselho')
					@la_input($module, 'area')
					@la_input($module, 'email')
					@la_input($module, 'info')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fazendas') }}">Cancel</a></button>
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
	$("#fazenda-edit-form").validate({
		
	});
});
</script>
@endpush
