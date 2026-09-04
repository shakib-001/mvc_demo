<?php

require_once __DIR__ . "/../app/controllers/StudentController.php";

$controller = new StudentController();

$action = $_GET["action"] ?? "index";

if ($action === "create") {

    $controller->create();

} elseif ($action === "store") {

    $controller->store();

} elseif ($action === "edit") {

    $controller->edit();

} elseif ($action === "update") {

    $controller->update();

} elseif ($action === "search") {

    $controller->search();

} elseif ($action === "delete") {

    $controller->delete();

} else {

    $controller->index();
}