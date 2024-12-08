<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'admin';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'admin':
        require_once 'controllers/AdminController.php';  
        $adminController = new AdminController();
        if (method_exists($adminController, $action)) {
            $adminController->$action();
        } else {
            echo "Action $action không tồn tại.";
        }
        break;

    case 'news':
        require_once 'controllers/NewsController.php';
        $newsController = new NewsController();
        if (method_exists($newsController, $action)) {
            if (isset($_GET['id'])) {
                $newsController->$action($_GET['id']);
            } else {
                $newsController->$action();
            }
        } else {
            echo "Action $action không tồn tại.";
        }
        break;

    default:
        echo "Controller $controller không tồn tại.";
        break;
}
?>
