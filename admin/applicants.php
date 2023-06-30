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
                <h6>Clients table </h6>
                <!-- <a href="#add-client" class="btn btn-sm text-white" style="background-color:  #2a3801;" data-toggle="modal">Add Client</a> -->
                <!-- <hr> -->
            </div>
            <div class="table m-3 col-lg-11">
                <table class="table" id="table" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Image</th> -->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Region</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $client = $conn->query("select * from applicant_table");
                        
                        while($row = $client->fetch_assoc())
                        {
                            ?>
                                <tr>
                                    <td scope="row"><?= $row['id'] ?></td>
                                    <!-- <td scope="row"><img src="../uploads/<?= $row['image_url']?>" alt="" width="45" /></td> -->
                                    <td><?= $row['fullname']?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['contact'] ?></td>
                                    <td><?= $row['city'] ?></td>
                                    <td>
                                        <?= $row['region'] ?>
                                    </td>
                                </tr>
                                <!-- viewing client -->
                                <div class="modal fade" id="view-client<?= $row['id'] ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Client Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                $id = $row['id'];
                                                $select = $conn->query("select * from client_table where id =$id ");
                                                $clientDetails = $select->fetch_assoc();
                                                ?>

                                                <ul class="client-details" style="list-style-type: none;">
                                                    <li class="mb-3"><p><b>Name: </b><span><?=' '. $clientDetails['fname'].' '.$clientDetails['lname'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Email: </b><span><?=' '. $clientDetails['email'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Phone Number: </b><span><?=' '. $clientDetails['contact'] ?></span></p></li>
                                                    <li class="mb-3"><p><b>Address: </b><span><?=' '. $clientDetails['address'] ?></span></p></li>
                                                </ul>

                                                <div class="row">
                                                    
                                                </div>
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

            <!-- adding client -->
            <div class="modal fade" id="add-client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Client</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="./backend/addClient.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">First Name: </label>
                                        <input type="text" name="fname" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Last Name: </label>
                                        <input type="text" name="lname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Email: </label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">Contact: </label>
                                        <input type="text" name="contact" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Address: </label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Profile picture:</label><br>
                                    <input type="file" name="profile_pic" id="">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="add-client" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
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



