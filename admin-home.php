<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <title>Admin login</title>
</head>
<body>

<div id="full">
    <div id="inner-full">
      <div id="header"> 
      <h2><a href="admin-home.php" style="text-decoration: none; color: #fff;">Blood Bank Management System</a></h2>     
      </div>
      <div id="body">
          <br>
          <?php
          $un = $_SESSION['un'];
              if(!$un){
                  header("Location:index.php");
              }
          ?>
          <h1 align="center" >Welcome Admin </h1><br>
          <center>
          <ul class="list">
              <li><a href="donor-red.php"> Donor Registration</a></li>
              <li><a href="donor-list.php"> Donor List</a></li>
              <li><a href="stoke-blood-list.php"> Stock Blood List </a></li>

          </ul> <br><br><br><br><br><br>
          <ul>
              <li><a href="ngo-reg.php" >NGO Registration</a></li>
              <li><a href="exchange-blood-list.php">Exchange Blood Registration</a></li>
              <li><a href="exchage-donor-list.php">Exchange Blood List </a></li>

          </ul>
          
            </center>

        
      </div>
      <div id="footer">
     
          <h4 align="center" > copyright @blooddonation camp.org</h4>
          <p align="center"> <a href="logout.php" > Logout</a> </p>
          
      </div>

        
    </div>
    
</div>


</body>
</html>