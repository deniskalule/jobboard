<?php
session_start();
include("./includes/connection.php");

$file = $_GET['file']; // Get the file name from the URL parameter

if (empty($file)) {
    die("File not found."); // File parameter is empty
}

$filePath = "admin/" . $file; // Construct the full file path

if (file_exists($filePath)) {
    // Set appropriate headers
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filePath));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    // Read the file and output it to the browser
    ob_clean();
    flush();
    readfile($filePath);
    exit;
} else {
    die("File not found."); // File doesn't exist
}
?>
