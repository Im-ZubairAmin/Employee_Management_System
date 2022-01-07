<?php
    session_start();
    include "Connection.php";
?>

<?php

    $email = $_REQUEST['Email'];
    $phone_number = $_REQUEST['PhoneNumber'];
    $address = $_REQUEST['Address'];
    $password = $_REQUEST['password'];
    $ID = $_SESSION['uid'];
    $type_of_employee = "Manager";

    if(empty($email)||empty($phone_number)||empty($address)||empty($password))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
    }
    else if(strlen($phone_number) == 11)
    {
        

        if($type_of_employee == "Manager" )
        {
            $sql = "SELECT * FROM manager_info where Manager_ID='$ID'";
            $check_query = mysqli_query($con, $sql);
            $count_cnic = mysqli_num_rows($check_query);
		    
            if($count_cnic == 1)
		    {
                $sql = "SELECT * FROM manager_info where Email='$email' and Manager_ID !='$ID'";
                $check_query = mysqli_query($con, $sql);
                $count_manager = mysqli_num_rows($check_query);
                if($count_manager == 0)
                {
                    $sql = "SELECT * FROM developer_info where Email='$email'";
                    $check_query = mysqli_query($con, $sql);
                    $count_developer = mysqli_num_rows($check_query);
                    if($count_developer == 0)
                    {
                        $sql = "SELECT * FROM admin_info where Email='$email'";
                        $check_query = mysqli_query($con, $sql);
                        $count_admin = mysqli_num_rows($check_query);
                        if($count_admin == 0)
                        {
                            $sql="UPDATE manager_info SET Phone_Number='$phone_number',Email='$email',Password='$password',Address='$address'
                            WHERE Manager_ID='$ID'";

                            if(mysqli_query($con, $sql))
                            {
                                $_SESSION['Sucess'] = "Your personal information has been updated";
                                echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                            } 
                            else{
                                echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
                            }
                        }
                        else
                        {
                            $_SESSION['Error'] = "This Email is already associated with another Admin!";
                            echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
                        }
                    }
                    else
                    {
                        $_SESSION['Error'] = "This Email is already associated with another Developer!";
                        echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
                    }
                }
                else
                {
                    $_SESSION['Error'] = "This Email is already associated with another Manager!";
                    echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
                }
            }
        }
    }
    else
    {
        $_SESSION['Error'] = "Phone Number should be of 11 digits!";
        echo "<script> location.href='Manager_UpdatePersonalDetails.php'; </script>" ;// default page
    }
?>