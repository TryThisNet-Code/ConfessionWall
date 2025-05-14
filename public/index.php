<?php
    require_once __DIR__ . '/../src/controller/confessionController.php';

    $controller = new ConfessionController();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $controller->postConfession();
    }else{
        $controller->showWall();
    }
?>