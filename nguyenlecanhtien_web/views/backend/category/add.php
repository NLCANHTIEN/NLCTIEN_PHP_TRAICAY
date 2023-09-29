<form action="<?= URL?>index.php/backend/doCatAdd" method="post" class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">Category_name</label>
    <div class="col-sm-10">
        <input name="cat_name" type="text" class="form-control"   placeholder="Enter category name">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Parent</label>
    <div class="col-sm-10">
        <select class="form-control" name="parent">
            <?php
                foreach ($data['category'] as $value){
                    echo "<option value = '" .$value['id']."'>".$value['category_name']."</option>";
                }
            ?>
        </select>
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