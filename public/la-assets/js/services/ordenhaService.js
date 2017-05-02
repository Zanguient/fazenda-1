angular.module('ordenhaService', [])
    .factory('Ordenha', function ($http) {
        return {
            get: function(){
                return $http.get('/admin/ordenha_dt_ajax_bovinos');
            },
            save: function () {

            }




        }



    });
