<?php
    session_start();
    include "Connection.php";
?>

<?php

    $developerid =  $_REQUEST['DeveloperID'];
    $managerid = $_REQUEST['ManagerID'];
    $complaint = $_REQUEST['Complaint'];
    $complaintto = $_REQUEST['ComplaintTo'];
    $current_date = date("Y-m-d");

    if(empty($developerid)||empty($managerid)||empty($complaint)||empty($complaintto)||empty($current_date))
    {
        $_SESSION['Error'] = "All fields are not filled!";
        echo "<script> location.href='Developer_Complaint.php'; </script>" ;// default page
    }
    else
    {
        $WorkerType = 'Developer';
        $sql="INSERT INTO complaint_table (TypeOfEmployee, Developer_ID,Manager_ID, ComplaintTo, Complaint, DateOfComplaint)
        VALUES ('$WorkerType','$developerid','$managerid','$complaintto','$complaint','$current_date')";

        if(mysqli_query($con, $sql))
        {
            $_SESSION['Sucess'] = "Complaint has been filed";
            echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
    
        } 
        else{
            echo "<script> location.href='Developer_Complaint.php'; </script>" ;// default page
        }
    }
?>