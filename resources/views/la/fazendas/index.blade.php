@extends("la.layouts.app")

@section("contentheader_title", "Fazendas")
@section("contentheader_description", "Fazendas listing")
@section("section", "Fazendas")
@section("sub_section", "Listing")
@section("htmlheader_title", "Fazendas Listing")

@section("headerElems")
@la_access("Fazendas", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Fazenda</button>
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

@la_access("Fazendas", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Fazenda</h4>
			</div>
			{!! Form::open(['action' => 'LA\FazendasController@store', 'id' => 'fazenda-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
					<table class="table table-striped">
						<tr>
							<td>@la_input($module, 'codigo')</td>
							<td>@la_input($module, 'nome')</td>
						</tr>
						<tr>
							<td>@la_input($module, 'cep') <br> @la_input($module, 'endereco')</td>
							<td>@la_input($module, 'pais') <br>@la_input($module, 'estado')
								@la_input($module, 'cidade')</td>
						</tr>
						<tr>
							<td>@la_input($module, 'celular')<br>@la_input($module, 'telefone')	<br>@la_input($module, 'contato')</td>
							<td>@la_input($module, 'registro_conselho')<br>@la_input($module, 'area')	<br>@la_input($module, 'email')</td>
						</tr>
						<tr>
							<td>@la_input($module, 'cnpj')</td>
							<td>@la_input($module, 'inscri_estadual')<br>
							@la_input($module, 'tecnico')</td>
						</tr>
						<tr>
							<td>@la_input($module, 'info')</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				{!! Form::submit( 'Cadastrar Fazenda', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

<input type="text" class="date">
<input type="text" name="cep">
@endsection

@push('styles')
<style>
	.modal-dialog{
		width: 85%;
	}
	.form-group{
		margin-bottom: 0px !important;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#AddModal').modal('show');
    });
</script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/fazenda_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#fazenda-add-form").validate({
		
	});
});
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

        $('input[name=celular]').mask(SPMaskBehavior, spOptions, {placeholder: "(__)____-____"});
        $('input[name=telefone]').mask(SPMaskBehavior, spOptions, {placeholder: "__/__/____"});
        $('input[name=cep]').mask('00000-000');
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.phone').mask('0000-0000' );
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('input[name=cnpj]').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
       $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});

    });
</script>
@endpush
