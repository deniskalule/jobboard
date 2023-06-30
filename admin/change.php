<?php
session_start();

include("./includes/connection.php");

$id = $_GET['id'];

$update = $conn->query("update jobs set status= 1 where id= $id ");
header("location: jobs.php");   


?>