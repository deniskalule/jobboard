<?php

include('includes/session.php');
include('includes/header.php');


?>

<main class="main">
    <!-- sidebar -->
    <?php
        include('includes/sidebar.php');
    ?>

    <!-- main content -->
    <div class="content">
        <!-- navbar -->
        <?php  include('includes/navbar.php');?>
        <?php
        if(isset($_SESSION['success']))
        {
            echo '<div class="alert alert-success " role="alert">
                    '.$_SESSION["success"].'
                </div>';
                unset($_SESSION['success']);
        }

        else if(isset($_SESSION['error']))
        {
            echo '<div class="alert alert-danger " role="alert">
                '.$_SESSION["error"].'
                </div>';
                unset($_SESSION['error']);
        }
        ?>

        <div class="inner-content m-3">
            <div class="header">
                <h6>Category table </h6>
                <!-- <hr> -->
            </div>
            <div class="table m-3 col-lg-8">
                <table class="table" id="table" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $cat = $conn->query("select * from category");
                        
                        while($row = $cat->fetch_assoc())
                        {
                            ?>
                                <tr>
                                    <td scope="row"><?= $row['id'] ?></td>
                                    <td><?= $row['cat_name'] ?></td>
                                    <td>
                                        <a href="#edit<?= $row['id'] ?>" class="btn btn-sm text-white btn-primary" data-toggle="modal"><i class="fas fa-edit    "></i> Edit</a>
                                        <a href="#delete<?= $row['id'] ?>" class="btn btn-sm text-white btn-danger" data-toggle="modal"><i class="fas fa-trash    "></i> Delete</a>
                                    </td>
                                </tr>
                                <!-- edit -->
                                <div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./backend/addCategory.php" method="post" class="form">
                                                    <input type="hidden" name="cat_id" value="<?= $row['id'] ?>">
                                                    <div class="form-group">
                                                        <label for="">Category Name: </label>
                                                        <input type="text" name="category" value="<?= $row['cat_name'] ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-sm text-white" style="background-color:  #2a3801;">Edit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete -->
                                <div class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./backend/addCategory.php" method="post" class="form">
                                                    <p class="text-center">Are you sure you want to delete this category</p>
                                                    <input type="hidden" name="cat_id" value="<?= $row['id'] ?>">
                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete" class="btn btn-sm text-white" style="background-color:  #2a3801;">Yes</button>
                                                        <button type="button"  class="btn btn-sm text-white btn-warning" class="close" data-dismiss="modal">No</button>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            

            
        </div>  
    </div>
</main>







<?php  include('includes/footer.php');?>
<script>
        $(document).ready( function () {
            $('#table').dataTable();
        } );
</script>



