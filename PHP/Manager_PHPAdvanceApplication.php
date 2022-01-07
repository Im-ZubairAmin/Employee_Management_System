<?php
    session_start();
    include "Connection.php";
?>

<?php

    $developerid =  $_REQUEST['DeveloperID'];
    $managerid = $_REQUEST['ManagerID'];
    $reason = $_REQUEST['Reason'];
    $advanceamount = $_REQUEST['AdvanceAmount'];
    $current_date = date("Y-m-d");

    if(empty($developerid)||empty($managerid)||empty($reason)||empty($advanceamount)||empty($advanceamount)||empty($current_date))
    {
        $_SESSION['Error'] = "All fields are not filled!";
        echo "<script> location.href='Manager_AdvanceApplication.php'; </script>" ;// default page
    }
    else
    {
        $sql="SELECT * FROM manager_info WHERE Manager_ID='$managerid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $allowedAdvance = $row['Salary'] * 0.75;

        if($allowedAdvance > $advanceamount)
        {
            $sql="SELECT * FROM advance_table WHERE Manager_ID='$managerid'and Developer_ID='-1' and Status='Accepted' and Active='yes'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);

            if($count ==0 )
            {
                $sql="INSERT INTO advance_table (Developer_ID,Manager_ID, Reason, Amount, DateApplied,
                Status,Active) VALUES ('$developerid','$managerid','$reason','$advanceamount','$current_date',
                'Pending','no')";

                if(mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Advance Applied waiting for approval!";
                    echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                } 
                else
                {
                    echo "<script> location.href='Manager_AdvanceApplication.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "You are not allowed to apply for another Advance as you already have one active Advance!";
                echo "<script> location.href='Manager_AdvanceApplication.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "Advance Requested is higher than the allowed amount ";
            $_SESSION['Error'] .= $allowedAdvance;
            $_SESSION['Error'] .= " !";
            echo "<script> location.href='Manager_AdvanceApplication.php'; </script>" ;// default page
        }
    }
?>