<?php
    session_start();
    include "Connection.php";
?>

<?php

    $developerid =  $_REQUEST['DeveloperID'];
    $managerid = $_REQUEST['ManagerID'];
    $reason = $_REQUEST['Reason'];
    $loanamount = $_REQUEST['LoanAmount'];
    $loanperiod = $_REQUEST['LoanPeriod'];
    $current_date = date("Y-m-d");

    if(empty($developerid)||empty($managerid)||empty($reason)||empty($loanamount)||empty($loanperiod)||empty($current_date))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Manager_LoanApplication.php'; </script>" ;// default page
    }
    else
    {
        $sql="SELECT * FROM manager_info WHERE Manager_ID='$managerid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $allowedLoan = $row['Salary'] * 0.25 * $loanperiod;

       
        if($loanamount < $allowedLoan)
        {
            $sql="SELECT * FROM loan_table WHERE Manager_ID='$managerid' and Status='Accepted' and Active='yes' and Developer_ID='$developerid'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);

            if($count ==0 )
            {
                $sql="INSERT INTO loan_table (Developer_ID,Manager_ID, Reason, Amount, TimePeriod,
                DateApplied, Status,Active) VALUES ('$developerid','$managerid','$reason','$loanamount','$loanperiod','$current_date',
                'Pending','no')";

                if(mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Loan Applied waiting for approval!";
                    echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                } 
                else
                {
                    echo "<script> location.href='Manager_LoanApplication.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "Loan application not sucessful as you already have an active Loan!";
                echo "<script> location.href='Manager_LoanApplication.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "Loan Requested is higher than the allowed amount ";
            $_SESSION['Error'] .= $allowedLoan;
            $_SESSION['Error'] .= " !";
            echo "<script> location.href='Manager_LoanApplication.php'; </script>" ;// default page
        }

    }
?>