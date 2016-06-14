<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FraccionApp Login</title>
</head>
<body ng-app="fraccionApp">

<div id="container" ng-controller="MainCtrl">
    <h1>{{salute}}</h1>

    <p>Bienvenido a FraccionApp.</p>
</div>

<script src="assets/vendor/angular.js"></script>
<script src="assets/js/app/fraccionApp.js"></script>
</body>
</html>