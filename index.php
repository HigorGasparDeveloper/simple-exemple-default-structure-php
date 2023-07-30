<?php 
    require ("vendor/autoload.php");
    require ("app/core/config.php");
    require ("functions/functions.php");
    use app\core\RouterCore;
    $uri = $_GET['url'] ?? "produto";
    $app = new RouterCore($uri,$_SERVER['REQUEST_METHOD']);
    require("Router.php");
    // Permite acesso a partir de qualquer origem
    header('Access-Control-Allow-Origin: *');
    // Permite que a requisição inclua credenciais (por exemplo, cookies ou cabeçalhos de autenticação)
    header('Access-Control-Allow-Credentials: true');
    // Permite que a requisição inclua cabeçalhos personalizados
    header('Access-Control-Allow-Headers: Content-Type');
    // Permite que a requisição utilize os métodos GET, POST, etc.
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    $app->run();