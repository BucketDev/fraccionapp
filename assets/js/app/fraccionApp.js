/**
 * Created by Rodrigo on 13/06/2016.
 */
"use strict";
angular.module('faLogin', [])
    .controller('LoginCtrl', function ($scope) {
        $scope.lbEmail = 'Correo';
        $scope.lbPassword = 'Contraseña';
        $scope.lbSignin = 'Ingresar';
        
        $scope.email = 'rloyolaj@gmail.com';
        $scope.password = 'robalon';
        $scope.salute = 'Hola Mundo';
    });

$("form").velocity({
    top: "50%",
    opacity: 1
}, {
    duration: 1000,
    easing: "easeInQuad"
});