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
  
    <title>Add User</title>

    <style>
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

        .DeleteButton{
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

form i {
    margin-left: -30px;
    cursor: pointer;
}

/* width */
::-webkit-scrollbar {
  
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 4px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #2C3539; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
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
              <a class="nav-link" href="Login.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      
    <div style="position:fixed;" class="sidebar-container">
      <div  class="sidebar-logo">
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
          <a style="text-decoration: none;" href="Admin_SearchUser.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Search User
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Admin_JobTitle.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Job Title
          </a>
        </li>
        
        <li>
          <a style="text-decoration: none;" href="Admin_Complaint.php">
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
          <a style="text-decoration: none;background-color: white;color: black;" href="Admin_SalaryIncrease.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Salary Increment
          </a>
        </li>

        
        


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
            <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Salary Increment</th>
                    </tr>
                  </thead>
                </table>
            </div>

              <form style="width:90%;margin-left: 5%;margin-top: 10%;"action="Admin_PHPSalaryIncrease.php" method='post'>
                
                <div style="font-size: 18;"class="row">
                  <input type="hidden" value="Increment" name="Type"></input> 
                  <div style="width:15%;margin-left: 0%;">
                         <label for="TypeOfEmployee">Type Of Employees</label>
                    </div>
                    <div style="width: 20%">
                            <select  value="TypeOfEmployee" id="TypeOfEmployee" name="TypeOfEmployee">';
                              <option value="Admin">Admin</option>
                              <option value="Manager">Manager</option>
                              <option value="Developer">Developer</option>
                            </select>
                    </div>

                    <div style="width:20%;margin-left: 5%;">
                         <label for="Increase">Percentage Salary Increase</label>
                    </div>
                    <div style="width: 20%">
                            <select  value="Increase" id="Increase" name="Increase">';
                              <?php 
                                $i = 1;
                                while($i <= 100)
                                {
                                    echo "<option value='".$i."'>".$i."</option>";
                                    $i++;
                                }
                              ?>
                            </select>
                    </div>
                
                    <div style="margin-top: 4%;"class="row">
                        <input style="height:45px"type="submit" value="Increment">
                    </div>
                  </div>
                </form>
                          
            
                <div style="width:90%;margin-left: 5%;margin-top: 5%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Salary Increment</th>
                    </tr>
                  </thead>
                </table>
            </div>

              <form style="width:90%;margin-left: 5%;margin-top: 10%;"action="Admin_PHPSalaryIncrease.php" method='post'>
                
                <div style="font-size: 18;"class="row">
                  <input type="hidden" value="Cash" name="Type"></input> 
                  <div style="width:15%;margin-left: 0%;">
                         <label for="TypeOfEmployee">Type Of Employees</label>
                    </div>
                    <div style="width: 20%">
                            <select  value="TypeOfEmployee" id="TypeOfEmployee" name="TypeOfEmployee">';
                              <option value="Admin">Admin</option>
                              <option value="Manager">Manager</option>
                              <option value="Developer">Developer</option>
                            </select>
                    </div>

                    <div style="width:20%;margin-left: 5%;">
                         <label for="SalaryIncrease">Salary Increase</label>
                    </div>
                    <div style="width: 20%">
                            <input type="text" name="SalaryIncrease" id="SalaryIncrease" placeholder="Salary Increase"></input>
                    </div>
                
                    <div style="margin-top: 4%;"class="row">
                        <input style="height:45px"type="submit" value="Increment">
                    </div>
                  </div>
                </form>
       
        </div>
      </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>