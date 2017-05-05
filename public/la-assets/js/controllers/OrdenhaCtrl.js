/**
 * Created by emmanuell on 02/05/17.
 */
// public/js/controllers/mainCtrl.js
angular.module('appOrdenha', ['ordenhaService'])
// inject the Comment service into our controller
    .controller('ordenhaController', function($scope, $http, Ordenha) {
        // object to hold all the data for the new comment form
        Ordenha.get()
            .success(function(data) {
                $scope.bovinos = data.data;
                $scope.bovinos['total'] = 0;
                var i = 0, tam = $scope.bovinos.length;
            });
        $scope.lancaOrdenha = function () {
            console.log("chamou a funcao!");
            console.log($scope.bovinos[0]);
            var i = 0;
            var tam = $scope.bovinos.length;
            for(; i < tam; i++) {
                var ordenha = {
                    "animal": $scope.bovinos[i][0],
                    "ordenha1": $scope.bovinos[i][2],
                    "ordenha2": $scope.bovinos[i][3],
                    "total": $scope.bovinos[i][4]
                };
                console.log(JSON.stringify(ordenha));
                if((ordenha.ordenha1 != null) && (ordenha.ordenha2 != null)) {
                    Ordenha.save(ordenha).success(function (data) {
                        window.location.replace("/admin/ordenhas");
                    }).error(function (data) {
                    });
                }
            }
        };
        $scope.atualizaTotal= function(ordenha, index) {
            // limpa o total naquele indice para atualizar
            if (ordenha[3] == null) {
                ordenha[4] = ordenha[2];
            } else if (ordenha[4] == null) {
                ordenha[4] = ordenha[3];
            } else {
                ordenha[4] = ordenha[2] + ordenha[3];
            }
            var i = 0;
            $scope.bovinos['total'] = 0;
            var tam = $scope.bovinos.length;
            for(; i < tam ; i++) {
                if ($scope.bovinos[i][4]) {
                    $scope.bovinos['total'] += $scope.bovinos[i][4];
                }
            }

            return ordenha;
        };


    });




