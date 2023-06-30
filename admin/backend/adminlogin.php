<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = $conn->query("select * from  admin where email = '$email'");

    $row = $select->fetch_assoc();

    if(strcasecmp($email, $row['email']) == 0 && strcasecmp($password, $row['password']) == 0)
    {
        
       $_SESSION['admin'] = $row['id'];
       
    }
    else
    {
        echo "failed";
        $_SESSION['error'] = "Wrong username or password";
        // header("location: ../login.php");
    }

    header("location: ../index.php");
}


?>