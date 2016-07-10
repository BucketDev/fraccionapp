<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Login</title>
</head>
<body ng-app="faLogin">

    <div id="container" ng-controller="LoginCtrl">
        <h1>{{salute}}</h1>

        <p>Bienvenido a FraccionApp.</p>
        <form action="home/signOut">
            <input type="submit" value="Logout">
        </form>
    </div>

    <script src="assets/vendor/js/angular.js"></script>
    <script src="assets/js/app/fraccionApp.js"></script>
    <?php
    if (ENVIRONMENT === 'development') {
        echo '<script src="assets/js/app/fraccionApp.js"></script>';
    } else {
        echo '<script src="assets/js/app/fraccionApp.js"></script>';
    }
    ?>
</body>
</html>