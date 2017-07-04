@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/testes') }}">Testis</a> :
@endsection
@section("contentheader_description", $testis->$view_col)
@section("section", "Testes")
@section("section_url", url(config('laraadmin.adminRoute') . '/testes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Testes Edit : ".$testis->$view_col)

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
				{!! Form::model($testis, ['route' => [config('laraadmin.adminRoute') . '.testes.update', $testis->id ], 'method'=>'PUT', 'id' => 'testis-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'teste1')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/testes') }}">Cancel</a></button>
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
	$("#testis-edit-form").validate({
		
	});
});
</script>
@endpush
