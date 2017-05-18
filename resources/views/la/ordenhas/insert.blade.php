@extends("la.layouts.app")

@section("contentheader_title", "Ordenhas")
@section("contentheader_description", "Ordenhas listing")
@section("section", "Ordenhas")
@section("sub_section", "Listing")
@section("htmlheader_title", "Ordenhas Listing")


@section("headerElems")
    @la_access("Bovinos", "create")
    <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Lançar Lote</button>
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
                        <th>  {{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
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


    @la_access("Ordenhas", "create")
    <div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-admin" role="document">
            <div ng-app="appOrdenha" ng-controller="ordenhaController">
                <form ng-submit="lancaOrdenha()" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lancamento de Ordenhas</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead style="text-align: right;">
                                <tr><td>Animal:</td>
                                    <td>1 Ordenha:</td>
                                    <td>2 Ordenha:</td>
                                    <td>Total: </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="bov in bovinos">
                                    <td style="text-align: right;">@{{bov['1']}}</td>
                                    <td><input type="number" ng-change="atualizaTotal(bovinos[$index], $index)" ng-model="bovinos[$index][2]" ng-required class="form-control"></td>
                                    <td><input type="number" ng-change="atualizaTotal(bovinos[$index], $index)" ng-model="bovinos[$index][3]" ng-required class="form-control"></td>
                                    <td><input type="number" ng-model="bovinos[$index][4]" ng-readonly="true" class="form-control"></td>
                                </tr>
                                </tbody>
                            </table>
                            <h3 style="text-align: right;">Total : @{{bovinos['total']}}<br></h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" ng-click="lancaOrdenha()" data-dismiss="modal">Lancar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<style>
    .modal-admin {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        height: 500px;
    }
</style>

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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>



@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('la-assets/js/angularApp.js') }}"></script>
<script src="{{ asset('la-assets/js/controllers/OrdenhaCtrl.js') }}"></script>
<script src="{{ asset('la-assets/js/services/ordenhaService.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url(config('laraadmin.adminRoute') . '/ordenha_dt_ajax') }}",
            language: {
                lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search"
            },
            @if($show_actions)
            columnDefs: [ { orderable: false, targets: [-1] }],
            @endif
        });
        $("#ordenha-add-form").validate({

        });
    });
</script>
@endpush
Contact GitHub API Training Shop Blog About
© 2017 GitHub, Inc. Terms Privacy Security Status Help