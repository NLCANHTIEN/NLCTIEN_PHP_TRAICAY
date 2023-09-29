<table class="table table-bordered table-hover ">
    <tr>
        <th>Mã sp</th>
        <th>Ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Loại</th>
        <th>Chi tiết</th>
        <th>Khuyến mãi</th>
        <th>Giá KM</th>
        <th>Tình trạng</th>
        <th>Phục hồi</th>
        <th>Xóa</th>
    </tr>

    <?php foreach ($data['trash'] as $value):?>
        <tr>
            <td><?= $value['id']?></td>
            <td><img class="prdImg" src="<?= URL?>assets/img/<?= $value['image']?>" alt="hinh anh" width="200" height="200"></td>
            <td><?= $value['product_name']?></td>
            <td><?= $value['price']?></td>
            <td>
                <?php
                    foreach($data['category'] as $p){
                        if($value['product_category']==$p['id']){
                            echo $p['category_name'];
                        }
                    }
                    ?>
            </td>
            <td><?= $value['product_detail']?></td>
            <td><?= $value['sale']?></td>
            <td><?= $value['created_at']?> </td>
            <td>
                <?php if($value['status']==1){ ?>
                    <a class="showcursor" href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/0"><img class="icon" src="<?=URL?>public/dist/img/check.png"/></a>
                <?php } else{ ?>
                    <a class="showcursor" href="<?= URL ?>index.php/backend/statusCat/<?= $value['id'] ?>/1"><img class="icon" src="<?=URL?>public/dist/img/ban.png"/></a>
                <?php }  ?>
                
            </td>
            <td><a href="<?= URL ?>index.php/backend/restorePrd/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/restore.png"/></a></td>
            <td><a href="<?= URL ?>index.php/backend/delPrd/<?= $value['id'] ?>"><img class="icon" src="<?=URL?>public/dist/img/delete.png"/></a></td>
        </tr>
        <?php endforeach; ?>
</table>