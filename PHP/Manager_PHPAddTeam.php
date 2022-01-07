<?php
    session_start();
    include "Connection.php";
?>

<?php
    $team_name =  $_REQUEST['TeamName'];
    $Project =  $_REQUEST['Project'];

    if(empty($team_name) || empty($Project))
    {
        $_SESSION['Error'] = "All Input fields are not complete!";
        echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
    }
    else
    {
        $sql = "SELECT * FROM teams_info WHERE TeamName='$team_name'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 0 && isset($_SESSION["uid"]))
        {
            if($Project != "Not Applicable")
            {
                $ManagerID = $_SESSION["uid"];
                $sql = "INSERT INTO teams_info (TeamName,Manager_ID,Project_ID) VALUES ('$team_name','$ManagerID','$Project')";
                if(mysqli_query($con, $sql))
                {
                
                    $sql = "UPDATE project_info SET Status='Assigned' WHERE Project_id = '$Project'";
                    if(mysqli_query($con, $sql))
                    {
                        $_SESSION['Sucess'] = "Team Sucesfully Added!";
                        echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
                    }
                    else{
                        echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
                    }
               

                }
                 
                else{
                    echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
                }
            }
        
            else 
            {
                $_SESSION['Error'] = "Can not assign a team to invalid project";
                echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "A team with same name already exists!";
            echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
        }
    }
?>
