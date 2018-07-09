<?php 
include_once 'views/layouts/header.php';?>


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
              <a class="btn btn-primary pull-right" href="?mod=categories&act=add">Thêm mới danh mục </a>
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
                <div class="alert alert-danger" style="width: 30% ;float: right;">
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
            <!-- /.box-header -->
            <div class="box-body">


            <table  id="example"" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($data as $category) { ?>
                    <tr>
                        <td align="center"><?= $category['id'] ?></td>
                        <td align="center"><?= $category['name'] ?></td>
                        <td align="center"><?= $category['description'] ?></td>
                        <td class="text-center">
                            <a href="?mod=categories&act=detail&id=<?php echo $category['id'] ?>" title="Detail" class="btn btn-sm btn-success" data-toggle="modal" >Detail</a>
                            <!--  -->
                            <a href="?mod=categories&act=edit&id=<?php echo $category['id'] ?>" title="edit" class="btn btn-sm btn-primary " data-toggle="modal" data-target="">Edit</a>

                            <a href="?mod=categories&act=delete&id=<?php echo $category['id'] ?>" title="Delete" class="btn btn-sm btn-danger delete " id="nut">Delete</a>

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