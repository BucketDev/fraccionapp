/**
 * Created by Rodrigo on 21/07/2016.
 */
angular.module('faAdmin', [
    'ngRoute'
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
        controller: 'AdminCtrl',
        templateUrl: 'assets/partials/adminView.html'
    });
})
.controller('AdminCtrl', function ($scope, $http)
    {
        $scope.signOut = function() {
            $http.post("admin/signOut").then(function () {
                location.assign(location.origin + location.pathname);
            }, function (response) {
                
            });
        }
    }
);