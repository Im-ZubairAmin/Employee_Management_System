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

        $EmployeeType = $_GET['Type'];
        $ID = $_GET['ID'];

        if($EmployeeType == "Developer")
        {
            $sql="SELECT * FROM developer_info WHERE Developer_ID = '$ID'";
            $result = mysqli_query($con, $sql);
            $Developer=mysqli_fetch_array($result);

            $Fname = $Developer['First_Name'];
            $Lname = $Developer['Last_Name'];
            $Email = $Developer['Email'];
            $CNIC = $Developer['CNIC'];
            $Address = $Developer['Address'];
            $PhoneNumber = $Developer['Phone_Number'];
            $DateOfBirth = $Developer['DateOfBirth'];
            $Salary = $Developer['Salary'];
            $Password = $Developer['Password'];
            $LeaveDays = $Developer['Total_Leave_Days'];
            $LeaveDaysUsed = $Developer['Leave_Days_Used'];
            $JobTitle = $Developer['JobTitle'];
            $Gender = $Developer['Gender'];
            $OldManager = $Developer['Manager_ID'];

            echo'
            <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Update Developer</th>
                    </tr>
                  </thead>
                </table>
            </div>
            <br>    
            <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="Admin_PHPUpdateInformation.php" method="post">
                
            <input value="Developer" type="hidden"  name="EmployeeType" >
            <input value="'.$OldManager.'" type="hidden"  name="OldManager" >
            <input value="'.$ID.'" type="hidden"  name="ID" >

                <div style="font-size: 18;"class="row">
                    <div style="width:10%">
                        <label for="fname">First Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Fname.'"style="border-color: black;height:35px" type="text" id="fname" name="firstname" placeholder="First Name">
                    </div>
                
                    <div style="width:10%;margin-left: 4%;">
                        <label for="lname">Last Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Lname.'"style="border-color: black;height:35px" type="text" id="lname" name="lastname" placeholder="Last Name">
                    </div>
                </div>

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
                        <label for="cnic">CNIC</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$CNIC.'" style="border-color: black;height:35px" type="text" id="cnic" name="cnic" placeholder="CNIC (without dashes)">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                      <label for="StartDate">Date of Birth</label>
                    </div>
                    
                    <div style="width:20%">
                      <input value="'.$DateOfBirth.'" style="border-color: black;height:35px;border: 1px solid black;
                      border-radius: 5px;
                      background-color: #fff;
                      padding: 3px 5px;
                      box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                      width: 190px;" type="date" name="dateofbirth" id="dateofbirth">
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
                        <label for="Salary">Salary</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Salary.'"style="border-color: black;height:35px" type="text" id="Salary" name="Salary" placeholder="Salary">
                    </div>

                    <div style="width:10%;margin-left: 4%;">
                    <label for="Password">Password</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 0%;">
                    <input value="'.$Password.'" type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password" id="myInput">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword()"> Show Password
                  </div>
                    
                </div>

                

                <div style="font-size: 18;"class="row">
                    

                    <div style="width:10%;">
                        <label for="LeaveDays">Leave Days</label>
                    </div>
                    <div style="width: 25%">
                        <select value="'.$LeaveDays.'" id="LeaveDays" name="LeaveDays">
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
                        <label for="Gender">Gender</label>
                    </div>
                    <div style="width: 13%">
                        <select  value="'.$Gender.'" id="Gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non Binary">Non Binary</option>
                        </select>
                    </div>

                </div>
                ';

                

                echo'
                <div style="font-size: 18;"class="row">
                    <div style="width:10%">
                        <label for="Manager">Manager</label>
                    </div>
                    <div style="width: 25%">
                        <select  id="country" name="Manager">
                            <option value="Not Applicable">Not Applicable</option>';
                            
                              $sql = "SELECT Manager_ID,First_Name,Last_Name FROM manager_info";
                              $Space = " ";
                              $result = mysqli_query($con, $sql);
                              while($row=mysqli_fetch_array($result))
                              {
                                $ManagerID = $row['Manager_ID'];
                                $ManagerFirstName = $row['First_Name'];
                                $ManagerLastName = $row['Last_Name'];
                                echo"<option value=".$ManagerID.">".$ManagerFirstName."<p>&nbsp</p>".$ManagerLastName."</option>";
                              }
                              
                            
                            echo'
                        </select>
                    </div>
                    ';

                    echo'
                    <div style="width:9%;margin-left: 4%;">
                        <label for="JobTitle">Job Title</label>
                    </div>
                    <div style="width: 17%">
                        <select  id="JobTitle" name="JobTitle">
                            <option value="Not Applicable">Not Applicable</option>';
                            

                              $sql = "SELECT JobTitle_ID,JobTitle_Name FROM job_title";
                              $result = mysqli_query($con, $sql);
                              while($row=mysqli_fetch_array($result))
                              {
                                echo"<option value=".$row['JobTitle_ID'].">".$row['JobTitle_Name']."</option>";
                              }
                              
                            
                            echo'
                        </select>
                    </div>
                </div>
                
                <div style="font-size: 18;margin-top:1%"class="row">
                  
                </div>
              
             
              <div style="margin-top: 3%;"class="row">
                <input style="height:45px"type="submit" value="Update Developer">
              </div>
            </form>
          </div>';
        }

        if($EmployeeType == "Manager")
        {
            $sql="SELECT * FROM manager_info WHERE Manager_ID = '$ID'";
            $result = mysqli_query($con, $sql);
            $Manager=mysqli_fetch_array($result);

            $Fname = $Manager['First_Name'];
            $Lname = $Manager['Last_Name'];
            $Email = $Manager['Email'];
            $CNIC = $Manager['CNIC'];
            $Address = $Manager['Address'];
            $PhoneNumber = $Manager['Phone_Number'];
            $DateOfBirth = $Manager['DateOfBirth'];
            $Salary = $Manager['Salary'];
            $Password = $Manager['Password'];
            $LeaveDays = $Manager['Total_Leave_Days'];
            $Gender = $Manager['Gender'];

            echo'
            <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Update Manager</th>
                    </tr>
                  </thead>
                </table>
            </div>
            <br>    
            <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="Admin_PHPUpdateInformation.php" method="post">
                
            <input value="Manager" type="hidden"  name="EmployeeType" >
            <input value="'.$ID.'" type="hidden"  name="ID" >

                <div style="font-size: 18;"class="row">
                    <div style="width:10%">
                        <label for="fname">First Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Fname.'"style="border-color: black;height:35px" type="text" id="fname" name="firstname" placeholder="First Name">
                    </div>
                
                    <div style="width:10%;margin-left: 4%;">
                        <label for="lname">Last Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Lname.'"style="border-color: black;height:35px" type="text" id="lname" name="lastname" placeholder="Last Name">
                    </div>
                </div>

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
                        <label for="cnic">CNIC</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$CNIC.'" style="border-color: black;height:35px" type="text" id="cnic" name="cnic" placeholder="CNIC (without dashes)">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                      <label for="StartDate">Date of Birth</label>
                    </div>
                    
                    <div style="width:20%">
                      <input value="'.$DateOfBirth.'" style="border-color: black;height:35px;border: 1px solid black;
                      border-radius: 5px;
                      background-color: #fff;
                      padding: 3px 5px;
                      box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                      width: 190px;" type="date" name="dateofbirth" id="dateofbirth">
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
                        <label for="Salary">Salary</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Salary.'"style="border-color: black;height:35px" type="text" id="Salary" name="Salary" placeholder="Salary">
                    </div>

                    <div style="width:10%;margin-left: 4%;">
                    <label for="Password">Password</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 0%;">
                    <input value="'.$Password.'" type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password" id="myInput">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword()"> Show Password
                  </div>
                    
                </div>

                

                <div style="font-size: 18;"class="row">
                    

                    <div style="width:10%;">
                        <label for="LeaveDays">Leave Days</label>
                    </div>
                    <div style="width: 25%">
                        <select value="'.$LeaveDays.'" id="LeaveDays" name="LeaveDays">
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
                        <label for="Gender">Gender</label>
                    </div>
                    <div style="width: 13%">
                        <select  value="'.$Gender.'" id="Gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non Binary">Non Binary</option>
                        </select>
                    </div>

                </div>
                
                <div style="font-size: 18;margin-top:1%"class="row">
                  
                </div>
              
             
              <div style="margin-top: 3%;"class="row">
                <input style="height:45px"type="submit" value="Update Manager">
              </div>
            </form>
          </div>';
        }

        if($EmployeeType == "Admin")
        {
            $sql="SELECT * FROM admin_info WHERE Admin_ID = '$ID'";
            $result = mysqli_query($con, $sql);
            $Admin=mysqli_fetch_array($result);

            $Fname = $Admin['First_Name'];
            $Lname = $Admin['Last_Name'];
            $Email = $Admin['Email'];
            $CNIC = $Admin['CNIC'];
            $Address = $Admin['Address'];
            $PhoneNumber = $Admin['Phone_Number'];
            $DateOfBirth = $Admin['DateOfBirth'];
            $Salary = $Admin['Salary'];
            $Password = $Admin['Password'];
            $LeaveDays = $Admin['Total_Leave_Days'];
            $Gender = $Admin['Gender'];

            echo'
            <div style="width:90%;margin-left: 5%;margin-top: 1%;float:left;"class="jumbotron" >
                <table style="margin-bottom: 0px;padding-bottom: 0px;"class="table">
                  <thead class="table-dark">
                    <tr >
                      <th style="text-align: center;border-bottom: 1px solid white;">Update Admin</th>
                    </tr>
                  </thead>
                </table>
            </div>
            <br>    
            <form style="width:90%;margin-left: 5%;margin-top: 5%;"action="Admin_PHPUpdateInformation.php" method="post">
                
            <input value="Admin" type="hidden"  name="EmployeeType" >
            <input value="'.$ID.'" type="hidden"  name="ID" >

                <div style="font-size: 18;"class="row">
                    <div style="width:10%">
                        <label for="fname">First Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Fname.'"style="border-color: black;height:35px" type="text" id="fname" name="firstname" placeholder="First Name">
                    </div>
                
                    <div style="width:10%;margin-left: 4%;">
                        <label for="lname">Last Name</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Lname.'"style="border-color: black;height:35px" type="text" id="lname" name="lastname" placeholder="Last Name">
                    </div>
                </div>

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
                        <label for="cnic">CNIC</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$CNIC.'" style="border-color: black;height:35px" type="text" id="cnic" name="cnic" placeholder="CNIC (without dashes)">
                    </div>

                    <div style="width:15%;margin-left: 4%;">
                      <label for="StartDate">Date of Birth</label>
                    </div>
                    
                    <div style="width:20%">
                      <input value="'.$DateOfBirth.'" style="border-color: black;height:35px;border: 1px solid black;
                      border-radius: 5px;
                      background-color: #fff;
                      padding: 3px 5px;
                      box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
                      width: 190px;" type="date" name="dateofbirth" id="dateofbirth">
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
                        <label for="Salary">Salary</label>
                    </div>
                    <div style="width:25%">
                        <input value="'.$Salary.'"style="border-color: black;height:35px" type="text" id="Salary" name="Salary" placeholder="Salary">
                    </div>

                    <div style="width:10%;margin-left: 4%;">
                    <label for="Password">Password</label>
                  </div>
                  
                  <div style="width:25%;margin-left: 0%;">
                    <input value="'.$Password.'" type="password" style="border:1px solid black;height:35px;border-radius:4px"value="" name="password" id="myInput">
                    <br>
                    <input type="checkbox" style="margin-top: 8px;" onclick="myPassword()"> Show Password
                  </div>
                    
                </div>

                

                <div style="font-size: 18;"class="row">
                    

                    <div style="width:10%;">
                        <label for="LeaveDays">Leave Days</label>
                    </div>
                    <div style="width: 25%">
                        <select value="'.$LeaveDays.'" id="LeaveDays" name="LeaveDays">
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
                        <label for="Gender">Gender</label>
                    </div>
                    <div style="width: 13%">
                        <select  value="'.$Gender.'" id="Gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Non Binary">Non Binary</option>
                        </select>
                    </div>

                </div>
                
                <div style="font-size: 18;margin-top:1%"class="row">
                  
                </div>
              
             
              <div style="margin-top: 3%;"class="row">
                <input style="height:45px"type="submit" value="Update Admin">
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