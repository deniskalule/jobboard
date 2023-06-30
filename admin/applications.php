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
        <?php include('includes/navbar.php'); ?>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION["success"] . '</div>';
            unset($_SESSION['success']);
        } else if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_SESSION["error"] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <div class="inner-content m-3">
            <div class="header">
                <h6>Applications table </h6>
            </div>
            <div class="table col-md-12">
                <table class="table" id="table" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Applicant Name</th>
                            <th>Applicant Contact</th>
                            <th>Resume</th>
                            <th>Cover Letter</th>
                            <th>Submitted on:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $app = $conn->query("SELECT * FROM applications");

                        while ($row = $app->fetch_assoc()) {
                            $applicant_id = $row['applicant_id'];
                            $job_id = $row['job_id'];
                            $select = $conn->query("SELECT * FROM applicant_table WHERE id = $applicant_id");
                            $applicant = $select->fetch_assoc();
                            $select2 = $conn->query("SELECT * FROM jobs WHERE id = $job_id");
                            $job = $select2->fetch_assoc();
                        ?>
                            <tr>
                                <td scope="row"><?= $row['id'] ?></td>
                                <td><?= $job['job_title'] ?></td>
                                <td><?= $applicant['fullname'] ?></td>
                                <td><?= $applicant['contact'] ?></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="resumes/<?= $row['resume'] ?>" download>Download Resume <i class="fa fa-download" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="letters/<?= $row['letter'] ?>" download>Download cover letter <i class="fas fa-download    "></i></a>
                                </td>
                                <td><?= $row['submission_date'] ?></td> 
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
<script>
    $("#addcategory").hide();
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
