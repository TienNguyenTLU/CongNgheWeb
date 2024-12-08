<?php
    require_once 'models/Database.php';
    class News{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAll() {
            $sql = "SELECT news.*, categories.name AS category_name 
                    FROM news 
                    JOIN categories ON news.category_id = categories.id
                    ORDER BY news.created_at DESC";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getNewsWithPagination($offset, $limit) {
            $sql = "SELECT news.*, categories.name AS category_name 
                    FROM news 
                    JOIN categories ON news.category_id = categories.id
                    ORDER BY news.created_at DESC 
                    LIMIT :offset, :limit";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getTotalNews() {
            $sql = "SELECT COUNT(*) FROM news";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        }        

        public function getCategories() {
            $sql = "SELECT * FROM categories";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }        

        public function getByID($id) {
            $sql = "SELECT n.*, c.name AS category_name FROM news n
                    JOIN categories c ON n.category_id = c.id
                    WHERE n.id = :id";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        

        public function add($title, $content, $image, $category_id, $created_at) {
            $sql = "INSERT INTO news (title, content, image, created_at, category_id) 
                    VALUES (:title, :content, :image, :created_at, :category_id)";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        
        

        public function update($id, $title, $content, $image, $category_id, $created_at) {
            $query = "UPDATE news 
                      SET title = :title, content = :content, image = :image, category_id = :category_id, created_at = :created_at
                      WHERE id = :id";
            $stmt = $this->db->getCon()->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $created_at);
            return $stmt->execute();
        }
        
        public function delete($id) {
            $query = "DELETE FROM news WHERE id = :id";
            $stmt = $this->db->getCon()->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        public function search($keyword) {
            $query = "SELECT * FROM news WHERE title LIKE :keyword";
            $stmt = $this->db->getCon()->prepare($query);
            $stmt->bindParam(':keyword', $keyword);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>