<?php
    class Category{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAll(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->db->getCon()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>