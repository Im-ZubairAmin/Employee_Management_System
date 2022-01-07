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

    <div class="container">
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
        <?php

        $EmployeeType = "Manager";
        $ID = $_SESSION['uid'];

        if($EmployeeType == "Manager")
        {
            $sql="SELECT * FROM manager_info WHERE Manager_ID = '$ID'";
            $result = mysqli_query($con, $sql);
            $Manager=mysqli_fetch_array($result);

            $Fname = $Manager['First_Name'];
            $Lname = $Manager['Last_Name'];
            $Email = $Manager['Email'];
            $Address = $Manager['Address'];
            $PhoneNumber = $Manager['Phone_Number'];
            $Password = $Manager['Password'];

            echo'
            <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Update Personal Information</th>
                    </tr>
                  </thead>
                </table>
            </div>
            <br>    
            <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="Manager_PHPUpdatePersonalDetails.php" method="post">

                

                <div style="font-size: 18;"class="row">
                    <div style="width:10%;">
                        <label for="Email">Email</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Email.'" style="border-color: black;height:35px" type="email" id="Email" name="Email" placeholder="Email">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                        <label for="PhoneNumber">Phone Number</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$PhoneNumber.'" style="border-color: black;height:35px" type="text" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number">
                    </div>
                
                   
                </div>


                <div style="font-size: 18;"class="row">
                    <div style="width:10%;">
                        <label for="Address">Address</label>
                    </div>
                    <div style="width:90%">
                        <input value="'.$Address.'"style="border-color: black;height:35px" type="text" id="Address" name="Address" placeholder="Address">
                    </div>
                </div>

                <div style="font-size: 18;"class="row">


                    <div style="width:10%;margin-left: 0%;">
                    <label for="Password">Password</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 0%;">
                    <input value="'.$Password.'" type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password" id="myInput">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword()"> Show Password
                  </div>
                    
                </div>
                
                <div style="font-size: 18;margin-top:1%"class="row">
                  
                </div>
              
             
              <div style="margin-top: 3%;"class="row">
                <input style="height:45px"type="submit" value="Update Information">
              </div>
            </form>
          </div>';
        }

        ?>
    </div>
    </div>
    <script>
      function myPassword() {
        var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>