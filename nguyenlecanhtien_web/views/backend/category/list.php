<p>
    <a href="<?= URL ?>index.php/backend/catAdd"><button type="button" class="btn btn-primary">Thêm</button></a>
    <a href="<?= URL ?>index.php/backend/trashCatList"><button type="button" class="btn btn-primary">Thùng rác(<?= $data['trash'];?>)</button></a>
</p>
<table class="table table-bordered table-hover ">
    <tr>
        <th>Id</th>
        <th>Category_name</th>
        <th>Prent</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($data['category'] as $value):?>
        <tr>
            <td><?= $value['id']?></td>
            <td><?= $value['category_name']?></td>
            <td>
                <?php
                if($value['parent']==0){
                    echo $value['parent'];
                }
                
                foreach($data['category'] as $p){
                    if($value['parent']==$p['id']){
                        echo $p['category_name'];
                    }
                }
                 ?>
            </td>
            <td>
                <?php if($value['status']==1){ ?>
                    <a class="showcursor" href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/0"><img class="icon" src="<?=URL?>public/dist/img/check.png"/></a>
                <?php } else{ ?>
                    <a class="showcursor" href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/1"><img class="icon" src="<?=URL?>public/dist/img/ban.png"/></a>
                <?php }  ?>
                
            </td>
            <td><a href="<?= URL ?>index.php/backend/editCat/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/but.png"/></a></td>
            <td><a href="<?= URL ?>index.php/backend/delTempCat/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/delete.png"/></a></td>
        </tr>
        <?php endforeach; ?>
</table>

<?= $data['pagination']; ?>