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
             <!-- <a href="?mod=products&act=add" class="btn btn-primary">Thêm mới</a> -->
            <!-- /.box-header -->
            <div class="box-body">
                <h1 class="text-center">Thông Tin Giỏ hàng</h1>

                <div >
                    <table class="table table-hover">
                            <tr class="text-left">
                                <td>Mã Khách Hàng</td>
                                
                                <td><?php echo $customer['ma_kh'] ?></td>
                            </tr>
                            <tr>
                                <td>Tên Khách Hàng</td>
                                <td><?php echo $customer['ten_kh'] ?></td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại</td>
                                <td><?php echo $customer['so_dien_thoai'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $customer['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Ngày Bán</td>
                                <td><?php echo $customer['created_at'] ?></td>
                            </tr>
                    </table>
                </div>

            <table  id="example"" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Tiền</th>  
                    </tr>
                </thead>
                
                <tbody>

                    <?php  
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $key => $product ){
                        $tongtien = $tongtien + ($product['qty']*$product['price']);

                        

                    ?>
                    <tr>
                        <td align="center"><?= $key ?></td>
                        <td align="center"><?= $product['name'] ?></td>
                        <td align="center"><?= $product['qty'] ?></td>
                        <td align="center"><?=  number_format($product['price'])?> </td>
                    </tr>
                    <?php }
                        $_SESSION['total']=$tongtien; ?>
                </tbody>

            </table>
             <h1>
        
                <?php echo "Tổng: ".number_format($tongtien)."VND" ?>
             </h1>
        </div>
        <table>
            <tr style="float: right">
                <td>
                    <a type="button" id="print_button" href="?mod=BanHang&act=list&id=<?php echo $customer['ma_kh'] ?>"  class="btn btn-md btn-info " value="" >Tiếp tục mua hàng</a>
                    <a type="button" id="print_button" href="?mod=bill&act=store " class="btn btn-md btn-info " value="" >Thanh Toán</a>
            </td>
                
            </tr>
        </table>
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
<?php include_once 'views/layouts/footer.php'; ?>