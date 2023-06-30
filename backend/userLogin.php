<?php
session_start();
include("../includes/connection.php");


if(isset($_POST['register_jobseeker']))
{
    // echo "hello";
    echo $fullname  = $_POST['uname'];
    echo $email  = $_POST['useremail'];
    echo $pass  = $_POST['pass1'];
    echo $cpass  = $_POST['cpassword'];
    echo $region  = $_POST['region'];
    echo $city  = $_POST['city'];
    echo $contact  = $_POST['mobno'];


    $select = $conn->query("select id from applicant_table where email = '$email'");

    if($select->num_rows > 0)
    {
        $_SESSION['error'] = "Applicant with this email already exists";
        echo "failed";
    }

    else
    {
        // echo "success";
        if (strcasecmp($pass,$cpass) == 0)
        {
            $insert = $conn->query("insert into applicant_table (fullname,email,contact,region,city,password)
            values('$fullname','$email','$contact','$region','$city','$pass')");

            if($insert)
            {
                $_SESSION['success'] = "Registered successfully";
                echo "success";
            }
            else
            {
                $_SESSION['error'] = "Not registered";
                echo "failed";
            }
        }

        else
        {
            $_SESSION['error'] =  "Passwords do not match";
        }
        
    }

    header("location: ../login.php");

}


if(isset($_POST['login']))
{
    // echo "hi";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = $conn->query("select * from applicant_table where email = '$email'");
    $row = $select->fetch_assoc();

    if(strcasecmp($email, $row['email']) == 0 && strcasecmp($password, $row['password']) == 0)
    {
        $_SESSION['user'] = $row['id'];
    }

    else
    {
        $_SESSION['error'] = "Wrong email or password";
    }

    header("location: ../login.php");

}
?>