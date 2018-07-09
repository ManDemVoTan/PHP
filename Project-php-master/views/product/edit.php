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

        <form action="?mod=products&act=update" method="POST" role="form" enctype="multipart/form-data">
             <div class="form-group">
                
                <input type="hidden" class="form-control" value="<?= $data['ma_sp'] ?>" id="" placeholder="Họ tên" name="ma_sp" required>
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?= $data['name'] ?>" id="" placeholder="Input Name" name="name" required>
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" id="avatar" class="form-control" id="" placeholder="Input field" name="avatar">
              </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" value="<?= $data['price'] ?>" id="" placeholder="Input Price" name="price" required>
            </div>  
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" class="form-control" value="<?= $data['quantity'] ?>" id="" placeholder="Input Quantity" name="quantity" required>
            </div>
             <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" value="<?= $data['description'] ?>" id="" placeholder="Input Description" name="description" required>
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

