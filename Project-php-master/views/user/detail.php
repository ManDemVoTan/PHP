<?php include_once 'views/layouts/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">

	<div class="panel panel-default">
                            <div class="panel-heading text-center">
                               <h1>Thông tin chi tiết</h1> 
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table class="table table-hover" style="margin: 80px 0;">
                                    <tbody>
                                        <tr>
                                            <th>Họ tên</th>
                                            <td><?= $user['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $user['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td><?= $user['mobile'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Thời gian khởi tạo</th>
                                            <td><?= $user['created_at'] ?></td>
                                        </tr>
                                         <tr>
                                            <th>Status</th>
                                            <td><?= $user['status'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-default" style="float: right;" href="?mod=users&act=list" title="Back">Back</a>
                            </div>
                            <!-- /.panel-body -->
                        </div>

                    </div>

</body>
</html>

<?php include_once 'views/layouts/footer.php'; ?>