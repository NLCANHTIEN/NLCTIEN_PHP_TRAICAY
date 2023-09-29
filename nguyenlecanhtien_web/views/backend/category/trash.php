
<table class="table table-bordered table-hover ">
    <tr>
        <th>Id</th>
        <th>Category_name</th>
        <th>Prent</th>
        <th>Status</th>
        <th>Restore</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($data['trash'] as $value):?>
        <tr>
            <td><?= $value['id']?></td>
            <td><?= $value['category_name']?></td>
            <td>
                <?php
                if($value['parent']==0){
                    echo $value['parent'];
                }
                
                foreach($data['allCat'] as $p){
                    if($value['parent']==$p['id']){
                        echo $p['category_name'];
                    }
                }
                 ?>
            </td>
            <td>
                <?php if($value['status']==1){ ?>
                    <a class="showcursor" href=""><img class="icon" src="<?=URL?>public/dist/img/check.png"/></a>
                <?php } else{ ?>
                    <a class="showcursor" href=""><img class="icon" src="<?=URL?>public/dist/img/ban.png"/></a>
                <?php }  ?>
                
            </td>
            <td><a href="<?= URL ?>index.php/backend/restoreCat/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/restore.png"/></a></td>
            <td><a href="<?= URL ?>index.php/backend/delCat/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/delete.png"/></a></td>
        </tr>
        <?php endforeach; ?>
</table>

