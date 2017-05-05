<!-- CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
<style>
    body 		{ padding-top:30px; }
    form 		{ padding-bottom:20px; }
    .comment 	{ padding-bottom:20px; }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>
<script src="/la-assets/js/angularApp.js"></script>
<script src="/la-assets/js/controllers/OrdenhaCtrl.js"></script>
<script src="/la-assets/js/services/ordenhaService.js"></script>




<div ng-app="appOrdenha" ng-controller="ordenhaController">
    <form ng-submit="lancaOrdenha()" method="post">
        <td>Total {{bovinos['total']}}<br><input type="submit" value="Lancar Ordenha" ></td>
        <table class="table">
            <tr ng-repeat="bov in bovinos">
                <td>{{bov['1']}} ID {{bov['0']}}</td>
                <td><input type="number" ng-change="atualizaTotal(bovinos[$index], $index)" ng-model="bovinos[$index][2]" ng-required class="form-control"></td>
                <td><input type="number" ng-change="atualizaTotal(bovinos[$index], $index)" ng-model="bovinos[$index][3]" ng-required class="form-control"></td>
                <td><input type="number" ng-model="bovinos[$index][4]" ng-readonly="true" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>

