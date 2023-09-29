<?php
    class Backend_Model extends Model {
         function __construct(){
            parent::__construct();
        
         }

         function mCatAdd(){
            $cat = array(
                'category_name' => $_POST['cat_name'],
                'parent' => $_POST['parent'],
                'status' => $_POST['status']
            );
            $this->addRecord('category', $cat);
         }


         function mEditCat($id){
            $cat = array(
                'category_name' => $_POST['cat_name'],
                'parent' => $_POST['parent'],
                'status' => $_POST['status']
            );
            $this->editRecord('category', $id, $cat);
         }



         function doPrdAdd(){
            $i = "temp.png";
            if($_FILES['image']['size']==0){
                echo $_FILES['image']['error'];
            }
            else{
                $file = $_FILES['image'];
                $i = $file['name'];
                $u = new Upload();
                $u -> doUpload($file);
            }
            $prd = array(
                'product_name' => $_POST['prd_name'],
                'price' => $_POST['price'],
                'product_detail' => $_POST['detail'],
                'product_category' => $_POST['category'],
                'image' => $i,
                'price' => $_POST['price'],
                'status' => $_POST['status'],
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->addRecord('products', $prd);
         }



         function doEditPrd ($id){
           $prd = array(
                'product_name' => $_POST['prd_name'],
                'price' => $_POST['price'],
                'product_detail' => $_POST['detail'],
                'product_category' => $_POST['category'],
                'price' => $_POST['price'],
                'status' => $_POST['status'],
                'created_at' => date("Y-m-d H:i:s")
            );
            if($_FILES['image']['size']!=0){
                $file = $_FILES['image'];
                $i = $file['name'];
                $prd['image'] = $i;
                $u = new Upload();
                $u -> doUpload($file);
            }
            
            $this->editRecord('products', $id, $prd );
         }
    }
?>