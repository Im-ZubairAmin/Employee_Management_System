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
            <a class="nav-link" href="Logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    


  
  <div class="content-container">
    <div class="container-fluid">
    <?php
        if(isset($_SESSION['Error']) && !empty($_SESSION['Error']))
        {
          echo'
          <div style="width:90%;margin-left:5%;margin-top:5%" class="alert alert-danger alert-dismissible fade show" role="alert">
          '.$_SESSION["Error"].'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          unset($_SESSION['Error']);
        }
        else if(isset($_SESSION['Sucess']) && !empty($_SESSION['Sucess']))
        {
          echo'
          <div style="width:90%;margin-left:5%;margin-top:5%" class="alert alert-success alert-dismissible fade show" role="alert">
          '.$_SESSION["Sucess"].'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          unset($_SESSION['Sucess']);
        }
      ?>
    <?php

$EmployeeType = $_GET['Type'];
$ID = $_GET['ID'];

if($EmployeeType == "Manager")
{
    $current_date = date("Y-m-d");

    echo'
    <div style="width:90%;margin-left: 5%;margin-top: 5%;float:left;"class="jumbotron" >
        <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
          <thead class="table-dark">
            <tr >
              <th style="text-align: center;border-bottom: 1px solid white;">Bonus</th>
            </tr>
          </thead>
        </table>
    </div>
    <br>
    <form style="width:90%;margin-left: 5%;margin-top: 8%;"action="Admin_PHPGiveBonus.php" method="post">
    <div style="font-size: 18;"class="row">
        <input value="'.$ID.'" type="hidden"  name="ID" >
        <input value="Manager" type="hidden"  name="EmployeeType" >

        <div style="width:10%;margin-left: 0%;">
               <label for="Amount">Amount</label>
        </div>
        <div style="width: 15%">
            <input style="border-color: black;height:35px" type="text" id="Amount" name="Amount" placeholder="Amount">
        </div>

        
              <input type="hidden" name="dateofBonus" id="dateofBonus" value ="'.$current_date.'">
           
    </div>
        
    <div style="font-size: 18;margin-top:1%"class="row"></div>
     
    <div style="margin-top: 3%;"class="row">
        <input style="height:45px"type="submit" value="Give Bonus">
    </div>
    </form>
  </div>';
}
?>
    </div>
  </div>    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>