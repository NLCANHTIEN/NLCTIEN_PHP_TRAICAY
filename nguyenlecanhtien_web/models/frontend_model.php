<?php
    class Frontend_Model extends Model {
         function __construct(){
            parent::__construct();
        echo"Day la  frontend model";
         }
         function testFrontendModel(){
            $a = array("Hello","Xin chao","Chao");
            return $a;
         }
         function getAllProducts(){
            $sql = "SELECT * FROM products WHERE status = 1 
                   ";
            $result = $this -> getQueryAll($sql);
            return $result;

         }


         function getNewProducts(){
            $sql = "SELECT * FROM products WHERE status = 1 
                  ORDER BY created_at DESC LIMIT 0,6";
            $result = $this -> getQueryAll($sql);
            return $result;

         }

         function getSaleProducts(){
            $sql = "SELECT * FROM products WHERE sale = 1 AND status = 1 
                  ORDER BY created_at DESC LIMIT 0,7";
            $result = $this -> getAll($sql);
            return $result;

         }

         function getOneProduct($id){
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $this -> getQueryOne($sql);
            return $result;

         }

         function getCategory(){
            $sql = "SELECT * FROM category WHERE status =1 AND trash =0";
            $result = $this -> getQueryAll($sql);
            return $result;

         }

         function getProductsByCatId($CatId){
            $sql = "SELECT * FROM products WHERE status =1 AND trash =0 AND product_category = $CatId";
            $result = $this -> getQueryAll($sql);
            return $result;

         }

         function doRegister(){
            $user = array(
               'name'=> $_POST['name'],
               'email'=> $_POST['email'],
               'phone'=> $_POST['phone'],
               'address'=> $_POST['address'],
               'password'=> sha1($_POST['psw']),
               'created_at'=> date("Y-m-d H:i:s")
            );
            $this-> addRecord("users", $user);
         }

         function doLogin(){
            $e = $_POST['email'];
            $p = $_POST['psw'];
            $sql = "SELECT * FROM users WHERE status = 1 AND email = '$e' AND password = '". sha1($p) ."' ";
            $result =  $this->getOne($sql);
            return $result;
         }

         function getCar(){
            $cart = array();
            $n = count($_SESSION['cart']);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            $_SESSION['amount'] = array_values($_SESSION['amount']);
            for($i=0 ; $i<$n ; $i++){
               $sql = "SELECT * FROM products WHERE id =" . $_SESSION['cart'][$i];
                $r = $this -> getQueryOne($sql);
                array_push($cart, $r);
            }
            return $cart;
         }



    }
 ?>        