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
    <title><?php echo $route->getEntity().'-'.$route->getAction(); ?> | MMParcs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/site.css" />
    </head>
<body>
    <?php call_user_func($view); ?>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
