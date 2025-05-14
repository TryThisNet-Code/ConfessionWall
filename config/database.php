<?php
    class Database{
        private $db_host = 'localhost';
        private $db_user = 'root';
        private $db_pass = '';
        private $db_name = 'confessiondb';
        private $conn;

        public function connect(){
            if($this->conn){
                return $this->conn;
            }

            $this->conn = new mysqli($this->db_host,$this->db_user, $this->db_pass, $this->db_name);

            if($this->conn->connect_error){
                die("Connection Failed" . $this->conn->connect_error);
            }

            return $this->conn;
        }
    }
?>