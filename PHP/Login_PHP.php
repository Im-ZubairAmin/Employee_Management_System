<?php
    session_start();
    include "Connection.php";
?>

<?php

    $Email =  $_REQUEST['Email'];
    $Password = $_REQUEST['Password'];
    $UserType = $_REQUEST['UserType'];

    if(empty($Email) || empty($Password))
    {
        $_SESSION['Error'] = "One of the Fields is Empty!";
        echo "<script> location.href='Login.php'; </script>" ;// Field Empty
    }
    else
    {   
        $sql = "";
        if($UserType == "Admin")
        {
            $sql = "SELECT * FROM admin_info where Email='$Email' and Password='$Password'";
            $run_query = mysqli_query($con,$sql);

	        $count = mysqli_num_rows($run_query);
            $row = mysqli_fetch_array($run_query);

            if($count == 1)
            {
                $_SESSION["uid"] = $row["Admin_ID"];
			    $_SESSION["fname"] = $row["First_Name"];
                $_SESSION["lname"] = $row["Last_Name"];
                

                $sql = "SELECT * FROM manager_info";
                $run_query = mysqli_query($con,$sql);
                while($rw = mysqli_fetch_array($run_query))
                {
                    $DateOfBirth = $rw['DateOfBirth'];
                    $ID = $rw['Manager_ID'];
                    $current_date = date("Y-m-d");
                    $dateDifference = abs(strtotime($current_date) - strtotime($DateOfBirth));
                    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                    
                    if($years > 65)
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
                            $Type = "Manager";
         
                            $sql = "INSERT INTO retired_employees (First_Name, Last_Name,
                            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfRetiring, DateOfJoining,
                            Email) VALUES ('$FN','$LN','$Phone',
                            '$Address','$CNIC','$Type','$Gender','$current_date','$DOJ','$Email')";
            
                            if($result = mysqli_query($con, $sql))
                            {
                                $sql = "DELETE FROM manager_info WHERE Manager_ID='$ID'";
                                if($result = mysqli_query($con, $sql))
                                {
                                }
                            }
                        }
                    }

                }

                $sql = "SELECT * FROM developer_info";
                $run_query = mysqli_query($con,$sql);
                while($rw = mysqli_fetch_array($run_query))
                {
                    $DateOfBirth = $rw['DateOfBirth'];
                    $ID = $rw['Developer_ID'];
                    $current_date = date("Y-m-d");
                    $dateDifference = abs(strtotime($current_date) - strtotime($DateOfBirth));
                    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                    
                    if($years > 65)
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
                            $Type = "Developer";
         
                            $sql = "INSERT INTO retired_employees (First_Name, Last_Name,
                            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfRetiring, DateOfJoining,
                            Email) VALUES ('$FN','$LN','$Phone',
                            '$Address','$CNIC','$Type','$Gender','$current_date','$DOJ','$Email')";
            
                            if($result = mysqli_query($con, $sql))
                            {
                                $sql = "DELETE FROM developer_info WHERE Developer_ID='$ID'";
                                if($result = mysqli_query($con, $sql))
                                {
                                }
                            }
                        }
                    }

                }


                $sql = "SELECT * FROM admin_info";
                $run_query = mysqli_query($con,$sql);
                while($rw = mysqli_fetch_array($run_query))
                {
                    $DateOfBirth = $rw['DateOfBirth'];
                    $ID = $rw['Admin_ID'];
                    $current_date = date("Y-m-d");
                    $dateDifference = abs(strtotime($current_date) - strtotime($DateOfBirth));
                    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                    
                    if($years > 65)
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
                            $Type = "Admin";
         
                            $sql = "INSERT INTO retired_employees (First_Name, Last_Name,
                            Phone_Number, Address, CNIC, TypeOfEmployee, Gender, DateOfRetiring, DateOfJoining,
                            Email) VALUES ('$FN','$LN','$Phone',
                            '$Address','$CNIC','$Type','$Gender','$current_date','$DOJ','$Email')";
            
                            if($result = mysqli_query($con, $sql))
                            {
                                $sql = "DELETE FROM admin_info WHERE Admin_ID='$ID'";
                                if($result = mysqli_query($con, $sql))
                                {
                                }
                            }
                        }
                    }

                }

                echo "<script> location.href='Admin_Dashboard.php'; </script>" ;// default page
            }
            else
            {
                $_SESSION['Error'] = "Email and Password does not match any Admin!";
                echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
            }
        }
        else if($UserType == "Manager")
        {
            $sql = "SELECT * FROM manager_info where Email='$Email' and Password='$Password'";
            $run_query = mysqli_query($con,$sql);

	        $count = mysqli_num_rows($run_query);
            $row = mysqli_fetch_array($run_query);

            if($count == 1)
            {
                $_SESSION["uid"] = $row["Manager_ID"];
			    $_SESSION["fname"] = $row["First_Name"];
                $_SESSION["lname"] = $row["Last_Name"];
                $ID = $_SESSION["uid"];

                $sql="SELECT * FROM manager_info WHERE Manager_ID='$ID'";
                $run_query = mysqli_query($con,$sql);
                $devcount = mysqli_num_rows($run_query);
                $devdata = mysqli_fetch_array($run_query);

                $Bonus = $devdata['Bonus'];
                if($Bonus > 0)
                {
                    $BonusMonth = $devdata['BonusMonth'];
                    $current_date = date("Y-m-d");
                    $days = (new DateTime("$BonusMonth"))->diff(new DateTime("$current_date"))->days;

                    if($days > 30)
                    {
                        $sql="UPDATE manager_info SET Bonus ='0' and BonusMonth= NULL WHERE Manager_ID='$ID'";
                        if(mysqli_query($con,$sql))
                        {
                            
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                }

                $sql="SELECT * FROM loan_table WHERE Manager_ID='$ID' and Developer_ID='-1' and Status='Accepted' and Active='yes'";
                $run_query = mysqli_query($con,$sql);
                $loancount = mysqli_num_rows($run_query);
                $loandata = mysqli_fetch_array($run_query);
                
                $sql="SELECT * FROM advance_table WHERE  Manager_ID='$ID' and Developer_ID='-1' and Status='Accepted' and Active='yes'";
                $run_query = mysqli_query($con,$sql);
                $count = mysqli_num_rows($run_query);
                $row = mysqli_fetch_array($run_query);

                if($count > 0)
                {
                    $StartDate = $row['DateApplied'];
                    $current_date = date("Y-m-d");
                    $days = (new DateTime("$StartDate"))->diff(new DateTime("$current_date"))->days;

                    if($days > 30)
                    {
                        $sql="UPDATE advance_table SET Active='no' WHERE  Manager_ID='$ID' and Developer_ID='-1' and Active='yes'";
                        if(mysqli_query($con,$sql))
                        {
                            if($loancount == 0)
                            {
                                echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                            }
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                    else
                    {
                        echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                    }
                }
                
                if($loancount > 0)
                {
                    $StartDate = $loandata['DateApplied'];
                    $TimePeriod = $loandata['TimePeriod'];
                    $current_date = date("Y-m-d");

                    
                    $d1=new DateTime($StartDate); 
                    $d2=new DateTime($current_date);                                  
                    $Months = $d2->diff($d1); 
                    $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
                    if($howeverManyMonths >= $loandata['TimePeriod'])
                    {
                        $sql="UPDATE loan_table SET Active='no' WHERE  Manager_ID='$ID' and Developer_ID='-1' and Active='yes'";
                        if(mysqli_query($con,$sql))
                        {
                            echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                    else
                    {
                        echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                    }
                }
                
                if($count == 0 && $loancount == 0)
                {
                    echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "Email and Password does not match any Manager!";
                echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
            }
        }
        else if($UserType == "Developer")
        {
            $sql = "SELECT * FROM developer_info where Email='$Email' and Password='$Password'";
            $run_query = mysqli_query($con,$sql);

	        $count = mysqli_num_rows($run_query);
            $row = mysqli_fetch_array($run_query);

            if($count == 1)
            {
                $_SESSION["uid"] = $row["Developer_ID"];
			    $_SESSION["fname"] = $row["First_Name"];
                $_SESSION["lname"] = $row["Last_Name"];
                $ID = $_SESSION["uid"];

                $sql="SELECT * FROM developer_info WHERE Developer_ID='$ID'";
                $run_query = mysqli_query($con,$sql);
                $devcount = mysqli_num_rows($run_query);
                $devdata = mysqli_fetch_array($run_query);

                $Bonus = $devdata['Bonus'];
                if($Bonus > 0)
                {
                    $BonusMonth = $devdata['BonusMonth'];
                    $current_date = date("Y-m-d");
                    $days = (new DateTime("$BonusMonth"))->diff(new DateTime("$current_date"))->days;

                    if($days > 30)
                    {
                        $sql="UPDATE developer_info SET Bonus ='0' and BonusMonth= NULL WHERE Developer_ID='$ID'";
                        if(mysqli_query($con,$sql))
                        {
                            
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                }
                
                   
                $sql="SELECT * FROM loan_table WHERE Developer_ID='$ID' and Status='Accepted' and Active='yes'";
                $run_query = mysqli_query($con,$sql);
                $loancount = mysqli_num_rows($run_query);
                $loandata = mysqli_fetch_array($run_query);
                
                $sql="SELECT * FROM advance_table WHERE Developer_ID='$ID' and Status='Accepted' and Active='yes'";
                $run_query = mysqli_query($con,$sql);
                $count = mysqli_num_rows($run_query);
                $row = mysqli_fetch_array($run_query);

                if($count > 0)
                {
                    $StartDate = $row['DateApplied'];
                    $current_date = date("Y-m-d");
                    $days = (new DateTime("$StartDate"))->diff(new DateTime("$current_date"))->days;

                    if($days > 30)
                    {
                        $sql="UPDATE advance_table SET Active='no' WHERE Developer_ID='$ID' and Active='yes'";
                        if(mysqli_query($con,$sql))
                        {
                            if($loancount == 0)
                            {
                                echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
                            }
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                    else
                    {
                        echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
                    }
                }
                
                if($loancount > 0)
                {
                    $StartDate = $loandata['DateApplied'];
                    $TimePeriod = $loandata['TimePeriod'];
                    $current_date = date("Y-m-d");

                    
                    $d1=new DateTime($StartDate); 
                    $d2=new DateTime($current_date);                                  
                    $Months = $d2->diff($d1); 
                    $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
                    if($howeverManyMonths >= $loandata['TimePeriod'])
                    {
                        $sql="UPDATE loan_table SET Active='no' WHERE Developer_ID='$ID' and Active='yes'";
                        if(mysqli_query($con,$sql))
                        {
                            echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
                        }
                        else
                        {
                            echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
                        }

                    }
                    else
                    {
                        echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
                    }
                }
                
                if($count == 0 && $loancount == 0)
                {
                    echo "<script> location.href='Developer_Dashboard.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "Email and Password does not match any Developer!";
                echo "<script> location.href='Login.php'; </script>" ;//  No user exists or more than one exsists
            }
        }

	    
    }
?>