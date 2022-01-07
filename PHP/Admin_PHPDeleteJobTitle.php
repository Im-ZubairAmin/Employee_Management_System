<?php
    session_start();
    include "Connection.php";
?>

<?php
   $jobtitle_id = $_GET['varname'];

    if(empty($jobtitle_id))
    {
        echo "<script> location.href='Admin_AddJobTitle.php'; </script>" ;// default page
    }
    else
    {
        $sql = "DELETE FROM job_title WHERE JobTitle_ID='$jobtitle_id'";
        if(mysqli_query($con, $sql))
        {
            echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
        } 
        else{
            echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
        }
    }
?>
