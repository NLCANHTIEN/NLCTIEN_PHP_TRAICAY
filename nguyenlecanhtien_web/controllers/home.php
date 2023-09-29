<?php
class Home extends Controller{
    function __construct(){
        parent::__construct();
        echo"This is home model";
    }

    function index(){
        $this->model = new Home_Model;
        $this->load->view("shop/index");
    }
}
?>