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
               <a type="button" id=""  href="?mod=BanHang&act=cart" class="btn btn-lg btn-warning" style="float: right;" value="" ><span class="glyphicon glyphicon-shopping-cart "></span></a>
            </div>

            <?php 
                    if(isset($_COOKIE['update'])){
                 ?>
                <div class="alert alert-success" style="width: 30% ;float: right;">
                  <strong>Success!</strong> CẬP NHẬP GIỎ HÀNG THÀNH CÔNG!!
                </div>
            <?php } ?>
       
            <div class="box-body">


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
                
                <tbody>
                    <?php foreach ($data as $product) { ?>
                    <tr>
                        <td align="center"><?= $product['ma_sp'] ?></td>
                        <td align="center"><?= $product['name'] ?></td>
                        <td align="center"><img width="50px" height="50px" src="Upload/product/<?php 
                        echo $product['avatar'] ?>"></td>
                        <td align="center"><?= $product['description'] ?></td>
                        <td align="center"><?= $product['price'] ?></td>
                        <td align="center"><?= $product['created_at'] ?> </td>
                        <td align="center"><?= $product['quantity'] ?></td>
                        
                        
                        <td class="text-center">
                          <a type="button" id="" href="?mod=BanHang&act=addcart&ma_sp=<?php echo $product['ma_sp'] ?>" class="btn btn-sm btn-info"  value="" >Add to Cart</a>
                            <!-- <a  title="Add to cart" class="cart btn btn-sm btn-danger " id="">Add to cart</a>
                            <i class="fas fa-cart-arrow-down"></i> -->

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
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
<?php include_once 'views/layouts/footer.php'; ?>