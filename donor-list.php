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
    <title>Donor List </title>
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
          <h1 align="center">List Of Available Donors </h1>
          <center><div id="form">
              <table>
                  <tr>
                      <td><center><b><font color="blue">Name</font></b></center></td>
                      <td><center><b><font color="blue">fathers name</font></b></center></td>
                      <td><center><b><font color="blue">Email</font></b></center></td>
                      <td><center><b><font color="blue">Address</font></b></center></td>
                      <td><center><b><font color="blue">City</font></b></center></td>
                      <td><center><b><font color="blue">Age</font></b></center></td>
                      <td><center><b><font color="blue">Blood group</font></b></center></td>
                      <td><center><b><font color="blue">Mobile Number</font></b></center></td>
                  
                      
                  </tr> 
                  <?php
                  $q=$db->query("SELECT * FROM donor_registration ");
                 while($r1=$q->fetch(PDO::FETCH_OBJ))
                 {
                     ?>
                  <tr>
                      <td><center><?= $r1->name; ?></center></td>
                      <td><center><b><?= $r1->fname; ?></b></center></td>
                      <td><center><b><?= $r1->email; ?></b></center></td>
                      <td><center><b><?= $r1->address; ?></b></center></td>
                      <td><center><b><?= $r1->city; ?></b></center></td>
                      <td><center><b><?= $r1->age; ?></b></center></td>
                      <td><center><b><?= $r1->bgroup; ?></b></center></td>
                      <td><center><b><?= $r1->mno; ?></b></center></td>
                    

                  </tr>
                 
                     <?php
                 }

                  ?>
                 
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