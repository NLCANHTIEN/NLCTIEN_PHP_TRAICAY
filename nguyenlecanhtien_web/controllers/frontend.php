<?php
    class Frontend extends Controller {
        public function __construct(){
            parent::__construct();
        echo"Day la controller frontend";
         }
         function index(){
            $this -> model = new Frontend_Model;
            $data = array();
            $data['category'] = $this -> model -> getCategory();
            $data['all_products'] = $this -> model -> getAllProducts();
            $data['new_products'] = $this -> model -> getNewProducts();
            $data['sale_products'] = $this -> model->getSaleProducts();
            
           $this -> load -> view('frontend/index', $data);
           echo "Day la phuong thuc index";
         }
         function greeting($name,$age){
            echo "Xin chao" . $name."Tuoi:".$age;
         }
         function getFrontendModel(){
            $data['list'] = $this->model->testFrontendModel();
            print_r($data['list']);
         }

         function detail($id){
            $data = array();
            $data['category'] = $this -> model -> getCategory();
            $data['detail'] = $this -> model->getOneProduct($id);
            $this -> load -> view('frontend/detail', $data);
         }

         function listProducts($catid){
            $data['category'] = $this -> model -> getCategory();
            $data['products'] = $this -> model -> getProductsByCatId($catid);
            
            $this -> load -> view('frontend/listproduct', $data);

         }
         
         function register(){
            $data = array();
            $data['category'] = $this -> model -> getCategory();
            $this -> load -> view('frontend/register', $data);

         }

         function doRegister(){
            $this -> model ->doRegister();
            header("Location:". URL ."index.php/frontend");
         }


         function login(){
            $data = array();
            $data['category'] = $this -> model -> getCategory();
            $this -> load -> view('frontend/login', $data);
         }

         function doLogin(){
           $user =  $this -> model ->doLogin();
           if($user != NULL){
            $_SESSION['user'] = $user['name'];
            header("Location:". URL ."index.php");
           }
            else{
               header("Location:". URL ."index.php/frontend/login");
            }
           
         }


         function logout(){
            unset($_SESSION['user']);
            header("Location:". URL ."index.php/frontend");
         }

         // gio hang

         function addToCar($id){
            if(!isset($_SESSION['cart'])){
               $_SESSION['cart'] = array();
               $_SESSION['amount'] = array();
               $_SESSION['number_of_item'] = 0;
            }
            else{
               $k = array_search($id, $_SESSION['cart']);
               if($k === false){
                  array_push($_SESSION['cart'], $id);
                  array_push($_SESSION['amount'], 1);
                  $_SESSION['number_of_item']++;
               }
               else{
                  $_SESSION['amount'] [$k]++;
               }
              
            
            }
            header("Location:". URL ."index.php/frontend");
         } 
         
         
         
         function giohang(){
            $data['category'] = $this -> model -> getCategory();
            //$data['products'] = $this -> model -> getProductsByCatId($catid);
            $data['cart'] = $this -> model -> getCar();
            $this -> load -> view('frontend/giohang', $data);

         }


         }
        

    


?>