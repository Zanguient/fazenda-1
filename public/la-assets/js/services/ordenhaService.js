angular.module('ordenhaService', [])
    .factory('Ordenha', function ($http) {
        return {
            get: function() {
                return $http.get('/admin/ordenha_dt_ajax_bovinos');
            },
            save : function(OrdenhaData) {
                return $http.post( '/admin/ordenhas', {
                    animal : OrdenhaData.animal,
                    ordenha1 : OrdenhaData.ordenha1,
                    ordenha2 : OrdenhaData.ordenha2,
                    total : OrdenhaData.total
                });
            }
        }
});
