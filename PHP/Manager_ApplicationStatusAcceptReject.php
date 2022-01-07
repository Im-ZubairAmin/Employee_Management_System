<?php
    session_start();
    include "Connection.php";
?>

<?php

    $ID =  $_GET['ID'];
    $Status = $_GET['Status'];
    $Type = $_GET['Type'];

    if(empty($ID)||empty($Status)||empty($Type))
    {
        if($Type == "Loan")
        {
            echo "<script> location.href='Developer_ApplicationStatusLoan.php'; </script>" ;// default page
        }
        else if($Type == "Leave")
        {
            echo "<script> location.href='Developer_ApplicationStatusLeave.php'; </script>" ;// default page
        }
        else if($Type == "Advance")
        {
            echo "<script> location.href='Developer_ApplicationStatusAdvance.php'; </script>" ;// default page
        }
    }
    else
    {
        
        if($Type == 'Advance')
        {
            $sql="UPDATE advance_table SET Status='$Status' ,Active='yes' WHERE AdvanceTable_ID='$ID'";
            if(mysqli_query($con, $sql))
            {
                echo "<script> location.href='Manager_ApplicationStatusAdvance.php'; </script>" ;// default page
            }   
            else
            {
                echo "<script> location.href='Manager_ApplicationStatusAdvance.php'; </script>" ;// default page
            }
        }

        if($Type == 'Loan')
        {
            $sql="UPDATE loan_table SET Status='$Status', Active='yes' WHERE LoanTable_ID='$ID'";
            if(mysqli_query($con, $sql))
            {
                echo "<script> location.href='Manager_ApplicationStatusLoan.php'; </script>" ;// default page
            }   
            else
            {
                echo "<script> location.href='Manager_ApplicationStatusLoan.php'; </script>" ;// default page
            }
        }

        if($Type == 'Leave')
        {
            $sql="SELECT * FROM leave_table WHERE LeaveTable_ID='$ID'";
            if($run_query = mysqli_query($con, $sql))
            {
                $row = mysqli_fetch_array($run_query);
                $DevID = $row["Developer_ID"];
                $sql="SELECT * FROM developer_info WHERE Developer_ID='$DevID'";
                if($run_query = mysqli_query($con, $sql))
                {
                    $row1 = mysqli_fetch_array($run_query);
                    if($row1['Total_Leave_Days'] >= $row1['Leave_Days_Used'] + $row['NumberOfDays'])
                    {
                        $sql="UPDATE leave_table SET Status='$Status' WHERE LeaveTable_ID='$ID'";
                        if(mysqli_query($con, $sql))
                        {
                            $NewLeaveDays =  $row1['Leave_Days_Used'] + $row['NumberOfDays'];
                            $sql="UPDATE developer_info SET Leave_Days_Used='$NewLeaveDays' WHERE Developer_ID='$DevID'";
                            if(mysqli_query($con, $sql))
                            {
                                echo "<script> location.href='Manager_ApplicationStatusLeave.php'; </script>" ;// default page
                            }   
                            else
                            {
                                echo "<script> location.href='Manager_ApplicationStatusLeave.php'; </script>" ;// default page
                            }
                        }   
                        else
                        {
                            echo "<script> location.href='Manager_ApplicationStatusLeave.php'; </script>" ;// default page
                        }
                    }
                    else
                    {
                        echo "<script> location.href='Manager_ApplicationStatusLeave.php'; </script>" ;// default page
                    }

                }
                else
                {
                    echo "<script> location.href='Manager_ApplicationStatusLeave.php'; </script>" ;// default page
                }
            }   
            else
            {
                echo "<script> location.href='Developer_ApplicationStatusLeave.php'; </script>" ;// default page
            }
        }
        
    }