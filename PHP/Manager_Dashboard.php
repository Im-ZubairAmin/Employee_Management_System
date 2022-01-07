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
    <script src="https://kit.fontawesome.com/59ab2bfcd1.js" crossorigin="anonymous"></script>

    <title>Admin Dashboard</title>

    <style>
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
          <a style="text-decoration: none;background-color: white;color: black;" href="Manager_Dashboard.php">
            Dashboard
          </a>
        </li>
        
        <li>
          <a style="text-decoration: none;" href="Manager_SearchDeveloper.php">
             Search Developer
          </a>
        </li>

        <li>
          <a style="text-decoration: none;" href="Manager_Complaint.php">
           Complaint
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_Team.php">
           Team
          </a>
        </li>
        <li>
          <a style="text-decoration: none;;" href="Manager_LeaveApplication.php">
            Leave Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_LoanApplication.php">
            Loan Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_AdvanceApplication.php">
           Advance Application
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_ProjectDetails.php">
            Project Details
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_ApplicationStatusLeave.php">
          Application Status
          </a>
        </li>
        <li>
          <a style="text-decoration: none;" href="Manager_ApplicationStatus.php">
          My Applications
          </a>
        </li>
      </ul>
    </div>
    
    <div class="content-container">
    
      <div class="container-fluid">
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

      
      <div style="width:100%;overflow-y: scroll; height:85%;position:fixed">
        <div style = "margin-top:0%;margin-bottom:2%">

        <div style="width:16%;margin-left:4%;background-color:#303033;color:white;height:5%;border: solid 4px #c3c3c3;;border-radius:20px;display: inline-block">
          <div style = "display:inline-block">
              <br>
              <h4>&nbsp&nbsp Loan</h4>
              <p>&nbsp&nbsp&nbsp
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM loan_table WHERE Manager_iD ='$ID' and Developer_ID ='-1' and Status = 'Accepted' and Active='yes'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  
                  if($count == 1)
                  {
                    $temp = "Loan of ";
                    $temp .= $row['Amount'];
                    echo "$temp";
                    echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:70%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-hand-holding-usd"></i>
                      </div>
                      ';
                  }
                  else
                  {

                    $sql = "SELECT * FROM loan_table WHERE Manager_iD ='$ID' and Developer_ID ='-1' and Status = 'Pending' and Active='no'";
                    $result = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_array($result);
                    
                    if($count == 0)
                    {
                      echo "No active Loan";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:90%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-hand-holding-usd"></i>
                      </div>
                      ';
                    }
                    else if($count == 1)
                    {
                      $temp = "Requested ";
                      $temp .= $row['Amount'];
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:50%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-hand-holding-usd"></i>
                      </div>
                      ';
                    }
                    else if($count > 1)
                    {
                      echo "Multiple Requests";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:60%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-hand-holding-usd"></i>
                      </div>
                      ';
                    }
                  }
                ?>
                
          </div>



          
          <div style="width:16%;margin-left:4%;background-color:#303033;color:white;height:5%;border: solid 4px #c3c3c3;;border-radius:20px;display: inline-block">
          <div style = "display:inline-block">
              <br>
              <h4>&nbsp&nbsp Advance</h4>
              <p>&nbsp&nbsp&nbsp
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM advance_table WHERE Manager_iD ='$ID' and Developer_ID ='-1' and Status = 'Accepted' and Active='yes'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  
                  if($count == 1)
                  {
                    $temp = "Advance of ";
                    $temp .= $row['Amount'];
                    echo "$temp";
                    echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:60%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-hand-holding-usd"></i>
                      </div>
                      ';
                  }
                  else
                  {

                    $sql = "SELECT * FROM advance_table WHERE Manager_iD ='$ID' and Developer_ID ='-1' and Status = 'Pending' and Active='no'";
                    $result = mysqli_query($con, $sql);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_array($result);
                    
                    if($count == 0)
                    {
                      echo "No active Advance";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:60%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-coins"></i>
                      </div>
                      ';
                    }
                    else if($count == 1)
                    {
                      $temp = "Requested ";
                      $temp .= $row['Amount'];
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:50%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-coins"></i>
                      </div>
                      ';
                    }
                    else if($count > 1)
                    {
                      echo "Multiple Requests";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:60%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-coins"></i>
                      </div>
                      ';
                    }
                  }
                ?>
                
          </div>


          <div style="width:16%;margin-left:4%;background-color:#303033;color:white;height:5%;border: solid 4px #c3c3c3;;border-radius:20px;display: inline-block">
          <div style = "display:inline-block">
              <br>
              <h4>&nbsp&nbsp Leave Days</h4>
              <p>&nbsp&nbsp&nbsp
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM manager_info WHERE Manager_ID='$ID' ";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  
                  if($count == 1)
                  {
                    $Total = $row['Total_Leave_Days'];
                    $Used = $row['Leave_Days_Used'];
                    $Left = $Total - $Used;
                    if($Left >= 0)
                    {
                      $temp = "Leaves Left ";
                      $temp .= $Left;
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:40%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-umbrella-beach"></i>
                      </div>
                      ';
                    }
                    if($Left < 0)
                    {
                      $Left = 0;
                      $temp = "Leaves Left ";
                      $temp .= $Left;
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:40%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-umbrella-beach"></i>
                      </div>
                      ';
                    }
                  }
                ?>
                
          </div>

          <div style="width:16%;margin-left:4%;background-color:#303033;color:white;height:5%;border: solid 4px #c3c3c3;;border-radius:20px;display: inline-block">
          <div style = "display:inline-block">
              <br>
              <h4>&nbsp&nbsp Bonus</h4>
              <p>&nbsp&nbsp&nbsp
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM manager_info WHERE Manager_ID ='$ID' ";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  
                  if($count == 1)
                  {
                    $Total = $row['Bonus'];
                    if($Total <= 0)
                    {
                      $temp = "No Bonus";
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:100%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-wallet"></i>
                      </div>
                      ';
                    }
                    if($Total > 0)
                    {
                      $temp = "Bonus ";
                      $temp .= $Total;
                      echo "$temp";
                      echo'
                      </p>
                      </div>
                      <div style = "display:inline-block">
                      <i style="margin-left:90%;margin-bottom:40%;margin-top:0%;font-size:40px"class="fas fa-wallet"></i>
                      </div>
                      ';
                    }
                  }
                ?>
                
          </div>

        </div>

                  <!-- Main component for a primary marketing message or call to action -->
        <div style="width:75%;margin-left: 3%;margin-top: 1%;float:left;"class="jumbotron">
          <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
            <thead class="table-dark">
              <tr >
                <th style="text-align: center;border-bottom: 1px solid white;">Manager Information</th>
              </tr>
            </thead>
          </table>
        </div>


        <div style="width:75%;margin-left: 3%;float:left"class="jumbotron">
          <table style="margin-top:0px;padding-top: 0px"class="table">
            <thead class="table-dark">
              
              <tr>
                <th scope="col">Sr. NO</th>
                <th scope="col">Task</th>
                <th>Deadline</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM advance_table WHERE  Manager_ID='$ID' and Developer_ID !='-1' and Status='Pending'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>1</th>
                  <td>Pending Advance Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>

              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM loan_table WHERE  Manager_ID='$ID' and Developer_ID !='-1' and Status='Pending'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>2</th>
                  <td>Pending Loan Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>

              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM leave_table WHERE  Manager_ID='$ID' and Developer_ID !='-1' and Status='Pending'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>3</th>
                  <td>Pending Leave Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>

              
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM leave_table WHERE Manager_ID='$ID' and Developer_ID ='-1'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>4</th>
                  <td>Total Leave Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM leave_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' and Status='Accepted'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>5</th>
                  <td>Accepted Leave Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql=" SELECT * FROM leave_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' ORDER BY leave_table.DateApplied DESC LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);
                  
                  if($count > 0)
                  {
                    $Status = $row['Status'];
                    echo"<th>6</th>
                    <td>Recent Leave Application</td>";
                    echo"<td>$Status</td>";
                  }
                  else
                  {
                    echo"<th>6</th>
                    <td>Recent Leave Application</td>";
                    echo"<td>Not Applied Yet</td>";
                  }
                ?>
              </tr>






              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM loan_table WHERE  Manager_ID='$ID' and Developer_ID ='-1'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>7</th>
                  <td>Total Loan Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM loan_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' and Status='Accepted'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>8</th>
                  <td>Accepted Loan Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql=" SELECT * FROM loan_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' ORDER BY loan_table.DateApplied DESC LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);
                  if($count > 0)
                  {
                    $Status = $row['Status'];
                    echo"<th>9</th>
                    <td>Recent Loan Application</td>";
                    echo"<td>$Status</td>";
                  }
                  else
                  {
                    echo"<th>9</th>
                    <td>Recent Loan Application</td>";
                    echo"<td>No Application yet</td>";
                  }
                ?>
              </tr>




              
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM advance_table WHERE  Manager_ID='$ID' and Developer_ID ='-1'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>10</th>
                  <td>Total Advance Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql = "SELECT * FROM advance_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' and Status='Accepted'";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  echo"<th>11</th>
                  <td>Accepted Advance Application</td>";
                  echo"<td>$count</td>";
                ?>
              </tr>
              <tr>
                <?php

                  $ID = $_SESSION["uid"];
                  $sql=" SELECT * FROM advance_table WHERE  Manager_ID='$ID' and Developer_ID ='-1' ORDER BY advance_table.DateApplied DESC LIMIT 1";
                  $result = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result);

                  if($count > 0)
                  {
                    $Status = $row['Status'];
                    echo"<th>12</th>
                    <td>Recent Advance Application</td>";
                    echo"<td>$Status</td>";
                  }
                  else
                  {
                    echo"<th>12</th>
                    <td>Recent Advance Application</td>";
                    echo"<td>No Application Yet</td>";
                  }
                ?>
              </tr>


            
            </tbody>
          </table>
      </div>

     
            

    </div>
    </div>
      
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>