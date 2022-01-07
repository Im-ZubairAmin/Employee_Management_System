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
         
        .Details-button{
            width:100%;
            border-radius:18px;  
            background-color: black;
            border:none;
            color: white;
            padding-top: 3px;
            padding-bottom: 3px;
            text-align: center;
            text-decoration: none;
        }

        .Details-button:hover{

            background-color: white;
            color: black;
            border: 1px solid black;
            border-color: black;
        }

        .Search-button{
            width:60%;
            border-radius:18px;  
            background-color: black;
            border:none;
            color: white;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 6px;
            padding-bottom: 6px;
            text-align: center;
            text-decoration: none;
        }

        .Search-button:hover{

            background-color: white;
            color: black;
            border: 1px solid black;
            border-color: black;
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


/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(255, 255, 255);
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

input[type=email], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid rgb(255, 255, 255);
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: rgb(255, 255, 255);
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #ffffff;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
              <a class="nav-link" href="Manager_PersonalDetails.php">
                <?php 

                  if(isset($_SESSION['fname']) && isset($_SESSION['lname']))
                  {
                    echo"$_SESSION[fname] $_SESSION[lname]";
                    $ID = $_SESSION["uid"];
                    $sql = "SELECT * FROM manager_info WHERE Manager_ID='$ID'";
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
                   echo"Manager Name";
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
              <a class="nav-link" href="Login.php">Logout</a>
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
          <a style="text-decoration: none;" href="Manager_Dashboard.php">
            <i class="fa fa-home" aria-hidden="true"></i> Dashboard
          </a>
        </li>
        
        <li>
          <a style="text-decoration: none;" href="Manager_SearchDeveloper.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Search Developer
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Manager_Complaint.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Complaint
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Manager_Team.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Team
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_LeaveApplication.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Leave Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_LoanApplication.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Loan Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_AdvanceApplication.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Advance Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;background-color: white;color: black;" href="Manager_ProjectDetails.php">
          <i class="fa fa-tachometer" aria-hidden="true"></i>Project Details
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_ApplicationStatusLeave.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Application Status
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_ApplicationStatus.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> My Applications
          </a>
        </li>
        <!--
        <li>
          <a style="text-decoration: none;" href="Developer_AdvanceApplication.html">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Advance Application
          </a>
        </li>
        <li>
            <a style="text-decoration: none;" href="Developer_LoanApplication.html">
              <i class="fa fa-tachometer" aria-hidden="true"></i> Loan Application
            </a>
          </li>
        -->
      </ul>
    </div>
        
    
    <div class="content-container">
    
      <div class="container-fluid">
        
        <div style="width:90%;overflow-y: scroll; height:85%;position:fixed" class="container">
        <?php
        if(isset($_SESSION['Error']) && !empty($_SESSION['Error']))
        {
          echo'
          <div style="width:90%;margin-left:5%;" class="alert alert-danger alert-dismissible fade show" role="alert">
          '.$_SESSION["Error"].'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          unset($_SESSION['Error']);
        }
        else if(isset($_SESSION['Sucess']) && !empty($_SESSION['Sucess']))
        {
          echo'
          <div style="width:90%;margin-left:5%;" class="alert alert-success alert-dismissible fade show" role="alert">
          '.$_SESSION["Sucess"].'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          unset($_SESSION['Sucess']);
        }
      ?>
            
                          
        
        <div style="width:100%;margin-left: 0%;margin-top: 0%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Project Details</th>
                    </tr>
                  </thead>
                </table>
            </div>

            <div style="margin-top:0%;width: 100%;margin-left:0%;float: left;overflow:hidden;overflow-y: scroll;height: 500px; // change this to desired height">
                <table style="margin-top:0px;padding-top: 0px"class="table">
            <thead class="table-dark">
              
              <tr>
              <th scope="col">Sr. NO</th>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Software Type</th>
                <th scope="col">Deadline</th>
                <th scope="col">Status</th>

              </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM project_info WHERE Project_ID !='0'";
            $Space = " ";
            $result = mysqli_query($con, $sql);
            $i = 1;
            while($row=mysqli_fetch_array($result))
            {
                echo"
              <tr>
                <th>".$i."</th>
                <td>".$row['ProjectName']."</td>
                <td>".$row['Description']."</td>
                <td>".$row['SoftwareType']."</td>
                <td>".$row['EndDate']."</td>
                <td>".$row['Status']."</td>

              </tr>";
              $i++;
            }

              
            ?>
            </tbody>
          </table>
                </div>
        </div>
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>