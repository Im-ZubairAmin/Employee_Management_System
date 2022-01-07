<?php
    session_start();
    include "Connection.php";
?>

<?php
    $typeofemployee =  $_REQUEST['TypeOfEmployee'];
    $Type = $_REQUEST['Type'];

    if($Type == "Increment")
    {
        $Increase = $_REQUEST['Increase'];

            if($typeofemployee == "Developer")
            {
                $sql="SELECT * FROM developer_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Developer_ID'];
                        $Salary = $row['Salary'];

                        if($Increase > 0)
                        {
                            $Salary = $Salary + ($Salary * ($Increase/100));
                        }
                        else
                        {
                            $Increase = $Increase * -1;
                            $Salary = $Salary - ($Salary * ($Increase/100));
                        }

                        $sql="UPDATE developer_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Admin")
            {
                $sql="SELECT * FROM admin_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Admin_ID'];
                        $Salary = $row['Salary'];

                        if($Increase > 0)
                        {
                            $Salary = $Salary + ($Salary * ($Increase/100));
                        }
                        else
                        {
                            $Increase = $Increase * -1;
                            $Salary = $Salary - ($Salary * ($Increase/100));
                        }

                        $sql="UPDATE admin_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Manager")
            {
                $sql="SELECT * FROM manager_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Manager_ID'];
                        $Salary = $row['Salary'];

                        if($Increase > 0)
                        {
                            $Salary = $Salary + ($Salary * ($Increase/100));
                        }
                        else
                        {
                            $Increase = $Increase * -1;
                            $Salary = $Salary - ($Salary * ($Increase/100));
                        }

                        $sql="UPDATE manager_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }
    }
    else if ($Type == "Cash")
    {
        $SalaryAdd = $_REQUEST['SalaryIncrease'];
        if($SalaryAdd >= -100000 && $SalaryAdd <= 100000)
        {

            if($typeofemployee == "Developer")
            {
                $sql="SELECT * FROM developer_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Developer_ID'];
                        $Salary = $row['Salary'];

                        $Salary = $Salary + $SalaryAdd;

                        $sql="UPDATE developer_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Admin")
            {
                $sql="SELECT * FROM admin_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Admin_ID'];
                        $Salary = $row['Salary'];

                        $Salary = $Salary + $SalaryAdd;

                        $sql="UPDATE admin_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }

            if($typeofemployee == "Manager")
            {
                $sql="SELECT * FROM manager_info";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if($count > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $ID = $row['Manager_ID'];
                        $Salary = $row['Salary'];

                        $Salary = $Salary + $SalaryAdd;


                        $sql="UPDATE manager_info SET Salary ='$Salary'";
                        if($result = mysqli_query($con, $sql))
                        {
                            $_SESSION['Sucess'] = "Increment Applied!";
                            echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
                        }
                    }
                } 
                else{
                    $_SESSION['Error'] = "Increment could not be applied";
                    echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
                }
            }
        }
        else{
            $_SESSION['Error'] = "Enter a valid salary increase value";
            echo "<script> location.href='Admin_SalaryIncrease.php'; </script>" ;// default page
        }
    }
?>