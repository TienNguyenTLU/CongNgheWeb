<?php
    require_once 'models/News.php';
    require_once 'model/User.php';
    class HomeController {
        private $newsModel;
        private $userModel;
        public function __construct() {
            $this->newsModel = new News();
            $this->userModel = new User();
        }

        public function index() {
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?controller=admin&action=login');
                exit;
            }
        
            $news = $this->newsModel->getAll(); 
            require_once 'views/admin/news/index.php';  
        }
    }
?>
