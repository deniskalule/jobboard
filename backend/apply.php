<?php
session_start();
include("../includes/connection.php");

if(isset($_POST['apply']))
{
    // resume details
    $resumeName = $_FILES['resume']['name'];
    $resumeSize = $_FILES['resume']['size'];
    $RtmpName = $_FILES['resume']['tmp_name'];
    $error1 = $_FILES['resume']['error'];

    // letter details
    $letterName = $_FILES['letter']['name'];
    $letterSize = $_FILES['letter']['size'];
    $LtmpName = $_FILES['letter']['tmp_name'];
    $error2 = $_FILES['letter']['error'];

    $job_id = $_POST['job_id'];
    $applicant_id = $_POST['applicant_id'];

    $select = $conn->query("select id from applications where job_id = $job_id and applicant_id = $applicant_id");

    if($select->num_rows > 0)
    {
        $_SESSION['error'] =  " You already applied for this job";
    }

    else
    {
        if($error1 === 0 && $error2 === 0)
        {
            if($resumeSize > 10000000 && $letterSize > 10000000)
            {
                $_SESSION['error'] = "Sorry, your file is too large";
                echo "failed";
                
            }
            else
            {
                echo "success";
                $resumeext = pathinfo($resumeName, PATHINFO_EXTENSION);
                $resumeExt = strtolower($resumeext);
                $letterext = pathinfo($letterName, PATHINFO_EXTENSION);
                $letterExt = strtolower($letterext);
                
                $allowedExt = array('pdf','doc','docx');
    
                if(in_array($resumeExt, $allowedExt) && in_array($letterExt, $allowedExt))
                {
                    echo $newresumeName = uniqid("RESUME-",true).'.'.$resumeExt;
                    $resumeUploadPath = '../admin/resumes/'.$newresumeName;
                    move_uploaded_file($RtmpName, $resumeUploadPath);

                    echo $newletterName = uniqid("LETTER-",true).'.'.$letterExt;
                    $letterUploadPath = '../admin/letters/'.$newletterName;
                    move_uploaded_file($LtmpName, $letterUploadPath);

                    $insert = $conn->query("INSERT INTO `applications`( `job_id`, `applicant_id`, `resume`, `letter`) 
                    VALUES ('$job_id','$applicant_id','$newresumeName','$newletterName')");
        
                        if($insert)
                        {
                            echo "success";
                            $_SESSION['success'] =  "Application has successfully been submitted";
                            // header("location: ../login.php");
                        }
                        else
                        {
                            echo "failed";
                            $_SESSION['error'] ="error";
                        }
                }
    
                else 
                {
                    echo "failed";
                    $_SESSION['error'] =  "You cannot upload this type of file";
                        // header("location: ../login.php");
                }
            }
        }
       
    }
    }
header("location: ../apply.php");


?>