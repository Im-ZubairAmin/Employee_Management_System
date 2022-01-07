<?php
    session_start();
    include "Connection.php";
?>

<?php

    $employeeid =  $_REQUEST['EmployeeID'];
    $fname = $_REQUEST['FName'];
    $lname = $_REQUEST['LName'];
    $email = $_REQUEST['Email'];
    $typeofemployee =  $_REQUEST['TypeOfEmployee'];
    $methodsearch = $_REQUEST['MethodSearch'];
    $current_date = date("Y-m-d");

    if(empty($employeeid) && (empty($fname)&&empty($lname)) && empty($email))
    {
        $_SESSION['Error'] = "All Input fields are empty!"; 
        echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
    }
    else
    {
        if($methodsearch =="EmployeeID")
        {

            if(empty($employeeid))
            {
                $_SESSION['Error'] = "Input field for Employee ID is empty!"; 
                echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
            }
            else
            {
            if($typeofemployee == "Developer")
            {
                $sql="SELECT * FROM developer_info WHERE Developer_ID ='$employeeid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Developer";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Developer with that ID exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Admin")
            {
                $sql="SELECT * FROM admin_info WHERE Admin_ID ='$employeeid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Admin";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Admin with that ID exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Manager")
            {
                $sql="SELECT * FROM manager_info WHERE Manager_ID ='$employeeid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Manager";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Manager with that ID exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }
            }
        }

        if($methodsearch =="EmployeeName")
        {
            if(empty($fname) || empty($lname))
            {
                $_SESSION['Error'] = "Input fields for First Name or Last Name are empty!"; 
                echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
            }
            else
            {
            if($typeofemployee == "Developer")
            {
                $sql="SELECT * FROM developer_info WHERE First_Name ='$fname' and Last_Name='$lname'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Developer";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Developer with that Name exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Admin")
            {
                $sql="SELECT * FROM admin_info WHERE First_Name ='$fname' and Last_Name='$lname'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Admin";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Admin with that Name exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Manager")
            {
                $sql="SELECT * FROM manager_info WHERE First_Name ='$fname' and Last_Name='$lname'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Manager";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Manager with that Name exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }
            }
        }

        if($methodsearch =="EmployeeEmail")
        {
            if(empty($email))
            {
                $_SESSION['Error'] = "Input field for Email is empty!"; 
                echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
            }
            else
            {
            if($typeofemployee == "Developer")
            {
                $sql="SELECT * FROM developer_info WHERE Email ='$email'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Developer";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Developer with that Email exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Admin")
            {
                $sql="SELECT * FROM admin_info WHERE Email ='$email'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Admin";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Admin with that Email exists!";
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Manager")
            {
                $sql="SELECT * FROM manager_info WHERE Email ='$email'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    $_SESSION['Admin_Query'] = $sql; 
                    $_SESSION['EmployeeType'] = "Manager";
                    echo "<script> location.href='Admin_ResultSearchUser.php'; </script>" ;// default page
                } 
                else{
                    $_SESSION['Error'] = "No Manager with that Email exists!"; 
                    echo "<script> location.href='Admin_SearchUser.php'; </script>" ;// default page
                }
            }
            }
        }
    }
?>