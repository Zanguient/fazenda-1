@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/funcionarios') }}">Funcionario</a> :
@endsection
@section("contentheader_description", $funcionario->$view_col)
@section("section", "Funcionarios")
@section("section_url", url(config('laraadmin.adminRoute') . '/funcionarios'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Funcionarios Edit : ".$funcionario->$view_col)

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
				{!! Form::model($funcionario, ['route' => [config('laraadmin.adminRoute') . '.funcionarios.update', $funcionario->id ], 'method'=>'PUT', 'id' => 'funcionario-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nome')
					@la_input($module, 'cpf')
					@la_input($module, 'funcao')
					@la_input($module, 'celular')
					@la_input($module, 'sexo')
					@la_input($module, 'data_nascimento')
					@la_input($module, 'telefone_residencial')
					@la_input($module, 'telefone_comercial')
					@la_input($module, 'city')
					@la_input($module, 'bairro')
					@la_input($module, 'numero')
					@la_input($module, 'rua')
					@la_input($module, 'complemento')
					@la_input($module, 'cep')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/funcionarios') }}">Cancel</a></button>
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
	$("#funcionario-edit-form").validate({
		
	});
});
</script>
@endpush
