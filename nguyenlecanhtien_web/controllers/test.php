<?php
    class Test  {
        public function __construct(){
        echo"Day la controller test";
         }
         function index(){
            echo "Day la phuong thuc index cua controllers test";
         }
         function test($a,$b,$c,$d){
            echo $a,$b,$c,$d;
         }
         function loadModel($name){
            $path = "models/". $name."_model.php";
            if(file_exists($path)){
                require $path;
                $modelName = $name."_Model";
                $model = new $modelName;
            }
            else{
                echo "Model khong ton tai";
            }
        }

    }


?>