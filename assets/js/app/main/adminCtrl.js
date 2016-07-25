/**
 * Created by Rodrigo on 21/07/2016.
 */
"use strict";
angular.module('faAdmin', [])
.controller('AdminCtrl', function ($scope, $http)
    {
        $scope.signOut = function() {
            $http.post("admin/signOut").then(function () {
                location.reload();
            }, function (response) {
                
            });
        }
    }
);