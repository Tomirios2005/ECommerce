<?php
require_once "app/controllers/articles.controller.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$action="listar";
if (!empty ($_GET["action"])) {
    $action=$_GET["action"];
}
$params=explode( "/", $action);
switch ($params[0]) {
    case 'listar':
        $controller=new ArticlesController;
        $controller->showArticles();
        break;
    
    
    default:
        # code...
        break;
}