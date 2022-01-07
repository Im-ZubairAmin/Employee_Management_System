<?php
    session_start();
    include "Connection.php";
?>

<?php
    $ProjectName =  $_REQUEST['ProjectName'];
    $CompanyName =  $_REQUEST['CustomerName'];
    $Email =  $_REQUEST['Email'];
    $PhoneNumber =  $_REQUEST['PhoneNumber'];
    $StartDate =  $_REQUEST['StartDate'];
    $EndDate =  $_REQUEST['EndDate'];
    $CustomerType =  $_REQUEST['CustomerType'];
    $SoftwareType =  $_REQUEST['SoftwareType'];
    $Description =  $_REQUEST['Description'];


    if(empty($ProjectName) || empty($CompanyName) ||empty($Email) ||empty($PhoneNumber) ||empty($StartDate) ||
    empty($EndDate) ||empty($CustomerType) ||empty($SoftwareType) ||empty($Description) )
    {
        $_SESSION['Error'] = "All input fields are not filled!";
        echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
    }
    else
    {
        if(strlen($PhoneNumber) == 11 )
        {
    
            $sql = "INSERT INTO project_info(ProjectName, CustomerName, Email,
             PhoneNumber, StartDate, EndDate, CustomerType, SoftwareType,
              Description,Status) VALUES ('$ProjectName','$CompanyName','$Email','$PhoneNumber','$StartDate',
              '$EndDate','$CustomerType','$SoftwareType','$Description','Pending')";
            if(mysqli_query($con, $sql))
            {
                $_SESSION['Sucess'] = "Project Added Sucesfully. Scroll down to confirm!";
                echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
            } 
            else{
                echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
            }
       
        }
        else
        {
            $_SESSION['Error'] = "Phone Number should be of 11 digits!";
            echo "<script> location.href='Admin_AddProject.php'; </script>" ;// default page
        }
    }
?>
