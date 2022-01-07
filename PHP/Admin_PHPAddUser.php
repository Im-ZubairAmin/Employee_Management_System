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
    $manager = $_REQUEST['Manager'];
    $salary = $_REQUEST['Salary'];
    $gender =  $_REQUEST['Gender'];
    $leavedays =  $_REQUEST['LeaveDays'];
    $type_of_employee = $_REQUEST['TypeOfEmployee'];
    $password = $_REQUEST['password'];
    $repassword = $_REQUEST['password1'];
    $jobtitle = $_REQUEST['JobTitle'];
    $current_date = date("Y-m-d");
    $leave_days_used = 0;

    if(empty($first_name)||empty($last_name)||empty($email)||empty($phone_number)||empty($cnic)||empty($dob)|empty($address)||
    empty($manager)||empty($salary)||empty($gender)||empty($leavedays)||empty($type_of_employee)||empty($password)||empty($jobtitle))
    {
        $_SESSION['Error'] = "Input fields are empty";
        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
    }
    else
    {
    if( $password == $repassword)
    {
        if(strlen($cnic) == 13){
            
            if(strlen($phone_number) == 11){

                
                   
                $sql = "SELECT * FROM admin_info where CNIC='$cnic' or Email='$email'";
                $check_query = mysqli_query($con, $sql);
                $count_admin = mysqli_num_rows($check_query);

                if($count_admin == 0)
                {
                    $sql = "SELECT * FROM manager_info where CNIC='$cnic' or Email='$email'";
                    $check_query = mysqli_query($con, $sql);
                    $count_manager = mysqli_num_rows($check_query);
    
                    if($count_manager == 0)
                    { 
                        $sql = "SELECT * FROM developer_info where CNIC='$cnic' or Email='$email'";
                        $check_query = mysqli_query($con, $sql);
                        $count_developer = mysqli_num_rows($check_query);
    
                        if($count_developer == 0)
                        {
                                    if($type_of_employee == "Admin" && $manager == "Not Applicable" && $jobtitle == 'Not Applicable')
                                    {
                                        $sql = "INSERT INTO admin_info (First_Name,Last_Name,Gender,Phone_Number,Email,Password,Address,CNIC,DateOfBirth,
                                        DateOfJoining,Salary,Total_Leave_Days,Leave_Days_Used)  VALUES ('$first_name', '$last_name','$gender','$phone_number',
                                        '$email','$password','$address','$cnic','$dob','$current_date','$salary','$leavedays','$leave_days_used')";

                                        if(mysqli_query($con, $sql))
                                        {
                                            $_SESSION['Sucess'] = "Admin is sucessfully added";
                                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                                
                                        } 
                                        else{
                                            echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                        }
                                    }
                                    else if($type_of_employee == "Admin" && ($manager != "Not Applicable" || $jobtitle != 'Not Applicable'))
                                   
                                    {
                                        $_SESSION['Error'] = "A Admin should not be assigned a Manager or a Job Title";
                                        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                    }
                                    
                                    if($type_of_employee == "Manager" && $manager == "Not Applicable" && $jobtitle == "Not Applicable")
                                    {
                                        $sql = "INSERT INTO manager_info (First_Name,Last_Name,Gender,Phone_Number,Email,Password,Address,CNIC,DateOfBirth,
                                        DateOfJoining,Salary,Total_Leave_Days,Leave_Days_Used,Bonus,BonusMonth)  VALUES ('$first_name', '$last_name','$gender','$phone_number',
                                        '$email','$password','$address','$cnic','$dob','$current_date','$salary','$leavedays','$leave_days_used',0,NULL)";

                                        if(mysqli_query($con, $sql))
                                        {
                                            $_SESSION['Sucess'] = "Manager is sucessfully added";
                                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                                
                                        } 
                                        else{
                                            $_SESSION['Error'] = "A Manager should not be assigned a Manager or a Job Title";
                                            echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                        }
                                    }
                                    else if($type_of_employee == "Manager" && ($manager != "Not Applicable" || $jobtitle != "Not Applicable"))
                                    {
                                        $_SESSION['Error'] = "A Manager should not be assigned a Manager and a Job Title";
                                        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                    }
                                    
                                    if($type_of_employee == "Developer" && $manager != "Not Applicable" && $jobtitle != 'Not Applicable')
                                    {
                                        $Total_Absent_Days = 0;
                                        $sql = "INSERT INTO developer_info (First_Name,Last_Name,Gender,Phone_Number,Email,Password,Address,CNIC,DateOfBirth,
                                        DateOfJoining,Salary,Total_Leave_Days,Leave_Days_Used,Total_Absent_Days,Manager_ID,JobTitle,Team_ID,Bonus,BonusMonth)  VALUES ('$first_name', '$last_name','$gender','$phone_number',
                                        '$email','$password','$address','$cnic','$dob','$current_date','$salary','$leavedays','$leave_days_used','$Total_Absent_Days','$manager','$jobtitle',0,0,NULL)";

                                        if(mysqli_query($con, $sql))
                                        {
                                            $_SESSION['Sucess'] = "Developer is sucessfully added";
                                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                                
                                        } 
                                        else{
                                            echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                        }
                                    }
                                    else if($type_of_employee == "Developer" && ($manager == "Not Applicable" || $jobtitle == 'Not Applicable'))
                                    {
                                        $_SESSION['Error'] = "A Developer should be assigned a Job Title and a Manager";
                                        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                                    }
                                
                            
                        }
                        else
                        {
                            $_SESSION['Error'] = "A Developer with same Email or CNIC exists already!";
                            echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                        }
                    }
                    else
                    {
                        $_SESSION['Error'] = "A Manager with same Email or CNIC exists already!";
                        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                    }
                }
                else
                {
                    $_SESSION['Error'] = "An Admin with same Email or CNIC exists already!";
                    echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
                }  
            }
            else
            {
                $_SESSION['Error'] = "Phone Number should be a 11 digit number";
                echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "CNIC should be a 13 digit number without '-' ";
            echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
        }
    }
    else
    {
        $_SESSION['Error'] = "Password and Re-enter password should match";
        echo "<script> location.href='Admin_AddUser.php'; </script>" ;// default page
    }
    }
?>