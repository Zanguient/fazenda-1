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
                    @la_form($module)
					
					{{--
					@la_input($module, 'codigo')
					@la_input($module, 'nome')
					@la_input($module, 'endereco')
					@la_input($module, 'cidade')
					@la_input($module, 'cep')
					@la_input($module, 'telefone')
					@la_input($module, 'celular')
					@la_input($module, 'pais')
					@la_input($module, 'contato')
					@la_input($module, 'cnpj')
					@la_input($module, 'inscri_estadual')
					@la_input($module, 'tecnico')
					@la_input($module, 'registro_conselho')
					@la_input($module, 'area')
					@la_input($module, 'email')
					@la_input($module, 'info')
					--}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
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
@endpush
