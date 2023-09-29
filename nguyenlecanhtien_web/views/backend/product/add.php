<form action="<?= URL?>index.php/backend/doPrdAdd" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Product_name</label>
    <div class="col-sm-10">
        <input name="prd_name" type="text" class="form-control"   placeholder="Nhập tên sản phẩm ">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
        <input name="price" type="text" class="form-control"   >
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Detail</label>
    <div class="col-sm-10">
        <textarea name="detail" id="editor"></textarea>
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
                    echo "<option value = '" .$value['id']."'>".$value['category_name']."</option>";
                }
            ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
        <input name="image" type="file" class="form-control"   >
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        <select class="form-control" name="status">
            <option>1</option>
            <option>0</option>
        </select>
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Thêm</button>
  </div>
</div>
</form>