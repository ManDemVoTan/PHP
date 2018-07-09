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
             <a href="?mod=categories&act=add" class="btn btn-primary">Thêm mới</a>
            <!-- /.box-header -->
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
                        <td align="center"><img width="200px" height="200px" src="Upload/product/<?php 
                        echo $product['avatar'] ?>"></td>
                        <td align="center"><?= $product['description'] ?></td>
                        <td align="center"><?= $product['price'] ?></td>
                        <td align="center"><?= $product['created_at'] ?> </td>
                        <td align="center"><?= $product['quantity'] ?></td>
                        
                        
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
                                                 <div class="center"><img class="center" style="width: 300px" height="200px"  src="upload/product/<?= $product['avatar'] ?>" class="img-responsive"  margin-left: auto; margin-right: auto></div>
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
                            <a href="?mod=products&act=edit&ma_sp=<?php echo $product['ma_sp'] ?>" title="edit" class="btn btn-sm btn-primary "  data-toggle="modal" data-target="" id="">Edit</a>

                            <a href="?mod=products&act=delete&ma_sp=<?php echo $product['ma_sp'] ?>" title="Delete" class="btn btn-sm btn-danger " id="delete">Delete</a>

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