<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Admin</title>
    <link rel="stylesheet" href="assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/css/bootstrap-additions.min.css">
    <link rel="stylesheet" href="assets/vendor/css/angular-motion.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body ng-app="faAdmin">

    <div ng-controller="MainCtrl">
        
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand">
                        <img src="assets/img/icons/fraccionapp30.png"/>
                    </a>
                    <ul class="nav navbar-nav">
                        <li>
                            <button ng-click="showModules()" type="button" class="btn btn-default navbar-btn">
                                <span class="module-icon main-menu"></span>Menu
                            </button>
                        </li>
                        <li>
                            <h3 class="navbar-text"><span class="module-icon30" ng-class="moduleIconClass"></span>{{moduleName}}</h3>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <button type="button" class="btn btn-danger navbar-btn" ng-click="signOut()">
                        <span class="module-icon main-logout"></span>Log Out
                        </button>
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
        echo '<script src="assets/vendor/js/angular-strap.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.tpl.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-animate.min.js"></script>';

        echo '<script src="assets/js/app/main/mainCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/usersCtrl.js"></script>';
    } else {
        echo '<script src="assets/vendor/js/angular.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-route.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-strap.tpl.min.js"></script>';
        echo '<script src="assets/vendor/js/angular-animate.min.js"></script>';
        
        echo '<script src="assets/js/app/main/mainCtrl.js"></script>';
        echo '<script src="assets/js/app/main/security/usersCtrl.js"></script>';
    }
    ?>
</body>
</html>