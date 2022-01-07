<?php
    session_start();
    include "Connection.php";
?>

<?php
    
    $EmployeeType = $_GET['Type'];
    $ID = $_GET['ID'];
    
    if($EmployeeType == "Developer")
    {
        $sql = "SELECT * FROM developer_info WHERE Developer_ID='$ID'";
        $result = mysqli_query($con, $sql);
        $Developer = mysqli_fetch_array($result);

        $Fname = $Developer['First_Name'];
        $Lname = $Developer['Last_Name'];
        $Email = $Developer['Email'];
        $CNIC = $Developer['CNIC'];
        $Address = $Developer['Address'];
        $PhoneNumber = $Developer['Phone_Number'];
        $DateOfBirth = $Developer['DateOfBirth'];
        $Salary = $Developer['Salary'];
        $Password = $Developer['Password'];
        $LeaveDays = $Developer['Total_Leave_Days'];
        $LeaveDaysUsed = $Developer['Leave_Days_Used'];
        $JobTitle = $Developer['JobTitle'];
        $Gender = $Developer['Gender'];
        $DateOfJoining = $Developer['DateOfJoining'];
        $OldManager = $Developer['Manager_ID'];
       
        $sql = "SELECT * FROM manager_info WHERE Email='$Email'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 0)
        {

            $sql = "SELECT * FROM manager_info WHERE CNIC='$CNIC'";
            $result1 = mysqli_query($con, $sql);
            $count1 = mysqli_num_rows($result1);

            if($count1 == 0)
            {

                $sql = "INSERT INTO manager_info (First_Name, Last_Name,
                Gender, Phone_Number, Email, Password, Address, CNIC, DateOfBirth,
                DateOfJoining, Salary, Total_Leave_Days, Leave_Days_Used) VALUES
                ('$Fname','$Lname','$Gender','$PhoneNumber','$Email',
                '$Password','$Address','$CNIC','$DateOfBirth','$DateOfJoining','$Salary',
                '$LeaveDays','$LeaveDaysUsed')";
                if(mysqli_query($con, $sql))
                {
                    $sql = "DELETE FROM developer_info WHERE Developer_ID='$ID'";
                    if($result = mysqli_query($con, $sql))
                    {
                        $_SESSION['Sucess'] = "Developer has been promoted to Manager";
                        echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                    } 
                    else{
                        echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
                    }
                }
                else
                {
                    echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
                }
                
            }
            else
            {
                $_SESSION['Error'] = "A Manager exsists with the CNIC number of the Developer";
                echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
            }
            
        }
        else
        {
            $_SESSION['Error'] = "A Manager exsists with the Email of the Developer";
            echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
        }
        
        
    }
    else
    {
        echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
    }
    
?>