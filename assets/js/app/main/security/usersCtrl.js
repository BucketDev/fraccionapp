/**
 * Created by Rodrigo on 31/07/2016.
 */
angular.module('faAdmin')
.controller('UsersCtrl', function ($scope, $http, uiGridConstants)
    {
        //fetch users
        $scope.users = {
			enableHorizontalScrollbar: uiGridConstants.scrollbars.NEVER
        };

        $http.post("security/user").then(function (response) {
        	$scope.users.data = response.data;
        }, function (response) {
        	console.log('failure');
            console.log(response);
        });
    }
);