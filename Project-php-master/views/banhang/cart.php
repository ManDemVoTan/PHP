<?php 
    include_once 'views/layouts/header.php';
    ?>
<!-- Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <div class="box-body">
                        <h1 class="text-center">Danh Sách Giỏ hàng</h1>
                        <a class="btn btn-primary " href="?mod=BanHang&act=list">Tiếp tục mua hàng</a>
                        <table  id="example"" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Desciption</th>
                                    <th>Price</th>
                                    <th>Creted at</th>
                                    <th>Quatity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php 
                                if(isset($_SESSION['cart'])){
                                $tongtien = 0;
                                foreach ($_SESSION['cart'] as $key => $product ){
                                    $tongtien = $tongtien + ($product['qty']*$product['price']);
                                    $_SESSION['invoice_info']['tong_tien']=$tongtien;
                                    ?>
                            <tbody>
                                <tr>
                                    <td align="center"><?= $product['ma_sp'] ?></td>
                                    <td align="center"><?= $product['name'] ?></td>
                                    <td align="center"><img width="50px" height="50px" src="Upload/product/<?php 
                                        echo $product['avatar'] ?>"></td>
                                    <td align="center"><?= $product['description'] ?></td>
                                    <td align="center"><?php echo number_format($product['price']*$product['qty']) ; ?></td>
                                    <td align="center"><?= $product['created_at'] ?> </td>
                                    <td class="text-center">
                                        <a href="?mod=BanHang&act=addtocart&ma_sp=<?php echo $key ?>" class="btn btn-success">+</a>
                                        <?php echo $product['qty'] ?>
                                        <a href="?mod=BanHang&act=subcart&ma_sp=<?php echo $key ?>" class="btn btn-success">-</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="" title="Detail" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal_<?php echo $product['ma_sp'] ?>">Detail</a>
                                        <div class="modal fade" id="myModal_<?php echo $product['ma_sp'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title text-uppercase">Zent Corp</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-hover">
                                                            <h3 class="text-center">Product's informations</h3>
                                                            <br>
                                                            <tbody>
                                                                <tr class="text-left">
                                                                    <td >ID</td>
                                                                    <td><?php echo $product['ma_sp'] ?></td>
                                                                </tr>
                                                                <tr class="text-left">
                                                                    <td class="text-left">Name</td>
                                                                    <td><?php echo $product['name'] ?></td>
                                                                </tr>
                                                                <tr class="text-left">
                                                                    <td class="text-left">Desciption</td>
                                                                    <td><?php echo $product['description'] ?></td>
                                                                </tr>
                                                                <tr class="text-left">
                                                                    <td class="text-left">Price</td>
                                                                    <td><?php echo $product['price'] ?></td>
                                                                </tr>
                                                                <tr class="text-left">
                                                                    <td class="text-left">Quatity</td>
                                                                    <td><?php echo $product['quantity'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="?mod=BanHang&act=delete&ma_sp=<?php echo $product['ma_sp'] ?>" title="Delete" class="btn btn-sm btn-danger " id="delete">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a  href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" >Thanh Toán</a>
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title text-uppercase">Zent Corp</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="?mod=customer&act=order" method="POST" role="form">
                                            <legend class="text-center">Đăng Nhập</legend>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" name="email" id="" placeholder="Input Email">
                                            </div>
                                            <div class="form-group" class="col-xs-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit"> Đặt hàng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1>
                            <?php echo "Tổng: ".number_format($tongtien)."VND" ?>
                            <?php } ?>
                        </h1>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<div style="clear: both;"></div>

<?php include_once 'views/layouts/footer.php'; ?>