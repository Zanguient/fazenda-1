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
        <iframe src="/admin/ordenhas2" width="80%" height="500"></iframe>
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

