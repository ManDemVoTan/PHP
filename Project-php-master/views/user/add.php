<?php include_once 'views/layouts/header.php'; ?>
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
              <h3 class="box-title" style="color: red">Chào mừng bạn đến với UTT</h3>
            </div>
            
            <div class="box-body">
		
		<form action="?mod=users&act=store" method="POST" role="form" id="" enctype="multipart/form-data"
    name='registration' onSubmit="return formValidation();">
			<legend>Thêm mới Tài Khoản</legend>
		
			<div class="form-group">
				<label for="ten_nv">Name</label>
				<input type="text" class="form-control" id="" placeholder="Input field" name="ten_nv" required>
        <!-- <span>Username must have alphabet characters only</span> -->
			</div>
			<div class="form-group">
				<label for="">Avatar</label>
				<input type="file" id="avatar" class="form-control" id="" placeholder="Input field" name="avatar" required>
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="" placeholder="Input field" name="email" required>
			</div>
			<div class="form-group">
				<label for="">Mobile</label>
				<input type="number" class="form-control" id="" placeholder="Input field" name="so_dien_" required>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" id="" placeholder="Input field" name="password" required>
			</div>
		
			
		
			<button type="submit" class="btn btn-primary" id="add" name="submit">Submit</button>
		</form>
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
</body>
</html>

<?php include_once 'views/layouts/footer.php'; ?>