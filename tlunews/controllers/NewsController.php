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
        
            $totalNews = $this->newsModel->getTotalNews();
            $limit = 4; 
            $totalPages = ceil($totalNews / $limit);
        
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $currentPage = max(1, min($currentPage, $totalPages));
        
            $offset = ($currentPage - 1) * $limit;
            $news = $this->newsModel->getNewsWithPagination($offset, $limit);
        
            require_once 'views/admin/news/index.php';  
        }
        
        
    
        public function add() {
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?controller=admin&action=login');
                exit;
            }
            $categories = $this->newsModel->getCategories(); 
            require_once 'views/admin/news/add.php'; 
        }
        
    
        public function store() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $image = $_FILES['image'];
                $category_id = $_POST['category_id'];
                $created_at = $_POST['created_at'];

                // validate
                if (empty($title)) {
                    $errors['title'] = 'Tiêu đề không được để trống!';
                }

                if (empty($content)) {
                    $errors['content'] = 'Nội dung không được để trống!';
                }
        
                if (empty($image['name'])) {
                    $errors['image'] = 'Hình ảnh không được để trống!';
                } else {
                    $imageType = pathinfo($image['name'], PATHINFO_EXTENSION);
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!in_array(strtolower($imageType), $allowedTypes)) {
                        $errors['image'] = 'Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF';
                    }
                }
        
                if (empty($category_id)) {
                    $errors['category_id'] = 'Danh mục không được để trống!';
                }

                if (empty($created_at)) {
                    $errors['created_at'] = 'Ngày tạo không được để trống!';
                }
        
                if (empty($errors)) {
                    $targetDir = 'images/';
                    $imageName = basename($image['name']);
                    $targetFilePath = $targetDir . $imageName;
        
                    if (move_uploaded_file($image['tmp_name'], $targetFilePath)) {
                        $this->newsModel->add($title, $content, $imageName, $category_id, $created_at);
                        $_SESSION['message'] = 'News add successfully!';
                        header('Location: index.php?controller=news&action=index');
                        exit;
                    } else {
                        $errors['image'] = 'Lỗi khi tải lên hình ảnh!';
                    }
                }
        
                $categories = $this->newsModel->getCategories();
                require_once 'views/admin/news/add.php';
            }
        }
        
        
        
    
        public function edit($id) {
            $news = $this->newsModel->getByID($id);
            $categories = $this->newsModel->getCategories();
            require_once 'views/admin/news/edit.php';
        }
    
        public function update($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
        
                $existingNews = $this->newsModel->getByID($id);
                $image = $existingNews['image'];
        
                // Validate
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                
                if (empty($title)) {
                    $errors['title'] = 'Tiêu đề không được để trống!';
                }
        
                if (empty($content)) {
                    $errors['content'] = 'Nội dung không được để trống!';
                }
        
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $imageFile = $_FILES['image'];
                    $imageType = pathinfo($imageFile['name'], PATHINFO_EXTENSION);
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        
                    if (!in_array(strtolower($imageType), $allowedTypes)) {
                        $errors['image'] = 'Chỉ chấp nhận các định dạng hình ảnh: JPG, JPEG, PNG, GIF';
                    } else {
                        $targetDir = 'images/';
                        $image = basename($imageFile['name']);
                        $targetFilePath = $targetDir . $image;
                        if (!move_uploaded_file($imageFile['tmp_name'], $targetFilePath)) {
                            $errors['image'] = 'Lỗi khi tải lên hình ảnh!';
                        }
                    }
                }

                $category_id = $_POST['category_id'];
                if (empty($category_id)) {
                    $errors['category_id'] = 'Danh mục không được để trống!';
                }
        
                $created_at = $_POST['created_at'];
                if (empty($created_at)) {
                    $errors['created_at'] = 'Ngày tạo không được để trống!';
                }
        
                if (empty($errors)) {
                    $this->newsModel->update($id, $title, $content, $image, $category_id, $created_at);
                    $_SESSION['message'] = 'News updated successfully!';
                    header('Location: index.php?controller=news&action=index');
                    exit;
                }
        
                $categories = $this->newsModel->getCategories();
                require_once 'views/admin/news/edit.php';
            }
        } 
        
        public function delete($id) {
            $news = $this->newsModel->getByID($id);
            require_once 'views/admin/news/destroy.php'; 
        }

        public function destroy($id) {
            $this->newsModel->delete($id);
            $_SESSION['message'] = 'Deleted successfully!';
            header('Location: index.php?controller=admin&action=index');
        }

        public function detail($id) {
            $news = $this->newsModel->getByID($id);
        
            if ($news) {
                require_once 'views/news/detail.php';
            } else {
                $_SESSION['message'] = 'News not found!';
                header('Location: index.php?controller=news&action=index');
                exit;
            }
        }
        
    }
?>