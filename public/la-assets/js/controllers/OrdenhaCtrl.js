/**
 * Created by emmanuell on 02/05/17.
 */

// public/js/controllers/mainCtrl.js

angular.module('appOrdenha', ['ordenhaService'])
// inject the Comment service into our controller
    .controller('ordenhaController', function($scope, $http, Ordenha, $interpolateProvider) {
        // object to hold all the data for the new comment form
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
        Ordenha.get()
            .success(function(data) {
                $scope.bois = data.data;
                console.log($scope.bois);
            });


        $scope.commentData = {};
        console.log("teste!");
    });