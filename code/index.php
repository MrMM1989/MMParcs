<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 25/01/2016
 * Time: 19:51
 */
// laadt de composer autoloader
require __dir__ . '/vendor/autoload.php';
$appState = new \ModernWays\AnOrmApart\NoticeBoard();

//$session = new \ModernWays\Identity\Session($appState);
//$session->start();

$route = new \ModernWays\Mvc\Route($appState, 'Home-index');
$routeConfig = new \ModernWays\Mvc\RouteConfig('\MMProgramming\MMParcs', $route, $appState);
$view = $routeConfig->invokeActionMethod();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webshop</title>
</head>
<body>
    <?php call_user_func($view); ?>
</body>
</html>
