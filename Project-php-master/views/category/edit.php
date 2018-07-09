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

        <form action="?mod=categories&act=update" method="POST" role="form">
             <div class="form-group">
                
                <input type="hidden" class="form-control" value="<?= $category['id'] ?>" id="" placeholder="Họ tên" name="id">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" value="<?= $category['name'] ?>" id="" placeholder="Input Name" name="name">
            </div>
             <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" value="<?= $category['description'] ?>" id="" placeholder="Input Description" name="description">
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

