<?php 
include_once 'views/layouts/header.php';

?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    PRODUCT 
                </h1> 
                 <a href="?mod=products&act=add" id="add" class="btn btn-primary">Thêm mới</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
       <!--  -->
        <div>


            <table  id="example"" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
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
                        <td align="center"><?= $product['id'] ?></td>
                        <td align="center"><?= $product['name'] ?></td>
                        <td align="center"><?= $product['description'] ?></td>
                        <td align="center"><?= $product['price'] ?></td>
                        <td align="center"><?= $product['created_at'] ?> </td>
                        <td align="center"><?= $product['quantity'] ?></td>
                        
                        
                        <td class="text-center">
                            <a href="" title="Detail" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal_<?php echo $product['id'] ?>">Detail</a>
                            <div class="modal fade" id="myModal_<?php echo $product['id'] ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title text-uppercase">Zent Corp</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-hover">
                                                <h3 class="text-center">Product's informations</h3>
                                                <br>
                                                <tbody>
                                                    <tr class="text-left">
                                                        <td >ID</td>
                                                        <td><?php echo $product['id'] ?></td>
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
                            <a href="?mod=products&act=edit&id=<?php echo $product['id'] ?>" title="edit" class="btn btn-sm btn-primary "  data-toggle="modal" data-target="" id="">Edit</a>

                            <a href="?mod=products&act=delete&id=<?php echo $product['id'] ?>" title="Delete" class="btn btn-sm btn-danger " id="delete">Delete</a>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include_once 'views/layouts/footer.php'; ?>