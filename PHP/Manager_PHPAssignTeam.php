<?php
    session_start();
    include "Connection.php";
?>

<?php

    $Team_ID =  $_REQUEST['Team'];
    $type_of_employee = $_REQUEST['EmployeeType'];
    $ID = $_REQUEST['ID'];

    if(empty($Team_ID)||empty($type_of_employee)||empty($ID))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Manager_AssignTeam.php?ID=".$ID."&Type='Developer''; </script>" ;// default page
    }
    else
    {
        if($type_of_employee == "Developer" )
        {
            $sql="UPDATE developer_info SET Team_ID='$Team_ID' WHERE Developer_ID='$ID'";

            if(mysqli_query($con, $sql))
            {
                $_SESSION['Sucess'] = "Team is assigned to the Developer";
                echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
            } 
            else{
                echo "<script> location.href='Manager_AssignTeam.php?ID=".$ID."&Type='Developer''; </script>" ;// default page
            }
        }
        else
        {
            echo "<script> location.href='Manager_AssignTeam.php?ID=".$ID."&Type='Developer''; </script>" ;// default page
        }
    }
    

?>