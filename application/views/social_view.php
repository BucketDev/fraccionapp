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
        <h1>Social</h1>

        <p>Bienvenido a FraccionApp Social.</p>
        <form action="admin/signOut">
            <input type="submit" value="Logout">
        </form>
    </div>

    <script src="assets/vendor/js/angular.js"></script>
    <?php
    if (ENVIRONMENT === 'development') {
        echo '<script src="assets/js/app/fraccionApp.js"></script>';
    } else {
        echo '<script src="assets/js/app/fraccionApp.js"></script>';
    }
    ?>
</body>
</html>