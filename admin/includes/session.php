<?php

session_start();
include('includes/connection.php');

if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) =='')
{
    header('location: login.php');
}

$sql = $conn->query("select * from admin where id='".$_SESSION['admin']."'");
$admin = $sql->fetch_assoc();

?>