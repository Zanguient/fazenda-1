@extends("la.layouts.app")

@section("contentheader_title", "Funcionarios")
@section("contentheader_description", "Funcionarios listing")
@section("section", "Funcionarios")
@section("sub_section", "Listing")
@section("htmlheader_title", "Funcionarios Listing")

@section("headerElems")
@la_access("Funcionarios", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Funcionario</button>
@endla_access
@endsection

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

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Funcionarios", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cadastrar Funcionario</h4>
			</div>
			{!! Form::open(['action' => 'LA\FuncionariosController@store', 'id' => 'funcionario-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<div class="container">
						<div class="row">
							<div class="col-xs-11">
								<div class="card">
									<ul class="nav nav-tabs" role="tablist">
										<li role="Dados Pessoais" class="active"><a href="#pessoal" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a></li>
										<li role="presentation"><a href="#endereco" aria-controls="profile" role="tab" data-toggle="tab">Endereco</a></li>
										<li role="presentation"><a href="#profissional" aria-controls="messages" role="tab" data-toggle="tab">Profissional</a></li>
										<li role="presentation"><a href="#contato" aria-controls="settings" role="tab" data-toggle="tab">Contato</a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="pessoal">
											@la_input($module, 'nome')
											@la_input($module, 'sexo')
											@la_input($module, 'data_nascimento')
											@la_input($module, 'cpf')
										</div>
										<div role="tabpanel" class="tab-pane" id="endereco">
											@la_input($module, 'cep')
											@la_input($module, 'rua')
											@la_input($module, 'bairro')
											@la_input($module, 'numero')
											@la_input($module, 'complemento')
											@la_input($module, 'city')
										</div>
										<div role="tabpanel" class="tab-pane" id="profissional">
											@la_input($module, 'funcao')
										</div>
										<div role="tabpanel" class="tab-pane" id="contato">
											@la_input($module, 'celular')
											@la_input($module, 'telefone_residencial')
											@la_input($module, 'telefone_comercial')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				{!! Form::submit( 'Cadastrar Funcionario', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access
@endsection

@push('styles')
<style>
	.modal-dialog{
		width: 85%;
	}
	.form-group{
		margin-bottom: 0px !important;
	}
	.modal-header{
		background-color: #00a7d0;
		text-align: center;
		color: white;
		font-size: 16px;
		font-style: inherit;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>

@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/funcionario_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#funcionario-add-form").validate({
		
	});
});
</script>
<script type="text/javascript">
//	$(window).on('load',function(){
//		$('#AddModal').modal('show');
//	});
</script>
<script>
    console.log("chamou as funcoes de mascara!");
    $(document).ready(function(){
        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $('input[name=celular]').mask(SPMaskBehavior, spOptions);
        $('input[name=telefone]').mask(SPMaskBehavior, spOptions);
        $('input[name=telefone_residencial]').mask(SPMaskBehavior, spOptions );
        $('input[name=telefone_comercial]').mask(SPMaskBehavior, spOptions );
        $('input[name=cep]').mask('00000-000');
        $('input[name=cpf]').mask('000.000.000-00');
        $('input[name=cnpj]').mask('00.000.000/0000-00', {reverse: true});
    });
</script>

<script type="text/javascript">
    jQuery(function($){
        $('input[name=cep]').change(function(){
            var cep_code = $(this).val();
            if( cep_code.length <= 0 )
                return;
            $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
                function(result){
                    if( result.status!=1 ){
                        alert(result.message || "Houve um erro desconhecido");
                        return;
                    }
                    $("input#cep").val( result.code );
                    $("input[name=estado]").val( result.state );
                    $("input[name=city]").val( result.city );
                    $("input[name=bairro]").val( result.district );
                    $("input[name=rua]").val( result.address );
                });
        });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'pt-br'
        });
    });

</script>


@endpush
