<?php
    include "Connection.php";
?>

<?php
   $ID = $_GET['varname'];

    if(empty($ID))
    {
        echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
    }
    else
    {
        $NewID = 0;
        $sql="UPDATE developer_info SET Team_ID='$NewID' WHERE Team_ID = '$ID'";
        mysqli_query($con, $sql);

        $sql="SELECT * FROM teams_info WHERE Team_ID = '$ID'";
        if($result = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_array($result);
            $Project_ID = $row['Project_ID'];

            $sql="UPDATE project_info SET Status='Pending' WHERE Project_ID = '$Project_ID'";
            if($result = mysqli_query($con, $sql))
            {
                $sql = "DELETE FROM teams_info WHERE Team_ID='$ID'";
                if(mysqli_query($con, $sql))
                {
                    $_SESSION['Sucess'] = "Team is Deleted!";
                    echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
                } 
                else
                {
                    $_SESSION['Error'] = "Team could not be deleted!";
                    echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "Team could not be deleted!";
                echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "Team could not be deleted!";
            echo "<script> location.href='Manager_Team.php'; </script>" ;// default page
        }
    }
?>
