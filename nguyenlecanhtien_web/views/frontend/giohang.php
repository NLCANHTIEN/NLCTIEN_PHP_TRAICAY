<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= URL?>assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php
   $this -> view('frontend/pages/codinh',$data);
   ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                            $i = 0;
                            $sum = 0;
                            foreach ($data['cart'] as $value):
                        ?>
                        <tr>
                            <td class="align-middle"><img src="<?= URL?>assets/img/<?=$value['image']?>" alt="" style="width: 50px;"> <?=$value['product_name']?></td>
                            <td class="align-middle"><?=$value['price']?></td>
                            <td class="align-middle">
                             
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    
                                <?= $_SESSION['amount'][$i];?>
                                </div>
                            </td>
                            <td class="align-middle">
                            <?= $_SESSION['amount'][$i]*$value['price'];?>
                            </td>    
                            
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php 
                        $sum+=$_SESSION['amount'][$i]*$value['price'];
                        $i++;
                       
                        endforeach;
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Nhập mã giảm giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5><?= $sum?></h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <?php
   $this -> view('frontend/pages/codinh1',$data);
   ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= URL?>assets/js/main.js"></script>
</body>

</html>