(function () {
    var app = angular.module("myApp", []);

    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('{-');
        $interpolateProvider.endSymbol('-}');
    });

    app.factory(
        "generalfactory",
        function ($http, $compile, $timeout, $sce, $q) {
            class generalfactory {
                constructor() { }
            }
            generalfactory.provider = {};
            generalfactory.showProvider = false;
            generalfactory.test = "prueba variable angular";

            generalfactory.GetRoute = function (route, params) {
                return $http.post('/' + route, params);
            }

            generalfactory.providerList = function (product) {
                if (product.quantity != 0) {
                    generalfactory.showProvider = false;
                    generalfactory.provider = {};
                } else {
                    generalfactory.showProvider = true;
                    generalfactory.provider.name = product.name;
                    generalfactory.provider.list = product.product_vendors;
                }
            }



            return generalfactory;
        }
    );

    app.controller(
        "generalController",
        function ($scope, $http, $timeout, $filter, generalfactory) {

            $scope.generalfactory = generalfactory;
            $scope.openProductsModal = function (products) {
                generalfactory.products = products;
                $('#product_detail').modal('show');
            }
            $scope.openDatePicker = function (id) {
                $('#' + id).datetimepicker();
            }
            generalfactory.filters = {};
            $scope.getOrders = function () {
                $('#datetimepicker3').datetimepicker();
                $('#datetimepicker4').datetimepicker();
                $scope.allOrders = {};
                generalfactory.filters.minDate = ($("#minDate").val());
                generalfactory.filters.maxDate = ($("#maxDate").val());
                generalfactory.GetRoute('getOrders', generalfactory.filters).then(function (response, status, headers, config) {
                    $scope.allOrders = response.data;

                });
            }
        }
    );
})();
