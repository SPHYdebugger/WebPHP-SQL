<?php

define("CONTROLLERS_FOLDER", "../app/Controllers/");
define("DEFAULT_CONTROLLER", "home");
define("DEFAULT_ACTION", "index");

// Obtenemos el controlador
$controller1 = DEFAULT_CONTROLLER;
if (!empty( $_GET["controller"]))
    $controller1 = $_GET["controller"];
//Obtenemos el action
$action = DEFAULT_ACTION;
if (!empty( $_GET["action"]))
    $action = $_GET["action"];
//formamos el controlador
$controller = CONTROLLERS_FOLDER . $controller1 . "_controller.php";


if ( is_file($controller))
    require_once ($controller);
else
    die ("El controlador no existe, 404 NOT FOUND");

if (is_callable($action))
    $action();
else
    die ("La acción no existe, 404 NOT FOUND");
