<?php
    session_start();
    include "Connection.php";
?>

<?php

    $first_name =  $_REQUEST['firstname'];
    $last_name = $_REQUEST['lastname'];
    $email = $_REQUEST['Email'];
    $phone_number = $_REQUEST['PhoneNumber'];
    $cnic = $_REQUEST['cnic'];
    $dob = $_REQUEST['dateofbirth'];
    $address = $_REQUEST['Address'];
    
    $salary = $_REQUEST['Salary'];
    $gender =  $_REQUEST['Gender'];
    $leavedays =  $_REQUEST['LeaveDays'];
    $type_of_employee = $_REQUEST['EmployeeType'];
    $password = $_REQUEST['password'];
    $ID = $_REQUEST['ID'];
    $current_date = date("Y-m-d");
    $leave_days_used = 0;

    if(empty($first_name)||empty($last_name)||empty($email)||empty($phone_number)||empty($cnic)||empty($dob)||empty($address)||
    empty($salary)||empty($gender)||empty($leavedays)||empty($type_of_employee)||empty($password))
    {
        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
    }
    else if(strlen($cnic) == 13 && strlen($phone_number) == 11)
    {
        if($type_of_employee == "Developer" )
        {
            $sql = "SELECT * FROM developer_info where CNIC='$cnic'and Email='$email'";
            $check_query = mysqli_query($con, $sql);
            $count_cnic = mysqli_num_rows($check_query);
		    
            if($count_cnic == 1)
		    {
                $manager = $_REQUEST['Manager'];
                $oldManager = $_REQUEST['OldManager'];
                $jobtitle = $_REQUEST['JobTitle'];

                if($manager != "Not Applicable" && $jobtitle !="Not Applicable")
                {
                    if($manager == $oldManager)
                    {
                        $sql="UPDATE developer_info SET First_Name='$first_name',Last_Name='$last_name',
                        Gender='$gender',Phone_Number='$phone_number',Email='$email',Password='$password',Address='$address',
                        CNIC='$cnic',DateOfBirth='$dob',Salary='$salary',
                        Total_Leave_Days='$leavedays',
                        JobTitle='$jobtitle' WHERE Developer_ID='$ID'";

                        if(mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Developer information has been updated";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        } 
                        else{
                            echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
                        }
                    }
                    else
                    {
                        $Team_id = 0;
                        $sql="UPDATE developer_info SET First_Name='$first_name',Last_Name='$last_name',
                        Gender='$gender',Phone_Number='$phone_number',Email='$email',Password='$password',Address='$address',
                        CNIC='$cnic',DateOfBirth='$dob',Salary='$salary',
                        Total_Leave_Days='$leavedays',Manager_ID='$manager',
                        JobTitle='$jobtitle',Team_ID='$Team_id' WHERE Developer_ID='$ID'";

                        if(mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Developer information has been updated";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        } 
                        else{
                            echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
                        }
                    }
                }
                else
                {
                    $_SESSION['Error'] = "Developer must be assigned a Manager and a Job title";
                    
                    echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
                }
            }
        }

        if($type_of_employee == "Manager" )
        {
            $sql = "SELECT * FROM manager_info where CNIC='$cnic' and Email='$email'";
            $check_query = mysqli_query($con, $sql);
            $count_cnic = mysqli_num_rows($check_query);
		    
            if($count_cnic == 1)
		    {
                    $sql="UPDATE manager_info SET First_Name='$first_name',Last_Name='$last_name',
                    Gender='$gender',Phone_Number='$phone_number',Email='$email',Password='$password',Address='$address',
                    CNIC='$cnic',DateOfBirth='$dob',Salary='$salary',
                    Total_Leave_Days='$leavedays'
                    WHERE Manager_ID='$ID'";

                    if(mysqli_query($con, $sql))
                    {
                        $_SESSION['Sucess'] = "Manager information has been updated";
                        echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                    } 
                    else{
                        echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=Manager'; </script>" ;// default page
                    }
            }
        }

        if($type_of_employee == "Admin" )
        {
            $sql = "SELECT * FROM admin_info where CNIC='$cnic' and Email='$email'";
            $check_query = mysqli_query($con, $sql);
            $count_cnic = mysqli_num_rows($check_query);
		    
            if($count_cnic == 1)
		    {
                    $sql="UPDATE admin_info SET First_Name='$first_name',Last_Name='$last_name',
                    Gender='$gender',Phone_Number='$phone_number',Email='$email',Password='$password',Address='$address',
                    CNIC='$cnic',DateOfBirth='$dob',Salary='$salary',
                    Total_Leave_Days='$leavedays'
                    WHERE Admin_ID='$ID'";

                    if(mysqli_query($con, $sql))
                    {
                        $_SESSION['Sucess'] = "Admin information has been updated";
                        echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                    } 
                    else{
                        echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=Admin'; </script>" ;// default page
                    }
            }
        }
    }
    else
    {
        $_SESSION['Error'] = "CNIC must be 13 digits and Phone Number must be 11 digits!"; 
        echo "<script> location.href='Admin_UpdateInformation.php?ID=".$ID."&Type=".$type_of_employee."'; </script>" ;// default page
    }
?>