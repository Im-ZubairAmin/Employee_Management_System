<?php
    session_start();
    include "Connection.php";
?>

<?php

    $Amount =  $_REQUEST['Amount'];
    $type_of_employee = $_REQUEST['EmployeeType'];
    $ID = $_REQUEST['ID'];
    $BonusDate = $_REQUEST['dateofBonus'];

    if(empty($Amount)||empty($type_of_employee)||empty($ID)||empty($BonusDate))
    {
        $_SESSION['Error'] = "All input fields are not complete!";

        echo "<script> location.href='Manager_GiveBonus.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
    }
    else
    {
        if($type_of_employee == "Developer" )
        {
            $sql="UPDATE developer_info SET Bonus='$Amount',BonusMonth='$BonusDate' WHERE Developer_ID='$ID'";

            if(mysqli_query($con, $sql))
            {
                $_SESSION['Sucess'] = "Bonus given to the Developer!";

                echo "<script> location.href='Manager_Dashboard.php'; </script>" ;// default page
            } 
            else{
                echo "<script> location.href='Manager_GiveBonus.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
            }
        }
        else
        {
            echo "<script> location.href='Manager_GiveBonus.php?ID=".$ID."&Type=Developer'; </script>" ;// default page
        }
    }
    

?>