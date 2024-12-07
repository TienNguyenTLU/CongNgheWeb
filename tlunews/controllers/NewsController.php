<?php
    require_once 'models/News.php';
    class NewsController{
        private $newsModel;

        public function __construct(){
            $this->newsModel = new  News();
        }
        
        public function index() {
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?controller=admin&action=login'); 
                exit;
            }
            $news = $this->newsModel->getAll();  
            require_once 'views/admin/news/index.php';  
        }
    
        public function add() {
            require_once 'views/admin/news/add.php';
        }
    
        public function store() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_POST['image'];
                $category_id = $_POST['category_id']; 
                $created_at = $_POST['created_at'];
                $this->newsModel->add($title, $content, $image, $category_id, $created_at);
                header('Location: index.php?controller=admin&action=index');
                exit;
            }
        }
        
    
        public function edit($id) {
            $news = $this->newsModel->getByID($id);
            $categories = $this->newsModel->getCategories();
            require_once 'views/admin/news/edit.php';
        }
    
        public function update($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_POST['image']; 
                $category_id = $_POST['category_id']; 
                $created_at = $_POST['created_at'];
                $this->newsModel->update($id, $title, $content, $image, $category_id, $created_at);
                header('Location: index.php?controller=admin&action=index');
                exit;
            }
        }        
        
        public function delete($id) {
            $news = $this->newsModel->getByID($id);
            require_once 'views/admin/news/destroy.php'; 
        }

        public function destroy($id) {
            $this->newsModel->delete($id);
            header('Location: index.php?controller=admin&action=index');
        }
    }
?>