<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Admin</title>
    <link rel="stylesheet" href="assets/vendor/css/bootstrap.min.css">
</head>
<body ng-app="faAdmin">

    <div ng-controller="AdminCtrl">
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="assets/img/icons/fraccionapp30.png">
                </a>

                <ul class="nav navbar-nav">
                    <?php echo '<li>' . anchor('admin#/security/users', 'Users'); '</li>' ?>
                    <?php echo '<li>' . anchor('admin#/security/loginRequests', 'Login Requests'); '</li>' ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="btn btn-danger navbar-btn" ng-click="signOut()">Log Out</button>
                </ul>
            </div>
        </nav>
    
        <div class="container-fluid">
             <ng-view></ng-view>
        </div>

    </div>

    <?php
    if (ENVIRONMENT === 'development') {
        echo '<script src="assets/vendor/js/angular.js"></script>';
        echo '<script src="assets/vendor/js/angular-route.js"></script>';
        echo '<script src="assets/js/app/main/adminCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/usersCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/loginRequestsCtrl.js"></script>';
    } else {
        echo '<script src="assets/vendor/js/angular.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-route.min.js"></script>';
        echo '<script src="assets/js/app/main/adminCtrl.js"></script>';
    }
    ?>
</body>
</html>