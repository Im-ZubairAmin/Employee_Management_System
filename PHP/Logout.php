<?php

session_start();

session_unset();
session_destroy();


echo "<script> location.href='Login.php'; </script>" ;// default page
   

?>