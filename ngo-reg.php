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
    <title>NGO Registration</title>
</head>
<body>

<div id="full">
    <div id="inner-full">
      <div id="header"> 
      <h2><a href="admin-home.php"  align="center" style="text-decoration: none; color: #fff;">Blood Bank Management System</a></h2>     
      </div>
      <div id="body">
          <br>
          <?php
           $un = $_SESSION['un'];
              if(!$un){
                  header("Location:index.php");
              }
          ?>
          <h1 align="center">NGO registration </h1>
          <center><div id="form">
              <form action="" method="post">
              <table>
                  <tr>
                      <td width="200px" height="50px">Enter the Director Identification Number </td>
                      <td  width="200px" height="50px"><input type="text" name="DIN" placeholder="Enter DIN"></td>
                      <td width="200px" height="50px">No of Share Holders</td>
                      <td  width="200px" height="50px"><input type="text" name="shareholder" placeholder="No of Share Holders"></td>
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Registered Office Address</td>
                      <td  width="200px" height="50px"><textarea name="address"></textarea></td>
                      <td width="200px" height="50px">Enter City</td>
                      <td  width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                  </tr>
                  <tr>
                      <td width="290px" height="50px">Enter Name of The Director</td>
                      <td  width="200px" height="50px"><input type="text" name="director" placeholder="Enter director"></td>
                  
                     
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Enter Email</td>
                      <td  width="200px" height="50px"><input type="text" name="email" placeholder="Enter EMail"></td>
                      <td width="200px" height="50px">Enter Contact Number No</td>
                      <td  width="200px" height="50px"><input type="text" name="mno" placeholder="Contact Number"></td>
                  </tr>
                  <tr>
                      <td><input type="submit" name="sub" value="Save"></td>
                  </tr>
              </table>
              </form>
              <?php
              if(isset($_POST['sub'])){
                  $DIN=$_POST['DIN'];
                  $shareholder=$_POST['shareholder'];
                   $address=$_POST['address'];
                  $city=$_POST['city'];
                  $director=$_POST['director'];
            
                  $email=$_POST['email'];
                  $mno=$_POST['mno'];
                  $q=$db->prepare("INSERT INTO avl_ngo (DIN,shareholder,address,city,director,email,mno) VALUES(:DIN,:shareholder,:address,:city,:director,:email,:mno)");
                  $q->bindValue('DIN',$DIN);
                  $q->bindValue('shareholder', $shareholder);
                  $q->bindValue('address',$address);
                  $q->bindValue('city',$city);
                  $q->bindValue('director', $director);
                  $q->bindValue('email',$email);
                  $q->bindValue('mno',$mno);
                  if($q->execute())
                  {
                      echo "<script>alert(' Registered Successfully')</script>";
                  }
                  else{
                    echo "<script>alert('Registration Failed')</script>";
                  }
              }
              ?>

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