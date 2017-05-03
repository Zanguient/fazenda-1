@extends("la.layouts.app")

@section("contentheader_title", "Ordenhas")
@section("contentheader_description", "Ordenhas listing")
@section("section", "Ordenhas")
@section("sub_section", "Listing")
@section("htmlheader_title", "Ordenhas Listing")

@push('scripts')
<script src="{{ asset('la-assets/js/angular.min.js') }}"></script>
<script src="{{ asset('la-assets/js/services/ordenhaService.js') }}"></script>
<script src="{{ asset('la-assets/js/controllers/OrdenhaCtrl.js') }}"></script>
{{--<script src="{{ asset('la-assets/js/angularApp.js') }}"></script>--}}
{{--<script src="{{ asset('la-assets/js/app.js') }}"></script>--}}
@endpush

<div ng-app="appOrdenha" ng-controller="ordenhaController">

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
        Lote
        <div>
            <select name="lote" id="lote">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <td>Animal</td>
                    <td>1 Ordenha</td>
                    <td>2 Ordenha</td>
                    <td>Total</td>
                </tr>
                </thead>
                @foreach ($bovinos as $bov)
                    <tr class="success">
                        @la_access("Ordenhas", "create")
                    {!! Form::open(['action' => 'LA\OrdenhasController@store', 'id' => $bov['1']]) !!}
                    <tr>
                        <td class="col-lg-2">
                            {{ $bov['1'] }}
                            {{ Form::hidden('animal', $bov['0'] , array('class' => 'form-control'
                            , 'required', 'ng-model'=> 'bov.animal')) }}
                        </td>
                        <td>
                            {{ Form::text('ordenha1', null , array('class' => 'form-control','required')) }}
                        </td>
                        <td>
                            {{ Form::text('ordenha2', null , array('class' => 'form-control', 'required')) }}
                        </td>
                        <td>
                            {{ Form::text('total', null , array('class' => 'form-control')) }}
                        </td>
                        <td>
                            {!! Form::submit( 'Lancar', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endla_access
                @endforeach
            </table>
        </div>

    @endsection
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
    @endpush
    @push('scripts')
    <script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>


    <style>
        input {
            border:none;
            width:100%;
            height:100%;
            font-family: Verdana, Helvetica, Arial, FreeSans, sans-serif;
            font-size:12px;
            padding: 0 4px 0 4px;
        }
        input:focus {
            border:2px solid #5292F7;
            outline: none;
        }
        table{
            border-collapse: collapse;
            border: 0 !important;
            padding: 0 !important;
        }

    </style>
    @endpush

</div>

