<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Admin</title>
    <link rel="stylesheet" href="assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/css/angular-motion.min.css">
    <link rel="stylesheet" href="assets/vendor/css/bootstrap-additions.min.css">
    <link rel="stylesheet" href="assets/vendor/css/ui-grid.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body ng-app="faAdmin">

    <div ng-controller="AdminCtrl">
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <a class="navbar-brand" ng-click="showModules()">
                    <img src="assets/img/icons/fraccionapp30.png">
                </a>

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
        echo '<script src="assets/vendor/js/angular-animate.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-route.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.tpl.min.js"></script>';
        echo '<script src="assets/vendor/js/ui-grid.min.js"></script>';

        echo '<script src="assets/js/app/main/mainCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/usersCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/loginRequestsCtrl.js"></script>';
    } else {
        echo '<script src="assets/vendor/js/angular.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-animate.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-route.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.tpl.min.js"></script>';
        echo '<script src="assets/vendor/js/ui-grid.min.js"></script>';
        
        echo '<script src="assets/js/app/main/mainCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/usersCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/loginRequestsCtrl.js"></script>';
    }
    ?>
</body>
</html>