<?php
    session_start();
    include "Connection.php";
?>

<?php
    $add_jobtitle =  $_REQUEST['AddJobTitle'];

    if(empty($add_jobtitle))
    {
        $_SESSION['Error'] = "Job Title not entered!";
        echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
    }
    else
    {
        $sql = "SELECT * FROM job_title WHERE JobTitle_Name='$add_jobtitle'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 0)
        {
            $sql = "INSERT INTO job_title (JobTitle_Name) VALUES ('$add_jobtitle')";
            if(mysqli_query($con, $sql))
            {
                echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
            } 
            else{
                echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
            }
        }
        else
        {
            $_SESSION['Error'] = "This Job exsits already!";
            echo "<script> location.href='Admin_JobTitle.php'; </script>" ;// default page
        }
    }
?>
