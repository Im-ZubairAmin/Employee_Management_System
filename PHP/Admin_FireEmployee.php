<?php
    session_start();
    include "Connection.php";
?>

<?php
    
    $EmployeeType = $_GET['Type'];
    $ID = $_GET['ID'];

    if($EmployeeType == "Admin")
    {
        $sql = "SELECT First_Name, Last_Name, Gender, Phone_Number,Email, Address, CNIC,DateOfJoining  FROM admin_info WHERE Admin_ID='$ID'";
        
        if($data = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_array($data);
            $FN = $row['First_Name'];
            $LN = $row['Last_Name'];
            $Gender = $row['Gender'];
            $Phone = $row['Phone_Number'];
            $Email = $row['Email'];
            $Address = $row['Address'];
            $CNIC = $row['CNIC'];
            $DOJ = $row['DateOfJoining'];
            $current_date = date("Y-m-d");
         

            $sql = "INSERT INTO fired_employees (First_Name, Last_Name,
            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfJoining,
            DateOfFiring, Email) VALUES ('$FN','$LN','$Phone',
            '$Address','$CNIC','$EmployeeType','$Gender','$DOJ','$current_date','$Email')";
            
            if($result = mysqli_query($con, $sql))
            {
                $sql = "DELETE FROM admin_info WHERE Admin_ID='$ID'";
                if($result = mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Admin has been Fired!";
                    echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                }
                else
                {
                    echo "ERROR 1";
                    echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
                }
            }
            else
            {
                echo "ERROR 2";
                echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
            }
        }
        else
        {
            echo "ERROR 3";
            echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
        }
    }

    if($EmployeeType == "Manager")
    {
        $sql = "SELECT First_Name, Last_Name, Gender, Phone_Number,Email, Address, CNIC,DateOfJoining  FROM manager_info WHERE Manager_ID='$ID'";
        
        if($data = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_array($data);
            $FN = $row['First_Name'];
            $LN = $row['Last_Name'];
            $Gender = $row['Gender'];
            $Phone = $row['Phone_Number'];
            $Email = $row['Email'];
            $Address = $row['Address'];
            $CNIC = $row['CNIC'];
            $DOJ = $row['DateOfJoining'];
            $current_date = date("Y-m-d");
         
            $sql = "INSERT INTO fired_employees (First_Name, Last_Name,
            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfJoining,
            DateOfFiring, Email) VALUES ('$FN','$LN','$Phone',
            '$Address','$CNIC','$EmployeeType','$Gender','$DOJ','$current_date','$Email')";
            
            if($result = mysqli_query($con, $sql))
            {
                $sql = "DELETE FROM manager_info WHERE Manager_ID='$ID'";
                if($result = mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Manager has been Fired!";
                    echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                }
                else
                {
                    echo "ERROR 1";
                    echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
                }
            }
            else
            {
                echo "ERROR 2";
                echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
            }
        }
        else
        {
            echo "ERROR 3";
            echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
        }
    }

    if($EmployeeType == "Developer")
    {
        $sql = "SELECT First_Name, Last_Name, Gender, Phone_Number,Email, Address, CNIC,DateOfJoining  FROM developer_info WHERE Developer_ID='$ID'";
        
        if($data = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_array($data);
            $FN = $row['First_Name'];
            $LN = $row['Last_Name'];
            $Gender = $row['Gender'];
            $Phone = $row['Phone_Number'];
            $Email = $row['Email'];
            $Address = $row['Address'];
            $CNIC = $row['CNIC'];
            $DOJ = $row['DateOfJoining'];
            $current_date = date("Y-m-d");
         
            
            $sql = "INSERT INTO fired_employees (First_Name, Last_Name,
            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfJoining,
            DateOfFiring, Email) VALUES ('$FN','$LN','$Phone',
            '$Address','$CNIC','$EmployeeType','$Gender','$DOJ','$current_date','$Email')";
            
            if($result = mysqli_query($con, $sql))
            {
                $sql = "DELETE FROM developer_info WHERE Developer_ID='$ID'";
                if($result = mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Developer has been Fired!";
                    echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                }
                else
                {
                    echo "ERROR 1";
                    echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
                }
            }
            else
            {
                echo "ERROR 2";
                echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
            }
        }
        else
        {
            echo "ERROR 3";
            echo "<script> location.href='Admin_EmployeeDetails.php?ID=".$ID."&Type=".$EmployeeType."'; </script>" ;// default page
        }
    }
?>