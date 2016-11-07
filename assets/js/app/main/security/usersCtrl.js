/**
 * Created by Rodrigo on 31/07/2016.
 */
 angular.module('faAdmin')
 .controller('UsersCtrl', function ($scope, $http, usersSrv, adminModulesSrv)
 {
    adminModulesSrv.updateTitle({
        title: 'Users',
        iconClass: 'security-users'
    });

    if(usersSrv.get() !== undefined){
        $scope.users = usersSrv.get();
    } else {
        usersSrv.obtain().then(
            function successCallback(response) {
                usersSrv.set(response.data);
                $scope.users = usersSrv.get();
            }, function errorCallback(response) {
                console.log('error');
            }
        )
    }
})
 .service('usersSrv', function($http){
    var users;
    return {
        get: function() {
            return users;
        },
        set: function(_users) {
            users = _users;
        },
        obtain: function() {
            return $http.post("security/user");
        }
    };
});