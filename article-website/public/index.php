<?php
require_once '../app/config/config.php';
require_once APP_ROOT.'/app/libs/DBConnection.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'article'; 
$action =  isset($_GET['action']) ? $_GET['action'] : 'index';

 // Kiểm tra sự tồn tại của tệp controller
 $controller = ucfirst($controller);
 $controller .= 'Controller';
 $controllerPath = APP_ROOT . '/app/controllers/' . $controller . '.php';
 
 //Nếu không tồn tại TỆP
 if(!file_exists($controllerPath)){
     die('Tệp tin không tồn tại');
 }
 //Nếu có tồn tại tệp Controller
 require($controllerPath);

 $myObj = new $controller();
 $myObj->$action();
?>




