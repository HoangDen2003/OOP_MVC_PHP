<?php

// require_once("../OOP_MVC/app/config/config.php");
// require_once("../OOP_MVC/app/libs/ConnectDB.php");

require_once("../app/config/config.php");
require_once APP_ROOT . "/app/libs/ConnectDB.php";
// require_once APP_ROOT . "/app/controllers/HomeCtrl.php";

// $controller = isset($_GET["controller"]) ? $_GET["controller"] : "home";
$action = isset($_GET["action"]) ? $_GET["action"] : "home";
echo $action;

if ($action == "home") {
    require_once APP_ROOT . "/app/controllers/HomeCtrl.php";
    $homeCtrl = new HomeCtrl();
    $homeCtrl->index();
} else if ($action == "add") {
    echo "vào rồi";
    require_once APP_ROOT . "/app/controllers/HomeCtrl.php";
    $homeCtrl = new HomeCtrl();
    $homeCtrl->insert($_GET['name'], $_GET['gender']);
} else if ($action == "viewAdd") {
    require_once APP_ROOT . '/app/controllers/HomeCtrl.php';
    $homeCtrl = new HomeCtrl();
    $homeCtrl->viewAdd();
} else if ($action == "delete") {
    require_once APP_ROOT . '/app/controllers/HomeCtrl.php';
    $homeCtrl = new HomeCtrl();
    $homeCtrl->delete($_GET["id"]);
} else if ($action == "viewEdit") {
    require_once APP_ROOT . '/app/controllers/HomeCtrl.php';
    $homeCtrl = new HomeCtrl();
    $homeCtrl->viewEdit($_GET["id"]);
} else if ($action == "edit") {
    require_once APP_ROOT . '/app/controllers/HomeCtrl.php';
    $homeCtrl = new HomeCtrl();
    $homeCtrl->edit($_GET["id"], $_GET["name"], $_GET["gender"]);
} else {
    echo "Nothing";
}
