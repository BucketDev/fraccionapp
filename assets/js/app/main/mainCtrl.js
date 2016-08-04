/**
 * Created by Rodrigo on 21/07/2016.
 */
angular.module('faAdmin', [
    'ngAnimate',
    'ngRoute',
    'mgcrea.ngStrap.modal',
    'mgcrea.ngStrap.aside'
    ])
.config(function($routeProvider) {
    
    String.prototype.capitalize = function() {
        return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
    };

    $routeProvider
    .when("/:module/:controller", {
        templateUrl:function(params) {
            return 'assets/partials/' + params.module + '/' + params.controller + 'View.html';
        },
        controller: function($scope, $routeParams, $controller) {
            $controller($routeParams.controller.capitalize() + "Ctrl", {$scope:$scope});
        }
    })
    .otherwise({
        controller: 'MainCtrl',
        templateUrl: 'assets/partials/admin/adminView.html'
    });
})
.controller('AdminCtrl', function ($scope, $http, $aside, adminModulesSrv)
    {
        $scope.signOut = function() {
            $http.post("admin/signOut").then(function () {
                location.assign(location.origin + location.pathname);
            }, function (response) {
                
            });
        }
        
        $scope.getModules = function (argument) {
            $scope.modules = [];
            adminModulesSrv.getModules().then(
                function successCallback(response) {
                    $scope.modules = response.data;
                    $aside({
                        controller: 'AdminCtrl',
                        scope: $scope,
                        title: 'Modules',
                        placement: 'left',
                        backdrop: 'static',
                        animation: 'am-fade-and-slide-left',
                        show: true,
                        templateUrl: 'assets/partials/admin/modules.tpl.html'
                    });
                }, function errorCallback(response) {
                    console.log('error');
                }
            );
        };
        
    }
)
.controller('MainCtrl', function ($scope) {
        
})
.service('adminModulesSrv', function($http){
    return {
        getModules: function(idModule) {
            return $http.post("admin/getModules");
        }
    };
});