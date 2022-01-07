<?php
    session_start();
    include "Connection.php";
?>

<?php

    $employeeid =  $_REQUEST['EmployeeID'];
    $fname = $_REQUEST['FName'];
    $lname = $_REQUEST['LName'];
    $typeofemployee =  $_REQUEST['TypeOfEmployee'];
    $methodsearch = $_REQUEST['MethodSearch'];
    $current_date = date("Y-m-d");

    if(empty($employeeid) && (empty($fname) && empty($lname)))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Manager_SearchDeveloper.php'; </script>" ;// default page
    }
    else
    {

        if($methodsearch =="EmployeeID")
        {
            if (empty($employeeid))
            {
                $_SESSION['Error'] = "Input field of Employee ID is empty!";
                echo "<script> location.href='Manager_SearchDeveloper.php'; </script>" ;// default page
            }
            else
            {
                if($typeofemployee == "Developer")
                {
                    $sql="SELECT * FROM developer_info WHERE Developer_ID ='$employeeid'";
                    if($result = mysqli_query($con, $sql))
                    {
                        $_SESSION['Admin_Query'] = $sql; 
                        $_SESSION['EmployeeType'] = "Developer";
                        echo "<script> location.href='Manager_ResultSearchDeveloper.php'; </script>" ;// default page
                    } 
                    else{

                        echo "<script> location.href='Manager_SearchDeveloper.php'; </script>" ;// default page
                    }
                }
            }
        }

        if($methodsearch =="EmployeeName")
        {
            if (empty($fname) || empty($lname))
            {
                $_SESSION['Error'] = "Input fields of First or Last Name are empty!";
                echo "<script> location.href='Manager_SearchDeveloper.php'; </script>" ;// default page
            }
            else
            {
                if($typeofemployee == "Developer")
                {
                    $sql="SELECT * FROM developer_info WHERE First_Name ='$fname' and Last_Name='$lname'";
                    if($result = mysqli_query($con, $sql))
                    {
                        $_SESSION['Admin_Query'] = $sql; 
                        $_SESSION['EmployeeType'] = "Developer";
                        echo "<script> location.href='Manager_ResultSearchDeveloper.php'; </script>" ;// default page
                    } 
                    else{
                        echo "<script> location.href='Manager_SearchDeveloper.php'; </script>" ;// default page
                    }
                }
            }
        }
    }
?>