<?php
    require_once __DIR__ . '/../../config/database.php';

    class Confession{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function saveConfession($confession){
            $stmt = $this->conn->prepare("INSERT INTO confession_tbl(confessions) VALUES (?)");
            $stmt->bind_param("s", $confession);
            $stmt->execute();
            $stmt->close();
        }

        public function showAll(){
            $stmt = $this->conn->query("SELECT confessions, date FROM confession_tbl ORDER BY id DESC");
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }
    }
?>