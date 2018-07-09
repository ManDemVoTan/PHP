<?php include_once 'views/layouts/header.php'; ?>
<!--  -->
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

        <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>

        <form action="?mod=users&act=update" method="POST" role="form" id="frm-edit-spent" enctype="multipart/form-data">
             <div class="form-group">
                
                <input type="hidden" class="form-control" value="<?= $data['ma_nv'] ?>" id="" placeholder="Họ tên" name="ma_nv" >
            </div>
            <div class="form-group">
                <label for="" name="content">Họ tên</label>
                <input type="text" class="form-control" value="<?= $data['ten_nv'] ?>" id="" placeholder="Họ tên" name="name" required>
            </div>
            <div class="form-group">
              <label for="">Avatar</label>
              <input type="file" id="avatar" class="form-control" id="" placeholder="Input field" name="avatar" required>
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" value="<?= $data['so_dien_thoai'] ?>" id="" placeholder="Nhập vào số điện thoại" name="mobile" required>
            </div>  
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" value="<?= $data['email'] ?>" id="" placeholder="Nhập vào email" name="email" required>
            </div>
             <div class="form-group">
                <label for="">Status</label>
                <input type="text" class="form-control" value="<?= $data['status'] ?>" id="" placeholder="Nhập vào địa chỉ" name="status" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
         </form> 
         </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>    
  </div>
</div>
  <!-- /.container-fluid -->
<!-- </div> -->

<?php include_once 'views/layouts/footer.php'; ?>
