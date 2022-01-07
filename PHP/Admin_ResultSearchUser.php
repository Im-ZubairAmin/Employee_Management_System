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
            <a class="nav-link" href="Login.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    


  
  <div class="content-container">
    <div class="container-fluid">

        <div style="margin-top: 3%;padding-bottom: 3%;"class="row">
            <a href="Admin_Dashboard.php" style="height:45px;width:25%;margin-left: 22.5%;background-color:black;color:white;" class ="AcitonButtons" value="Admin Dashboard">Admin Dashboard</a>
            <a href="Admin_SearchUser.php" style="height:45px;width:25%;margin-left: 5%;background-color: black;color:white;"class ="AcitonButtons" value="Update Information">Search User</a>
        </div>

        <div style="width:90%">
          <?php
             
            if(isset($_SESSION['Admin_Query'])  && isset($_SESSION['EmployeeType']))
            {
              $sql = $_SESSION["Admin_Query"];
              $i = 0;
              $result = mysqli_query($con, $sql);
              $count = mysqli_num_rows($result);
              if($_SESSION['EmployeeType'] == "Developer")
              {
                echo'
                <div style="width:100%;margin-left: 5%;margin-top: 0%;float:left;"class="jumbotron">
                  <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                    <thead class="table-dark">
                      <tr >
                        <th style="text-align: center;border-bottom: 1px solid white;">Developers</th>
                      </tr>
                    </thead>
                  </table>
                </div>';

                echo'
                <div style="width:100%;margin-left: 5%;float:left"class="jumbotron">
                <table style="margin-top:0px;padding-top: 0px"class="table">
                  <thead class="table-dark">
                    
                    <tr>
                      <th scope="col">Sr. NO</th>
                      <th scope="col">Employee ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Details</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
                
                  
                  
                  while($row=mysqli_fetch_array($result))
                  {
                    $i++;
                    echo'
                    <tr>
                      <th>'.$i.'</th>
                      <td>'.$row["Developer_ID"].'</td>
                      <td>'.$row["First_Name"] .'</td>
                      <td>'.$row["Last_Name"].'</td>
                      <td>'.$row["Email"].'</td>
                      <td>'.$row["Salary"].'</td>
                      <td><a style="width:90%"class="Search-button" href="Admin_EmployeeDetails.php?ID='.$row["Developer_ID"].'&Type=Developer">Details</a></td>
                    </tr>';
                    
                    
                  };
                  echo'</tbody>
                  </table>
                  </div>';

                  unset($_SESSION['EmployeeType']);
                  unset($_SESSION['Admin_Query']);
                  
              }

              else if($_SESSION['EmployeeType'] == "Admin")
              {
                echo'
                <div style="width:100%;margin-left: 5%;margin-top: 0%;float:left;"class="jumbotron">
                  <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                    <thead class="table-dark">
                      <tr >
                        <th style="text-align: center;border-bottom: 1px solid white;">Admins</th>
                      </tr>
                    </thead>
                  </table>
                </div>';

                echo'
                <div style="width:100%;margin-left: 5%;float:left"class="jumbotron">
                <table style="margin-top:0px;padding-top: 0px"class="table">
                  <thead class="table-dark">
                    
                    <tr>
                      <th scope="col">Sr. NO</th>
                      <th scope="col">Employee ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Details</th>
                      
                    </tr>
                  </thead>
                  <tbody>';
                
                  
                  
                  while($row=mysqli_fetch_array($result))
                  {
                    $i++;
                    echo'
                    <tr>
                      <th>'.$i.'</th>
                      <td>'.$row["Admin_ID"].'</td>
                      <td>'.$row["First_Name"] .'</td>
                      <td>'.$row["Last_Name"].'</td>
                      <td>'.$row["Email"].'</td>
                      <td>'.$row["Salary"].'</td>
                      <td><a style="width:90%"class="Search-button" href="Admin_EmployeeDetails.php?ID='.$row["Admin_ID"].'&Type=Admin">Details</a></td>
                    </tr>';
                    
                    
                  };
                  echo'</tbody>
                  </table>
                  </div>';
                  
                  unset($_SESSION['EmployeeType']);
                  unset($_SESSION['Admin_Query']);
              }

              else if($_SESSION['EmployeeType'] == "Manager")
              {
                echo'
                <div style="width:100%;margin-left: 5%;margin-top: 0%;float:left;"class="jumbotron">
                  <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                    <thead class="table-dark">
                      <tr >
                        <th style="text-align: center;border-bottom: 1px solid white;">Managers</th>
                      </tr>
                    </thead>
                  </table>
                </div>';

                echo'
                <div style="width:100%;margin-left: 5%;float:left"class="jumbotron">
                <table style="margin-top:0px;padding-top: 0px"class="table">
                  <thead class="table-dark">
                    
                    <tr>
                      <th scope="col">Sr. NO</th>
                      <th scope="col">Employee ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Details</th>
                      
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
                      <td>'.$row["First_Name"] .'</td>
                      <td>'.$row["Last_Name"].'</td>
                      <td>'.$row["Email"].'</td>
                      <td>'.$row["Salary"].'</td>
                      <td><a style="width:90%"class="Search-button" href="Admin_EmployeeDetails.php?ID='.$row["Manager_ID"].'&Type=Manager">Details</a></td>
                    </tr>';
                    
                    
                  };
                  echo'</tbody>
                  </table>
                  </div>';
                  
                  unset($_SESSION['EmployeeType']);
                  unset($_SESSION['Admin_Query']);
              }
            }
        ?>
    </div>


    </div>
  </div>    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>