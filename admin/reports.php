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
                <h6>Reports</h6>
            </div>
            <div class="filters">
                <h4>Filter Options</h4>
                <form action="" class="d-flex justify-content-between" method="GET">
                    <div class="">
                        <label for="start_date">Start Date:</label>
                        <input type="date" name="start_date" id="start_date">
                    </div>
                    <div class="">
                        <label for="end_date">End Date:</label>
                        <input type="date" name="end_date" id="end_date">
                    </div>
                    <div class="">
                        <label for="job_name">Job Name:</label>
                        <input type="text" name="job_name" id="job_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                    <button onclick="printReceipt()" class="btn btn-sm btn-success"><i class="fas fa-print    "></i> Print Report</button>
                </form>
            </div>

            <div class="print-section">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['start_date']) && isset($_GET['end_date'])) {
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
                $job_name = $_GET['job_name'];

                $query = "SELECT applicant_table.fullname, applicant_table.contact, applications.submission_date, jobs.job_title, applications.resume, applications.letter 
                FROM applications JOIN jobs ON applications.job_id = jobs.id 
                JOIN applicant_table ON applications.applicant_id = applicant_table.id WHERE 1=1";
                if (!empty($start_date)) {
                    $query .= " AND applications.submission_date >= '$start_date'";
                }
                if (!empty($end_date)) {
                    $query .= " AND applications.submission_date <= '$end_date'";
                }
                if (!empty($job_name)) {
                    $query .= " AND jobs.job_title LIKE '%$job_name%'";
                }

                $result = $conn->query($query);
                
                if ($result) {
                    $totalApplications = $result->num_rows;

                    echo "<div class='report-results'>";
                    echo "<h4>Filtered Applications Report</h4>";
                    echo "<p>Total Applications: $totalApplications</p>";

                    // Display the filtered report table
                    echo "<table class='table' id='table' border='1'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Contact</th>
                                    <th>Date Applied</th>
                                    <th>Resume</th>
                                    <th>Cover Letter</th>
                                </tr>
                            </thead>
                            <tbody>";
                            $count = 1;

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td scope='row'>" . $count . "</td>
                                <td>" . $row['job_title'] . "</td>
                                <td>" . $row['fullname'] . "</td>
                                <td>" . $row['contact'] . "</td>
                                <td>" . $row['submission_date'] . "</td>
                                <td><a href='admin/resumes/" . $row['resume'] . "' download>Download</a></td>
                                <td><a href='admin/letters/" . $row['letter'] . "' download>Download</a></td>
                            </tr>";
                            $count ++;
                    }

                    echo "</tbody></table></div>";
                } else {
                    echo "<p>Error executing the query: " . $conn->error . "</p>";
                }
            }
            ?>
            </div>

        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>
<style>
    .table-heading
    {
        visibility: hidden;
    }
    @media print {
        body * , .print-section, .table-heading{
            visibility: hidden;
        }
        .print-section,
        .print-section *, .table-heading {
            visibility: visible;
        }
        .print-section {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .tools{
            display: none;
        }
        /* .table-heading
        {
            display: block;
        } */
    }
</style>

<script>
    function printReceipt() {
        window.print();
    }
</script>
<script>
    $("#addcategory").hide();
    $(document).ready(function() {
        $('#table').dataTable();
    });
</script>
