

    <?php 
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";
    // die;
include_once 'views/layouts/header.php';
?>


<!-- Content Wrapper. Contains page content -->
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
            <?php 
                    if(isset($_COOKIE['add'])){
                 ?>
                <div class="alert alert-info" style="width: 30% ;float: right;">
                  <strong>Success!</strong> THÊM MỚI THÀNH CÔNG!!
                </div>
            <?php } ?>
            <?php 
                    if(isset($_COOKIE['delete'])){
                 ?>
                <div class="alert alert-danger" style="width: 30%;float: right;"  >
                  <strong>Success!</strong> XÓA THÀNH CÔNG!!
                </div>
            <?php } ?>
            <?php 
                    if(isset($_COOKIE['update'])){
                 ?>
                <div class="alert alert-success" style="width: 30% ;float: right;">
                  <strong>Success!</strong> CẬP NHẬP THÀNH CÔNG!!
                </div>
            <?php } ?>
             <a href="?mod=users&act=add" class="btn btn-primary">Thêm mới</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Creted at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $user) { ?>
                        <tr>
                            <td align="center"><?= $user['ma_nv'] ?></td>
                                <td align="center"><?= $user['ten_nv'] ?></td>
                                <td align="center"><img width="50px" height="50px" src="Upload/user/<?php 
                               echo $user['avatar'] ?>"></td>
                                <td align="center"><?= $user['email'] ?></td>
                                <td align="center"><?= $user['so_dien_thoai'] ?></td>
                                <td align="center"><?= $user['created_at'] ?> </td>
                                <td align="center"><?= $user['status'] ?></td>
                                
                                
                                <td class="text-center">
                                    <a href="" title="Detail" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal_<?php echo $user['ma_nv'] ?>">Detail</a>
                                    <div class="modal fade" id="myModal_<?php echo $user['ma_nv'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-uppercase">Zent Corp</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-hover">
                                                        <div class="center"><img class="center" style="width: 200px; padding-bottom: 10px;" height="200px"  src="public/dist/img/<?= $user['avatar'] ?>" class="img-responsive"  margin-left: auto; margin-right: auto></div>
                                                        <br>
                                                        <tbody>
                                                            <tr class="text-left">
                                                                <td >ID</td>
                                                                <td><?php echo $user['ma_nv'] ?></td>
                                                            </tr>
                                                            <tr class="text-left">
                                                                <td class="text-left">Name</td>
                                                                <td><?php echo $user['ten_nv'] ?></td>
                                                            </tr>
                                                            <tr class="text-left">
                                                                <td class="text-left">Phone</td>
                                                                <td><?php echo $user['so_dien_thoai'] ?></td>
                                                            </tr>
                                                            <tr class="text-left">
                                                                <td class="text-left">Email</td>
                                                                <td><?php echo $user['email'] ?></td>
                                                            </tr>
                                                            <tr class="text-left">
                                                                <td class="text-left">Password</td>
                                                                <td><?php echo $user['password'] ?></td>
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
                                    <a href="?mod=users&act=edit&ma_nv=<?php echo $user['ma_nv'] ?>" title="edit" class="btn btn-sm btn-primary " data-toggle="modal" data-target="">Edit</a>

                                    <a href="?mod=users&act=delete&ma_nv=<?php echo $user['ma_nv'] ?>" title="Delete" class="btn btn-sm btn-danger delete">Delete</a>

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




