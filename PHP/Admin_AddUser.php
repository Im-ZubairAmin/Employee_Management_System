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
          <a style="text-decoration: none;background-color: white;color: black;" href="Admin_AddUser.php">
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
            <a style="text-decoration: none;" href="Admin_SalaryIncrease.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Salary Increment
          </a>
        </li>
        
      </ul>
    </div>
    
    
    <div class="content-container">
    
      <div style="width:90%;overflow-y: scroll; height:85%;position:fixed"  class="container-fluid">
        
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
          <div style="width:90%;margin-left:5%;" class="alert alert-sucess alert-dismissible fade show" role="alert">
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
                      <th style="text-align: center;border-bottom: 1px solid white;">Add User</th>
                    </tr>
                  </thead>
                </table>
            </div>
            <br>    
            <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="Admin_PHPAddUser.php" method='post'>
                
                <div style="font-size: 18;"class="row">
                    <div style="width:11%">
                        <label for="fname">First Name*</label>
                    </div>
                    <div style="width:25%">
                        <input style="border-color: black;height:35px" type="text" id="fname" name="firstname" placeholder="First Name">
                    </div>
                
                    <div style="width:10%;margin-left: 4%;">
                        <label for="lname">Last Name*</label>
                    </div>
                    <div style="width:25%">
                        <input style="border-color: black;height:35px" type="text" id="lname" name="lastname" placeholder="Last Name">
                    </div>
                </div>

                <div style="font-size: 18;"class="row">
                    <div style="width:11%;">
                        <label for="Email">Email*</label>
                    </div>
                    <div style="width:25%">
                        <input style="border-color: black;height:35px" type="email" id="Email" name="Email" placeholder="Email">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                        <label for="PhoneNumber">Phone Number*</label>
                    </div>
                    <div style="width:25%">
                        <input style="border-color: black;height:35px" type="text" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number">
                    </div>
                
                   
                </div>

                <div style="font-size: 18;"class="row">
                    <div style="width:11%;">
                        <label for="Email">CNIC*</label>
                    </div>
                    <div style="width:25%">
                        <input style="border-color: black;height:35px" type="text" id="cnic" name="cnic" placeholder="CNIC (without dashes)">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                      <label for="StartDate">Date of Birth*</label>
                    </div>
                    
                    <div style="width:20%">
                      <input style="border-color: black;height:35px;border: 1px solid black;
                      border-radius: 5px;
                      background-color: #fff;
                      padding: 3px 5px;
                      box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                      width: 190px;" type="date" name="dateofbirth" id="dateofbirth">
                    </div>
                   
                </div>

                <div style="font-size: 18;"class="row">
                    <div style="width:11%;">
                        <label for="Address">Address*</label>
                    </div>
                    <div style="width:89%">
                        <input style="border-color: black;height:35px" type="text" id="Address" name="Address" placeholder="Address">
                    </div>
                </div>

                <div style="font-size: 18;"class="row">

                    <div style="width:11%;margin-left: 0%;">
                        <label for="Salary">Salary*</label>
                    </div>
                    <div style="width:15%">
                        <input style="border-color: black;height:35px" type="text" id="Salary" name="Salary" placeholder="Salary">
                    </div>

                    <div style="width: 7%;margin-left: 0%;">
                    <label for="Password">Password*</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 1%;">
                    <input type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password" id="myInput1">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword()"> Show Password
                  </div>

                  <div style="width:15%;margin-left: 0%;">
                    <label for="Password">Renter Password*</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 1%;">
                    <input type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password1" id="myInput2">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword1()"> Show Password
                  </div>
                    
                </div>

                

                <div style="font-size: 18;"class="row">
                    

                    <div style="width:11%;">
                        <label for="LeaveDays">Leave Days*</label>
                    </div>
                    <div style="width: 25%">
                        <select  id="LeaveDays" name="LeaveDays">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            
                        </select>
                    </div>

                    

                    

                  <div style="width:7%;margin-left: 4%;">
                        <label for="Gender">Gender*</label>
                    </div>
                    <div style="width: 13%">
                        <select  id="Gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non Binary">Non Binary</option>
                        </select>
                    </div>

                </div>

                <div style="font-size: 18;"class="row">
                    <div style="width:11%">
                        <label for="Manager">Manager*</label>
                    </div>
                    <div style="width: 25%">
                        <select  id="country" name="Manager">
                            <option value="Not Applicable">Not Applicable</option>
                            <?php

                              $sql = "SELECT Manager_ID,First_Name,Last_Name FROM manager_info";
                              $Space = " ";
                              $result = mysqli_query($con, $sql);
                              while($row=mysqli_fetch_array($result))
                              {
                                echo"<option value=".$row['Manager_ID'].">".$row['First_Name']."<p>&nbsp</p>".$row['Last_Name']."</option>";
                              }
                              
                            
                            ?>
                        </select>
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                        <label for="TypeOfEmployee">Type of Employee*</label>
                    </div>
                    <div style="width: 13%">
                        <select  id="TypeOfEmployee" name="TypeOfEmployee">
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                            <option value="Developer">Developer</option>
                        </select>
                    </div>

                    <div style="width:9%;margin-left: 1%;">
                        <label for="JobTitle">Job Title*</label>
                    </div>
                    <div style="width: 17%">
                        <select  id="JobTitle" name="JobTitle">
                            <option value="Not Applicable">Not Applicable</option>
                            <?php

                              $sql = "SELECT JobTitle_ID,JobTitle_Name FROM job_title";
                              $result = mysqli_query($con, $sql);
                              while($row=mysqli_fetch_array($result))
                              {
                                echo"<option value=".$row['JobTitle_ID'].">".$row['JobTitle_Name']."</option>";
                              }
                              
                            
                            ?>
                        </select>
                    </div>
                </div>
                
                <div style="font-size: 18;margin-top:1%"class="row">
                  
                </div>
              
             
              <div style="margin-top: 3%;"class="row">
                <input style="height:45px"type="submit" value="Add User">
              </div>
            </form>
          </div>
    </div>
    </div>
    <script>
      function myPassword() {
        var x = document.getElementById("myInput1");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

        function myPassword1() {
        var x = document.getElementById("myInput2");
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