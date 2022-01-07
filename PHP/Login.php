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

    <title>Login Page</title>

    <style>
        .Login-button{
            width:60%;
            border-radius:18px;  
            background-color: rgb(37, 35, 35);
            border:none;
            color: white;
            padding-top: 6px;
            padding-bottom: 6px;
            text-align: center;
            text-decoration: none;
        }

        .Login-button:hover{

            background-color: white;
            color: rgb(37, 35, 35);
            border: 1px solid rgb(37, 35, 35);
            border-color: rgb(37, 35, 35);
        }

        * {
        margin: 0;
        padding: 0;
        }


    </style>

  </head>
  <body>
    <nav style="margin-top:0px;padding-top: 0px;"class="navbar navbar-light bg-light">
        <div style="background-color: rgb(37, 35, 35);align-items: center;display: flex;justify-content: center;"class="container-fluid">
          <span class="navbar-text">
            <b style="font-size: 22px;color: white;">EMS</b>
          </span>
        </div>
    </nav>

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
    ?>
    <div style="width:20%;margin-left:40%;margin-top: 9%;";>
        <div>
            <h3 style="align-items: center;display: flex;justify-content: center;margin-bottom: 7%;">Login</h3>
        </div>
        <form action="Login_PHP.php" method="post">
            <div class="mb-3">
              <label for="Email" class="form-label">Email</label>
              <input name="Email" type="email" style="border:1px solid black" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
              <label for="Passowrd"  class="form-label">Password</label>
              <input name="Password" type="password" style="border:1px solid black" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
              <label for="UserType" class="form-label">User Type</label>
              <select  id="UserType" style="width:100%;border:1px solid #000000;height:35px;border-radius:4px" name="UserType">
                  <option value="Manager">Manager</option>
                  <option value="Admin">Admin</option>
                  <option value="Developer">Developer</option>
              </select>
            </div>
            
            <div style="padding-top: 4%;align-items: center;display: flex;justify-content: center;">
              <input  class ="Login-button" type="submit" value="Login" href="Login_PHP.php">
            </div>
        </form>

        
        <!--
        <div style="margin-top: 2%;align-items: center;display: flex;justify-content: center;">
            <a type="submit" class="Login-button" href="Developer_Dashboard.php">Login as Developer</a>
        </div>
        <div style="margin-top: 2%;align-items: center;display: flex;justify-content: center;">
            <a type="submit" class="Login-button" href="Admin_Dashboard.php" >Login as Admin</a>
        </div>
      -->
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>