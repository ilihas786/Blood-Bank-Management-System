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
    <style type="text/css">
        td{
            width:200px;
            height:40px;
        }
    </style>
    <title>Stock Blood List</title>
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
          <h1 align="center">Stock Blood List </h1>
          <center><div id="form">
              <table>
                  <tr>
                      <td><center><b><font color="blue">Name</font></b></center></td>
                      <td><center><b><font color="blue">Available Units</font></b></center></td>
         
                    
                  
                      
                  </tr> 
                  
                  <tr>
                      <td><center>O+</center></td>
                      <td><center>
                          <?php
                          $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='o+' ");
                         echo $row = $q->rowcount();

                          ?>
                      </b></center></td>
                  </tr>
                  <tr>
                      <td><center>AB+</center></td>
                      <td><center>
                      <?php
                          $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+' ");
                         echo $row = $q->rowcount();

                          ?>
                      </b></center></td>
                  </tr>
                  <tr>
                      <td><center>AB-</center></td>
                      <td><center>
                      <?php
                          $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-' ");
                         echo $row = $q->rowcount();

                          ?>
                      </center></td>
                  </tr>
                
                 
              </table>

          </div>
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