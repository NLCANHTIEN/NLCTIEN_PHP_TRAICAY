<?php
class Database{
    function __construct(){
        // Tạo kết nối
        $this -> conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // kiem tra ket noi
        if($this->conn->connect_error){
            die("Connection failed:".$this->conn->connect_error);
        }
        
    }
}
    
?>