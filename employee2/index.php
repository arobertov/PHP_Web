<?php
// Load DB
include "db_config.php";

// Load core classes
include "core/Model.php";
include "core/Controller.php";

// Load model classes - they extend Model.php
include "model/AddressesModel.php";
include "model/EmployeesModel.php";
include "model/ProjectsModel.php";
include "model/TownsModel.php";

// Load Controller class - it extends Controller.php
include "controller/MainController.php";
include "controller/EmployeeController.php";
$route_error = false;
$pattern = '/^[A-Za-z]*$/';
if(!empty($_GET['controller'])){
    if(preg_match($pattern,$_GET['controller']))
    $controller = $_GET['controller'];
    else $route_error = true;
} else {
    $controller = 'mainController';
}

if(!empty($_GET['action'])){
    if(preg_match($pattern,$_GET['action']))
        $action = $_GET['action'];
    else $route_error = true;
    $action = $_GET['action'];
} else {
    $action = 'main';
}

if ($route_error === false) {
    try {
        $c = new $controller($db);
        $c->$action();
    }catch (Exception $e){
        include "view/404.php";
    }
} else {
        include "view/404.php";
}

