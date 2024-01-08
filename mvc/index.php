
<?php
// index.php
session_start();

require_once 'controllers/controller.php';
require_once 'controllers/controller-book.php';
require_once 'controllers/controller-user.php';

// 简单的路由逻辑
$page = isset($_GET['page']) ? $_GET['page'] : 'welcome';

switch ($page) {
    case 'login':
        // 显示登录页面
        $controller = new UserController();
        $controller->view('login');
        break;
    
    case 'logout':
        // 登出并重定向到登录页面
        header('Location: views/logout.php');
        break;

    case 'dashboard':
        // 显示图书列表（需要用户登录）
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $bookController = new BookController();
        $bookController->showBooks();
        break;
    }
?>