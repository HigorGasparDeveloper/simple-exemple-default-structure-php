<?php 
    require ("vendor/autoload.php");
    require ("app/core/config.php");
    require ("functions/functions.php");
    use app\core\RouterCore;
    $uri = $_GET['url'] ?? "produto";
    $app = new RouterCore($uri,$_SERVER['REQUEST_METHOD']);
    require("Router.php");
    $app->run();