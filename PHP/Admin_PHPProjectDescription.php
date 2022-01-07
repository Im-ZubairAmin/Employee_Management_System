<?php
    session_start();
    include "Connection.php";
?>

<?php
    $Project =  $_REQUEST['Project'];

    if(empty($Project))
    {
        $_SESSION['Error'] = "Job Title not entered!";
        echo "<script> location.href='Admin_AddJobTitle.php'; </script>" ;// default page
    }
    else
    {
        $sql = "SELECT * FROM  teams_info WHERE Project_ID = '$Project'";
        if($result = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_array($result);
            $TeamID = $row['Team_ID'];
            
            $NewID = 0;
            $sql="UPDATE developer_info SET Team_ID='$NewID' WHERE Team_ID = '$TeamID'";
            if(mysqli_query($con, $sql))
            {
                $sql = "DELETE FROM teams_info WHERE Team_ID='$TeamID'";
                if(mysqli_query($con, $sql))
                {
                    $sql = "UPDATE project_info SET Status='Completed' WHERE Project_ID = '$Project'";
                    if(mysqli_query($con, $sql))
                    {
                        $_SESSION['Sucess'] = "Project status upgraded to completed!";
                        echo "<script> location.href='Admin_ProjectDetails.php'; </script>" ;// default page
                    } 
                    else{
                        echo "<script> location.href='Admin_ProjectDetails.php'; </script>" ;// default page
                    }
                }
            }
        }
    }
   
    
?>
