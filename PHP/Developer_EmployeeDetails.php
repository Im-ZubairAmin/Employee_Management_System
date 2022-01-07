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
       /* Style inputs, select elements and textareas */

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
    </style>
</head>
<body>


  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav me-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Developer_PersonalDetails.php">
              <?php 

                  if(isset($_SESSION['fname']) && isset($_SESSION['lname']))
                  {
                    echo"$_SESSION[fname] $_SESSION[lname]";
                    $ID = $_SESSION["uid"];
                    $sql = "SELECT * FROM developer_info WHERE Developer_ID='$ID'";
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
                   echo"Developer Name";
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
    


  
  <div class="content-container">
    <div class="container-fluid">

        <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
            <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
              <thead class="table-dark">
                <tr >
                  <th style="text-align: center;border-bottom: 1px solid white;">Employee Details</th>
                </tr>
              </thead>
            </table>
        </div>

        <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="#">
                
            <div style="font-size: 18;"class="row">
                <div style="width:13%">
                    <label for="fname"><b>Name</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:10%;margin-left: 1%;">
                    <label> Mark Cuban</label>
                </div> 
            </div>

            <div style="font-size: 18;"class="row">
                <div style="width:13%;">
                    <label for="Email"><b>Email</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:15%;margin-left: 1%;">
                    <label> Mark1@gmail.com</label>
                </div>
            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="PhoneNumber"><b>Phone Number</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:10%;margin-left: 1%;">
                    <label> 9281657893</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="Address"><b>Address</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> Lecture Theatre UET, GT Road Lahore</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="Manager"><b>Manager</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> John Ham</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="Salary"><b>Salary</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> 175000</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="TypeOfEmployee"><b>Type of Employee</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> Developer</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="LeaveDays"><b>Leave Days</b></label>
                </div>
                
                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> 23</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="LeaveDaysUsed"><b>Leave Days Used</b></label>
                </div>
                
                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> 11</label>
                </div>

            </div>

            <!--
            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="TeamAssigned"><b>Team Assigned</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> Yes</label>
                </div>

            </div>

            <div style="font-size: 18;"class="row">

                <div style="width:13%;">
                    <label for="Loan"><b>Loan</b></label>
                </div>

                <div style="width:1px;">
                    <label>:</label>
                </div>

                <div style="width:30%;margin-left: 1%;">
                    <label> 0 PKR</label>
                </div>

            </div>
            -->
         
          <div style="margin-top: 3%;padding-bottom: 5%;"class="row">
            <a href="Developer_Dashboard.php" style="height:45px;width:20%;margin-left: 25%;background-color: black;color:white;" class ="AcitonButtons" value="Admin Dashboard">Developer Dashboard</a>
            <a href="#" style="height:45px;width:20%;margin-left: 10%;background-color: black;color:white;"class ="AcitonButtons" value="Update Information">Update Information</a>
           </div>
        </form>
    </div>
  </div>    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>