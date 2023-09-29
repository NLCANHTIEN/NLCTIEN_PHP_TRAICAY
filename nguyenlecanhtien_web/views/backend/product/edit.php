<?php
$p = $data['product'];
?>

<form action="<?= URL?>index.php/backend/doEditprd/<?= $p['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Product_name</label>
    <div class="col-sm-10">
        <input name="prd_name" type="text" class="form-control"   placeholder="Nhập tên sản phẩm " value="<?= $p['product_name']?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
        <input name="price" type="text" class="form-control"  value="<?= $p['price']?>" >
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Detail</label>
    <div class="col-sm-10">
        <textarea name="detail" id="editor" ><?= $p['product_detail']?></textarea>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error =>{
                    console.error(error);
                });
        </script>
    </div>
  </div>
  

  <div class="form-group">
    <label class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
        <select class="form-control" name="category">
            <?php
                foreach ($data['category'] as $value){
                    if($p['product_category'] == $value['id']){
                        echo "<option selected value = '" .$value['id']."'>".$value['category_name']."</option>";
                    }
                    else{
                        echo "<option  value = '" .$value['id']."'>".$value['category_name']."</option>";
                    }
                    
                }
            ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">Image</label>
    <div class="col-sm-2">
        <img src="<?= URL?>assets/img/<?= $p['image']?>" alt=""  />
        </div>
    <div class="col-sm-10">
        <input name="image" type="file" class="form-control"  value="<?= $p['image']?>" >
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <select class="form-control" name="status">
            <?php
            if($p['status'] == 1){
                echo "<option value='1' selected>Hiển thị</option>
                      <option value='0'>Ẩn</option>";
            }
            else{
                echo "<option value='1'>Hiển thị</option>
                      <option value='0' selected>Ẩn</option>";
            }
            ?>
            
        </select>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
  </div>
</div>
</form>