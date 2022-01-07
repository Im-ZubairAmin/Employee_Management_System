
<?php
session_start();
 include "Connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Admin Dashboard</title>

    <style>
          .AcitonButtons{
        background-color: #04AA6D;
        color: rgb(255, 255, 255);
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        text-align:center;
        cursor: pointer;
        float: right;
       }
      html,body {    
        height:100%;
        margin: 0;
      }
      #header {
        height: 100%;
      }
        .navbar-brand
        {
            position: absolute;
            width: 100%;
            left: 0;
            text-align: center;
            margin:0 auto;
        }
        .navbar-toggle 
        {
            z-index:3;
        }

        .Details-button{
            width:100%;
            border-radius:18px;  
            background-color: black;
            border:none;
            color: white;
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;
            text-decoration: none;
        }

        .Details-button:hover{

            background-color: white;
            color: black;
            border: 1px solid black;
            border-color: black;
        }

        .sidebar-container {
  position: fixed;
  width: 220px;
  height: 100%;
  left: 0;
  overflow-x: hidden;
  overflow-y: auto;
  background: #1a1a1a;
  color: #fff;
}

.content-container {
  padding-top: 20px;
}

.sidebar-logo {
  padding: 7px 15px 10px 7px;
  font-size: 14px;
  background-color: #000000;
}

.sidebar-logo:hover {
  padding: 7px 15px 10px 7px;
  font-size: 14px;
  color: #000000;
  background-color: rgb(255, 255, 255);
}

.sidebar-navigation {
  padding: 0;
  margin: 0;
  list-style-type: none;
  position: relative;
}

.sidebar-navigation li {
  background-color: transparent;
  position: relative;
  display: inline-block;
  width: 100%;
  line-height: 20px;
}

.sidebar-navigation li a {
  padding: 10px 15px 10px 30px;
  display: block;
  color: #fff;
}

.sidebar-navigation li .fa {
  margin-right: 10px;
}

.sidebar-navigation li a:active,
.sidebar-navigation li a:hover,
.sidebar-navigation li a:focus {
  text-decoration: none;
  color:black;

  outline: none;
}

.sidebar-navigation li::before {
  background-color: white;
  position: absolute;
  content: '';
  height: 100%;
  left: 0;
  top: 0;
  -webkit-transition: width 0.2s ease-in;
  transition: width 0.2s ease-in;
  color: #000000;
  width: 3px;
  z-index: -1;
}

.sidebar-navigation li:hover::before {
  width: 100%;
}

.sidebar-navigation .header {
  font-size: 12px;
  text-transform: uppercase;
  background-color: #151515;
  padding: 10px 15px 10px 30px;
}

.sidebar-navigation .header::before {
  background-color:transparent;
}

.content-container {
  padding-left: 220px;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
    </style>
  </head>
  <body>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav me-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Admin_PersonalDetails.php">
                <?php 

                  if(isset($_SESSION['fname']) && isset($_SESSION['lname']))
                  {
                    echo"$_SESSION[fname] $_SESSION[lname]";
                    $ID = $_SESSION["uid"];
                    $sql = "SELECT * FROM admin_info WHERE Admin_ID='$ID'";
                    if($result = mysqli_query($con, $sql))
                    {
                      $count = mysqli_num_rows($result);
                      if($count != 1)
                      {
                        echo "<script> location.href='Logout.php'; </script>" ;// default page
                      }
                    } 
                    else{
                      echo "<script> location.href='Logout.php'; </script>" ;// default page
                    }
                  }
                  else
                   echo"Admin Name";
                  ?>
              </a>
            </li>
           
          </ul>
        </div>
        <div class="mx-auto order-0">
          <p style="color: white;font-size:22px;">EMS</p>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ms-auto">
          
            <li class="nav-item">
              <a class="nav-link" href="Logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      
    <div class="sidebar-container">
      <div class="sidebar-logo">
        <span> Employee Management System </span>
      </div>
      <ul class="sidebar-navigation">
        <li>
          <a style="text-decoration: none;" href="Admin_Dashboard.php">
            <i class="fa fa-home" aria-hidden="true"></i> Dashboard
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Admin_AddUser.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Add User
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Admin_SearchUser.php?T=-1&Q=-1">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Search User
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Admin_JobTitle.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Job Title
          </a>
        </li>
        <li>
          <a style="text-decoration: none;background-color: white;color: black;" href="Admin_Complaint.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Recieved Applications
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Admin_AddProject.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Add Project
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Admin_ProjectDetails.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Project Details
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Admin_EmployeeList.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i> Employee List
          </a>
        </li>

        <li>
            <a style="text-decoration: none;" href="Admin_SalaryIncrease.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Salary Increment
          </a>
        </li>

      </ul>
    </div>
    
    <div class="content-container">
        <div  style="width:100%;overflow-y: scroll; height:85%;position:fixed" class="container-fluid">
        
        <div style="margin-top: 3%;padding-bottom: 5%;"class="row">
            <a href="Admin_LoanApplication.php" style="height:45px;width:15%;margin-left: 7.5%;background-color: black;color:white;" class ="AcitonButtons" value="Admin Dashboard">Loan Application</a>
            <a href="Admin_AdvanceApplication.php" style="height:45px;width:15%;margin-left: 5%;background-color: black;color:white;"class ="AcitonButtons" value="Update Information">Advance Application</a>
            <a href="Admin_Complaint.php" style="height:45px;width:15%;margin-left: 5%;background-color: white;color:black;border:1px solid black;"class ="AcitonButtons" value="Update Information"><b>Complaint History</b></a>
            <a href="Admin_LeaveApplication.php" style="height:45px;width:15%;margin-left: 5%;background-color: black;color:white;" class ="AcitonButtons" value="Admin Dashboard">Leave Application</a>
        </div>
        
        <div style="width:80%;">
          <?php
             
            $ID = $_SESSION["uid"];
            $sql = "SELECT * FROM complaint_table WHERE Developer_ID ='-1' and ComplaintTo='Admin' ORDER BY DateOfComplaint DESC";
            $i = 0;
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
            
            echo'
                <div style="width:100%;margin-left: 5%;margin-top: 0%;float:left;"class="jumbotron">
                  <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                    <thead class="table-dark">
                      <tr >
                        <th style="text-align: center;border-bottom: 1px solid white;">Recieved Complaint</th>
                      </tr>
                    </thead>
                  </table>
                </div>';

                echo'
                <div style="width:100%;margin-left: 5%;margin-bottom:5%;float:left"class="jumbotron">
                <table style="margin-top:0px;padding-top: 0px"class="table">
                  <thead class="table-dark">
                    
                    <tr>
                      <th scope="col">Sr. NO</th>
                      <th scope="col">Manager ID</th>
                      <th scope="col">Complaint ID</th>
                      <th scope="col">Complaint</th>
                      <th scope="col">Date</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
                
                  
                  
                  while($row=mysqli_fetch_array($result))
                  {
                    $i++;
                    echo'
                    <tr>
                      <th>'.$i.'</th>
                      <td>'.$row["Manager_ID"].'</td>
                      <td>'.$row["Complaint_ID"] .'</td>
                      <td>'.$row["Complaint"].'</td>
                      <td>'.$row["DateOfComplaint"].'</td>
                    </tr>';
                    
                    
                  };
                  echo'</tbody>
                  </table>
                  </div>';
           

        ?>
        </div>
     
           
        </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>