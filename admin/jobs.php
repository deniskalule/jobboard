<?php

include('includes/session.php');
include('includes/header.php');


?>

<main class="main">
    <!-- sidebar -->
    <?php include('includes/sidebar.php'); ?>

    <!-- main content -->
    <div class="content">
        <!-- navbar -->
        <?php include('includes/navbar.php'); ?>
        <?php
        if(isset($_SESSION['success'])) {
            echo '<div class="alert alert-success" role="alert">'.$_SESSION["success"].'</div>';
            unset($_SESSION['success']);
        } else if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert">'.$_SESSION["error"].'</div>';
            unset($_SESSION['error']);
        }
        ?>

        <div class="inner-content m-3">
            <div class="header">
                <a href="" class="btn btn-sm text-white add-job" style="background-color: #2a3801;">Add job</a>
            </div>
            <div class="table mt-3 col-lg-12">
                <table id="jobTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Vacancies</th>
                            <th>Description</th>
                            <th>Experience</th>
                            <th>Deadline</th>
                            <th>Location</th>
                            <th>Qualifications</th>
                            <th>Posted on</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        <?php
                        $select = $conn->query("select * from jobs");

                        while($row = $select->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <td><?= $row['job_title'] ?></td>
                                <td><?= $row['vacancies'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['experience']. 'years' ?></td>
                                <td><?= $row['deadline'] ?></td>
                                <td><?= $row['location'] ?></td>
                                <td><?= $row['qualifications'] ?></td>
                                <td><?= $row['post_date'] ?></td>
                                <td>
                                    <?php 
                                    if($row['status'] == 0)
                                    {
                                        echo "<p class='alert alert-success'>OPEN</p>";
                                    }
                                    else
                                    {
                                        echo "<p class='alert alert-warning'>CLOSED</p>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="#edit<?= $row['id'] ?>" class="btn btn-sm text-primary " data-toggle = "modal"><i class="fas fa-edit    "></i></a>
                                    <a href="#delete<?= $row['id'] ?>" class="btn btn-sm text-danger " data-toggle = "modal"><i class="fas fa-trash    "></i></a>
                                    <?php
                                    if($row['status'] == 0)
                                    {
                                        ?>
                                        <a href="change.php?id=<?= $row['id'] ?>" style="font-size: 12px;"  class="btn btn-sm btn-outline-warning">Change Status</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                             <!-- Delete Modal -->
                             <div class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete this job</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="./backend/addjob.php" method="post">
                                                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                                <p>Are you sure you want to delete this job?</p>

                                                <div class="modal-footer">
                                                    <button type="submit" name="delete" class="btn btn-success">Yes</button>
                                                    <button type="button" class="btn btn-danger"  data-dismiss="modal">no</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <!--Edit Modal -->
                            <div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center">Edit job details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" class="form-horizontal" action="./backend/addjob.php">
                                            <h4></h4>
                                            <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                    
                                            <div class="form-group">
                                                <label for="desig" class="control-label">Job Title/ Designation:</label>
                                                <div class="col-sm-12"> 
                                                    <input type="text" class="form-control" name="title" id="desig" value="<?= $row['job_title'] ?>" required >
                                                </div>
                                                <label id="deser" class="error"></label>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="vac_no" class="control-label">Number of vacancies:</label>
                                                <div class="col-sm-12">  
                                                    <input type="text" name="vacno" class="form-control" id="vac_no"  value="<?= $row['vacancies'] ?>"  required  > </div>
                                                <label id="vacer" class="error"></label>
                                            </div>
                                            
                                                <div class="form-group">
                                                <label for="job_desc" class="control-label">Job Description:</label>
                                                    <div class="col-sm-12">  <input class="form-control"id="job_desc"  value="<?= $row['description'] ?>" name="job_desc" required></div>
                                                <label class="error" id="jober"></label>
                                            </div>
                                            
                                                <div class="form-inline form-group">
                                                <label for="exp" class="control-label">Work Experience:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" name="exp" required id="exp">
                                                            <option  value="<?= $row['experience'] ?>"><?= $row['experience'] ?></option>
                                                            <option value="1">1 </option>
                                                                <option value="2">2 </option>
                                                                <option value="3">3 </option>
                                                                <option value="4">4 </option>
                                                                <option value="5"> 5</option>
                                                                    <option value="6">6 </option>
                                                                    <option value="7">7 </option>
                                                                    <option value="7 above"> above 7</option>
                                                        </select> <span> Minimum Years </span>
                                                    </div>
                                                </div>
                                            
                                            <div class="form-group">
                                                <label for="fnarea" class="control-label">Deadline for Application:</label>
                                                    <div class="col-sm-12">  <input type="date"  value="<?= $row['deadline'] ?>" class="form-control" required name="deadline"> </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="location" class="control-label">Location:</label>
                                                <div class="col-sm-12">   
                                                    <input type="text" class="form-control"  value="<?= $row['location'] ?>" name="location"required />
                                                </div> 
                                            <div class="page-header">
                                                <div class="form-group">
                                                    <label for="ugcourse" class="control-label">Specify Qualification:</label>
                                                    <input name="qualifications" class="form-control"  value="<?= $row['qualifications'] ?>">
                                                </div>
                                                <p> Are you sure to submit the job! Check for errors before submitting the job</p>
                                                <div class="form-group">
                                                    <button class="btn btn-sm w-50 btn-success btn-block" type="submit" name="editjob">Edit Job</button>
                                                </div>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
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

            <div class="post-job mt-3 ml-3 mr-3 col-md-8 bg-white shadow rounded" style="border: 2px solid #000;">
                <form method="post" class="form-horizontal" action="./backend/addjob.php">
                    <h4></h4>
                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="desig" class="control-label">Job Title/ Designation:</label>
                            <div class="col-sm-12"> 
                                <input type="text" class="form-control" name="title" id="desig" required >
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Job Type</label>
                            <select name="type" class="form-control" required>
                                <option selected>Select type</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="vac_no" class="control-label">Number of vacancies:</label>
                        <div class="col-sm-12">  
                            <input type="text" name="vacno" class="form-control" id="vac_no"  required  > </div>
                        <label id="vacer" class="error"></label>
                    </div>
                    
                        <div class="form-group">
                        <label for="job_desc" class="control-label">Job Description:</label>
                            <div class="col-sm-12">  <textarea class="form-control" rows="3" id="job_desc" name="job_desc" required onblur="validate('longtext','jober',this.value)"></textarea> </div>
                        <label class="error" id="jober"></label>
                    </div>
                    
                        <div class="form-inline form-group">
                        <label for="exp" class="control-label">Work Experience:</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="exp" required id="exp">
                                    <option value=""> -Select- </option>
                                    <option value="1">1 </option>
                                        <option value="2">2 </option>
                                        <option value="3">3 </option>
                                        <option value="4">4 </option>
                                        <option value="5"> 5</option>
                                            <option value="6">6 </option>
                                            <option value="7">7 </option>
                                            <option value="7 above"> above 7</option>
                                </select> <span> Minimum Years </span>
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label for="fnarea" class="control-label">Deadline for Application:</label>
                            <div class="col-sm-12">  <input type="date" class="form-control" required name="deadline"> </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="location" class="control-label">Location:</label>
                        <div class="col-sm-12">   
                            <input type="text" class="form-control" name="location"required />
                        </div> 
                    <div class="page-header">
                        <div class="form-group">
                            <label for="ugcourse" class="control-label">Specify Qualification:</label>
                            <textarea name="qualifications" class="form-control" rows="3"></textarea>
                        </div>
                        <p> Are you sure to submit the job! Check for errors before submitting the job</p>
                        <div class="form-group">
                            <button class="btn btn-sm w-50 btn-success btn-block" type="submit" name="postbtn">Post Job</button>
                        </div>
                </form>
            </div>
        </div>  
    </div>
</main>

<?php include('includes/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#jobTable').DataTable();
    });

    $('.post-job').hide();
    $('.add-job').click(function (e) {
        e.preventDefault();

        $('.post-job').show();
        $('.table').hide();
    })

</script>
