<?php
    class Model{
        function __construct(){
            $this-> db = new Database();
            $this-> c = $this->db->conn;
        }

        function setQuery($sql){
             $result = $this->db->conn->query($sql);
             return $result;
       }

       function getAll($sql){
        $result = $this-> setQuery($sql);
        $a = array();
        while($row = $result-> fetch_assoc()){
            $a[] = $row; 
        }
        return $a;
       }

       function getOne($sql){
        $result = $this->setQuery($sql);
        if($result->num_rows ==1 ){
            $row = $result->fetch_assoc();
            return $row;
        }
       }




        function getQueryAll($sql){
            $result = $this -> setQuery($sql);
           if($result->num_rows > 0){
            $a = $result -> fetch_all(MYSQLI_ASSOC);
            return $a; 
            }
            return null;
        }

        function getQueryOne($sql){
            $result = $this -> setQuery($sql);
           if($result->num_rows == 1){
            $a = $result -> fetch_assoc();
            return $a; 
            }
            return null;
        }

        function addRecord($table, $params = array()){
            $txtKey="";
            $txtValue = "";
            $i =0;
            foreach($params as $key => $value){
                if($i < count($params)-1){
                    $txtKey.= $key . ",";
                    $txtValue.= "'". $value . "',";
                }
                else{
                    $txtKey.= $key ;
                    $txtValue.= "'". $value . "'";
                }
                $i++;
            }
            $sql = "INSERT INTO ". $table . "(". $txtKey .") VALUES (". $txtValue .")";
            echo $sql;
            $this->setQuery($sql) ;

        }
       

        function getData($table, $limit, $page){
            $sql = "SELECT * FROM $table WHERE trash = 0 LIMIT " . ($page-1)*$limit . "," . $limit;
            $result = $this-> getAll($sql);
            return $result;

        }

        function getRecordByTrash($table, $trash=0){
            $sql = "SELECT * FROM $table WHERE trash = $trash" ;
            $result = $this-> getAll($sql);
            return $result;

        }


        function getOneRecordByTrash($table, $id, $trash=0){
            $sql = "SELECT * FROM $table WHERE trash = $trash AND id = $id" ;
            $result = $this-> getOne($sql);
            return $result;
        }

        function editRecord($table, $id, $params = array()){
           $txtSet = "";
            $i =0;
            foreach($params as $key => $value){
                if($i < count($params)-1){
                    
                    $txtSet.= "$key = '$value', ";
                }
                else{
                    $txtSet.= "$key = '$value' ";
                }
                $i++;
            }
            $sql = "UPDATE ". $table . " SET " . $txtSet . "WHERE id = $id";
            echo $sql;
            $this->setQuery($sql) ;

        }


        function del_restore($table, $id, $trash){
            $sql="UPDATE $table SET trash= $trash WHERE id= $id";
            $this->setQuery($sql) ;
        }


        function del($table, $id){
            $sql="DELETE FROM $table  WHERE id= $id";
            $this->setQuery($sql) ;
        }



        function status($table, $id, $status ){
            $sql="UPDATE $table SET status= $status WHERE id= $id";
            $this->setQuery($sql) ;
        }


    }
?>