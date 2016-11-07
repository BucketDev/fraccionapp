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
        templateUrl: function(params) {
            return 'assets/partials/' + params.module + '/' + params.controller + 'View.html';
        },
        controller: function($scope, $routeParams, $controller) {
            $controller($routeParams.controller.capitalize() + "Ctrl", {$scope:$scope});
        },
        resolve: {
            check: function(adminModulesSrv, $route, $location){   //function to be resolved, accessFac and $location Injected
                if(adminModulesSrv.validate($route.current.params.controller)){    //check if the user has permission -- This happens before the page loads                    
                } else {
                    $location.path('/');                //redirect user to home if it does not have permission.
                }
            }
        }
    })
    .otherwise({
        controller: 'DefaultCtrl',
        templateUrl: 'assets/partials/admin/adminView.html'
    });
})
.controller('MainCtrl', function ($rootScope, $scope, $http, $aside, adminModulesSrv)
    {
        $scope.signOut = function() {
            $http.post("admin/signOut").then(function () {
                location.assign(location.origin + location.pathname);
            }, function (response) {
                
            });
        }
        
        $rootScope.$on('updateTitle', function(event, data) {
            $scope.moduleName = data.title;
            $scope.moduleIconClass = data.iconClass;
        });
        
        $scope.showModules = function () {
            var asideOptions = {
                controller: 'MainCtrl',
                scope: $scope,
                title: 'Modules',
                placement: 'left',
                backdrop: 'static',
                animation: 'am-fade-and-slide-left',
                show: true,
                templateUrl: 'assets/partials/admin/modules.tpl.html'
            };

            if(adminModulesSrv.hasModues()){
                $scope.modules = adminModulesSrv.get();
                $aside(asideOptions);
            } else {
                adminModulesSrv.obtain().then(
                    function successCallback(response) {
                        $scope.modules = response.data;
                        adminModulesSrv.set($scope.modules);
                        $aside(asideOptions);
                    }, function errorCallback(response) {
                        console.log('error');
                    }
                );
            }
            
        };
        
    }
)
.controller('DefaultCtrl', function ($scope) {
        
})
.service('adminModulesSrv', function($http, $rootScope){
    var modules;
    return {
        hasModues: function() {
            return modules !== undefined;
        },
        get: function() {
            return modules;
        },
        set: function(_modules) {
            modules = _modules;
        },
        obtain: function(idModule) {
            return $http.post("admin/getModules");
        },
        updateTitle: function(data) {
            $rootScope.$emit('updateTitle', {
                title: data.title,
                iconClass: data.iconClass
            });
        },
        validate: function(controller) {
            if(this.hasModues()){
                var moduleFound = modules.find(function(module) {
                    return module.controller === controller;
                });
                return moduleFound !== undefined;
            }
            return false;
        }
    };
});