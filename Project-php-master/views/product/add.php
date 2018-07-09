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
            <div class="box-body">

		
		<form action="?mod=products&act=store" method="POST" role="form" enctype="multipart/form-data">
			<legend>ADD PRODUCT</legend>
			
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" id="" placeholder="Input field" name="name" required>
			</div>
      <div class="form-group">
        <label for="">Avatar</label>
        <input type="file" id="avatar" class="form-control" id="" placeholder="Input field" name="avatar" required>
      </div>
			<div class="form-group">
				<label for="">Price</label>
				<input type="text" class="form-control" id="" placeholder="Input field" name="price" required>
			</div>
			<div class="form-group">
				<label for="">Quantity</label>
				<input type="number" class="form-control" id="" placeholder="Input field" name="quantity" required>
			</div>
			<div class="form-group">
				<label for="">Description</label>
				<input type="text" class="form-control" id="" placeholder="Input field" name="description" required>
			</div>

			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>

	</div>
            <!-- /.box-body -->
      <!--     </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div> 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<?php include_once 'views/layouts/footer.php'; ?>