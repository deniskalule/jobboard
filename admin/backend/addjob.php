<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['postbtn']))
{
    echo $job_title = $_POST['title'];
    echo $type = $_POST['type'];
    echo $vacancies = $_POST['vacno'];
    echo $description = $_POST['job_desc'];
    echo $experience = $_POST['exp'];
    echo $deadline = $_POST['deadline'];
    echo $location = $_POST['location'];
    echo $qualifications = $_POST['qualifications'];

    $insert = $conn->query("insert into jobs (job_title,type, vacancies, description, experience, deadline, location, qualifications)
    values('$job_title','$type', '$vacancies', '$description', '$experience', '$deadline', '$location', '$qualifications')");

    if($insert)
    {
        $_SESSION['success'] = "Job added successfully";

    }

    else
    {
        $_SESSION['error'] = "Error addiing this job";
    }
}

if(isset($_POST['editjob']))
{
    $job_id = $_POST['id'];
    echo $job_title = $_POST['title'];
    echo $vacancies = $_POST['vacno'];
    echo $description = $_POST['job_desc'];
    echo $experience = $_POST['exp'];
    echo $deadline = $_POST['deadline'];
    echo $location = $_POST['location'];
    echo $qualifications = $_POST['qualifications'];

    $update = $conn->query("update jobs set job_title = '$job_title', vacancies='$vacancies',  description='$description',
    experience='$experience', deadline='$deadline', location='$location', qualifications='$qualifications' where id = '$job_id'");

    if($update)
    {
        $_SESSION['success'] = "Job updated successfully";

    }
    else
    {
        $_SESSION['error'] = "Error editing job";
    }

}

if(isset($_POST['delete']))
{
    $job_id = $_POST['id'];

    $delete = $conn->query("delete from jobs where id = '$job_id'");
    if($delete)
    {
        $_SESSION['success'] = "Job deleted";
    }
}

header("location: ../jobs.php");
?>