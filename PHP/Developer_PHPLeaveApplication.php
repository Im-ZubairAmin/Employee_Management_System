<?php
    session_start();
    include "Connection.php";
?>

<?php

    $developerid =  $_REQUEST['DeveloperID'];
    $managerid = $_REQUEST['ManagerID'];
    $reason = $_REQUEST['Reason'];
    $leavedays = $_REQUEST['LeaveDays'];
    $leavestartdate = $_REQUEST['LeaveStartDate'];
    $current_date = date("Y-m-d");

    if(empty($developerid)||empty($managerid)||empty($reason)||empty($leavedays)||empty($leavestartdate)||empty($current_date))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Developer_LeaveApplication.php'; </script>" ;// default page
    }
    else
    {
        $sql="INSERT INTO leave_table (Developer_ID,Manager_ID, Reason, NumberOfDays, StartDate,
        DateApplied, Status) VALUES ('$developerid','$managerid','$reason','$leavedays','$leavestartdate','$current_date',
        'Pending')";

        if(mysqli_query($con, $sql))
        {
            $_SESSION['Sucess'] = "Leave Applied waiting for approval!";
            echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
    
        } 
        else{
            echo "<script> location.href='Developer_LeaveApplication.php'; </script>" ;// default page
        }
    }
?>