<?php
    session_start();
    include "Connection.php";
?>

<?php
   $Project_id = $_GET['varname'];

    if(empty($Project_id))
    {
        $_SESSION['Error'] = "All input fields are not filled!";
        echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
    }

    else
    {
        $sql = "SELECT * FROM  project_info WHERE Project_ID='$Project_id'";
        if($result = mysqli_query($con, $sql))
        { 
            $row = mysqli_fetch_array($result);
            if($row['Status'] == "Pending")
            {
                $sql = "DELETE FROM project_info WHERE Project_ID='$Project_id'";
                if(mysqli_query($con, $sql))
                {
                    $_SESSION['Error'] = "Project removed from the list!";
                    echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
                } 
                else
                {
                        echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
                }
            }
            else
            {
                $_SESSION['Error'] = "Project is assigned to a Team and can not be Deleted!";
                echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
            }
        }
    }
?>
