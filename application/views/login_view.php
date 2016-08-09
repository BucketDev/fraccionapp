<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Login</title>
    <link rel="stylesheet" href="assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body ng-app="faLogin">

    <div ng-controller="LoginCtrl">
        <form class="login-container">
            <div class="brand-img">
                <img src="assets/img/icons/fraccionapp100.png" class="img-thumbnail">
            </div>
            <div class="form-group" ng-class="userError">
                <label for="email">{{lbEmail}}</label>
                <input class="form-control" type="email" name="email" ng-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">{{lbPassword}}</label>
                <input class="form-control" type="password" name="password" ng-model="password" required>
            </div>
            <button class="btn btn-default" type="submit" ng-click="signin()">{{lbSignin}}</button>
        </form>
    </div>
    <script src="assets/vendor/js/angular.min.js"></script>
    <script src="assets/vendor/js/jquery.min.js"></script>
    <script src="assets/vendor/js/velocity.min.js"></script>
    <?php
    if (ENVIRONMENT === 'development') {
        echo '<script src="assets/js/app/login.js"></script>';
    } else {
        echo '<script src="assets/js/app/login.js"></script>';
    }
    ?>

</body>
</html>