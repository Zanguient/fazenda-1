@extends("la.layouts.app")

@section("contentheader_title", "Testes")
@section("contentheader_description", "Testes grid")
@section("section", "Testes")
@section("sub_section", "")
@section("htmlheader_title", "Testes")

@section("headerElems")
@la_access("Testes", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Cadastrar Testis</button>
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
			<th>
			     <div class="row">
                    <div class="col-xs-6"> Editar </div>
                    <div class="col-xs-6"> Excluir </div>
                 </div>
			</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Testes", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Testis</h4>
			</div>
			{!! Form::open(['action' => 'LA\TestesController@store', 'id' => 'testis-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)

					{{--
					@la_input($module, 'teste1')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				{!! Form::submit( 'Cadastrar', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access


@la_access("Testes", "delete")
<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Deletar Testis</h4>
			</div>
          {!! Form::open(['route' => [config('laraadmin.adminRoute') . '.__route_resource__.destroy', 'method' => 'delete', 'style'=>'display:inline']) !!}
			<div class="modal-body">
				<div class="box-body">
                         <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				{!! Form::submit( 'Excluir', ['class'=>'btn btn-danger']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access




@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        iDisplayLength: -1,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/testis_dt_ajax') }}",
		language: {
        			"lengthMenu": "_MENU_",
        			"search": "_INPUT_",
        			"searchPlaceholder": "Procurar",
                    "decimal": "",
                    "emptyTable": "Sem dados disponíveis",
                    "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                    "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
                    "infoFiltered": "(filtrado de _MAX_ registos no total)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "A carregar dados...",
                    "processing": "A processar...",
                    "search": "Procurar:",
                    "zeroRecords": "Não foram encontrados resultados",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Seguinte",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": clique para ordenar ascendente (ASC)",
                        "sortDescending": ": clique para ordenar descendente (DESC)"
                    }
        		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#testis-add-form").validate({
		
	});
});
</script>
@endpush
