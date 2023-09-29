<?php
    class Backend extends Controller {
        public function __construct(){
            parent::__construct();
            $this-> p = new Paginator();
         }
         function index(){
            $data = array();
            $data['page']="backend/pages/home";
            $this -> load -> view('backend/index',$data);
         }


         function catList($page){
            $cat = $this->model->getRecordByTrash('category',0);
            $n = count($cat);
            $config = array(
               'base_url' => URL . "index.php/backend/catlist/",
               'total_rows' => $n,
               'per_page' => 5,
               'cur_page' => $page
            );
            $this->p->init($config);
            $data = array();
            $data['category'] = $this->model->getData('category',$config['per_page'],$page);
            $data['trash'] = count($this->model->getRecordByTrash('category',1));
            $data['page']="backend/category/list";
            $data['pagination'] = $this->p->createLinks();
            $this -> load -> view('backend/index',$data);
         }

         function catAdd(){
            $data['category'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/category/add";
            $this -> load -> view('backend/index',$data);
         }

         function doCatAdd(){
            $this->model->mCatAdd();
            header("Location:". URL ."index.php/backend/catList/1");

         }

         function editCat($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('category', $id, 0);
            $data['category'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/category/edit";
            $this -> load -> view('backend/index',$data);
         }

         function doEditCat($id){
            $this->model->mEditCat($id);
            header("Location:". URL ."index.php/backend/catList/1");
         }


         function delTempCat($id){
            $this->model->del_restore('category', $id, 1);
            header("Location:". URL ."index.php/backend/catList/1");
         }


         function trashCatList(){
            $data = array();
            $data['trash'] = $this->model->getRecordByTrash('category',1);
            $data['allCat'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/category/trash";
            $this -> load -> view('backend/index',$data);
         }


         function restoreCat($id){
            $this->model->del_restore('category', $id, 0);
            header("Location:". URL ."index.php/backend/trashCatList/1");
         }


         function delCat($id){
            $this->model->del('category', $id, 0);
            header("Location:". URL ."index.php/backend/trashCatList/1");
         }

         function statusCat($id, $status){
            $this->model->status('category', $id, $status);
            header("Location:". URL ."index.php/backend/catList/1");
         }


         

// phần quản lý sản phẩm
      function proList($page){
         $pro = $this->model->getRecordByTrash('products',0);
         $n = count($pro);
         $config = array(
            'base_url' => URL . "index.php/backend/prolist/",
            'total_rows' => $n,
            'per_page' => 5,
            'cur_page' => $page
         );
         $this->p->init($config);
         $data = array();
         $data['allprd'] = $pro;
         $data['product'] = $this->model->getData('products',$config['per_page'],$page);
         $data['category'] = $this->model->getData('category',$config['per_page'],$page);
         $data['trash'] = count($this->model->getRecordByTrash('products',1));
         $data['page']="backend/product/list";
         $data['pagination'] = $this->p->createLinks();
         $this -> load -> view('backend/index',$data);
      }
      
      function prdAdd(){
            $data['category'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/product/add";
            $this -> load -> view('backend/index',$data);
         }


         function doPrdAdd(){
            $this->model->doPrdAdd();
            header("Location:". URL ."index.php/backend/proList/1");

         }


         function editPrd($id){
            $data = array();
            $data['product'] = $this->model->getOneRecordByTrash('products', $id, 0);
            $data['category'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/product/edit";
            $this -> load -> view('backend/index',$data);
         }



         function doEditprd($id){
            $this->model->doEditPrd($id);
            header("Location:". URL ."index.php/backend/proList/1");
         }


         function delTempPrd($id){
            $this->model->del_restore('products', $id, 1);
            header("Location:". URL ."index.php/backend/proList/1");
         }


         function trashprdList(){
            $data = array();
            $data['trash'] = $this->model->getRecordByTrash('products',1);
            $data['allprd'] = $this->model->getRecordByTrash('products',0);
            $data['category'] = $this->model->getRecordByTrash('category',0);
            $data['page']="backend/product/trash";
            $this -> load -> view('backend/index',$data);
         }

         function restorePrd($id){
            $this->model->del_restore('products', $id, 0);
            header("Location:". URL ."index.php/backend/trashprdList/1");
         }


         function delPrd($id){
            $this->model->del('products', $id, 0);
            header("Location:". URL ."index.php/backend/trashCatList/1");
         }




    }
?>