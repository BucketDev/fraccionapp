/**
 * Created by Rodrigo on 13/06/2016.
 */
"use strict";
angular.module('faLogin', [])
    .controller('LoginCtrl', function ($scope, $http) {
        $scope.lbEmail = 'Correo';
        $scope.lbPassword = 'Contraseña';
        $scope.lbSignin = 'Ingresar';
        
        $scope.email = 'rloyolaj@gmail.com';
        $scope.password = 'robalon';
        
        $scope.signin = function () {
            
            var data = {
                email: $scope.email,
                password: $scope.password
            };
            $http.post("login/signIn", data).then(function (response) {
                location.reload();
            }, function (response) {
                console.log('error');
                console.log(response);
            });
        }
    });

$("form").velocity({
    top: "50%",
    opacity: 1
}, {
    duration: 1000,
    easing: "easeInQuad"
});