<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Exchange Blood Registration</title> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        #form1{
            width:80%;
            height: 320px;
            background-color:red;
            color:white;
            border-radius:10px;
        }
    </style>
    
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
          <h2 align="center" >Exchange Blood Donor Registration</h3> 
          <center><div id="form1">
              <form action="" method="post">
              <table>
                  <tr>
                      <td width="200px" height="50px">Enter Name</td>
                      <td  width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                      <td width="200px" height="50px">Enter Father's Name</td>
                      <td  width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name"></td>
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Enter Adderss</td>
                      <td  width="200px" height="50px"><textarea name="address"></textarea></td>
                      <td width="200px" height="50px">Enter City</td>
                      <td  width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Enter Age</td>
                      <td  width="200px" height="50px"><input type="text" name="age" placeholder="Enter age"></td>
                      <td width="200px" height="50px">Enter E-Mail </td>
                      <td  width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail"></td>
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Enter Mobile No</td>
                      <td  width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                  </tr>
                  <tr>
                      <td width="200px" height="50px">Select Blood Group</td>
                      <td width="200px" height="50px">
                          <select name="bgroup">
                              <option>o+</option>
                              <option>AB+</option>
                              <option>AB-</option>

                          </select>
                      </td> 
                      <td width="200px" height="50px">Exchange Blood group</td>
                      <td width="200px" height="50px">
                          <select name="exbgroup">
                              <option>o+</option>
                              <option>AB+</option>
                              <option>AB-</option>
                          </select>
                      </td>  
                  </tr> 
                  <tr>
                      <td><input type="submit" name="sub" value="Save"></td>
                  </tr>
              </table>
              </form>
              <?php
              if(isset($_POST['sub'])){
                  $name=$_POST['name'];
                  $fname=$_POST['fname'];
                   $address=$_POST['address'];
                  $city=$_POST['city'];
                  $age=$_POST['age'];
                  $bgroup=$_POST['bgroup'];
                  $email=$_POST['email'];
                  $mno=$_POST['mno'];
                  $exbgroup=$_POST['exbgroup'];

                  $q="SELECT * FROM donor_registration where bgroup='$bgroup' ";
                  $st=$db->query($q);
                  $num_row=$st->fetch();
                  $id=$num_row['id'];
                  $name=$num_row['name'];
                  $b1=$num_row['bgroup'];
                  $mno=$num_row['mno'];
                  $q1="INSERT INTO out_stoke_b (bname,name,mno) value(?,?,?) ";
                  $st1=$db->prepare($q1);
                  $st1->execute([$b1,$name,$mno]);
                  

                  $q=$db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,email,mno,exbgroup) VALUES(:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:exbgroup)");

                  $q->bindValue('name',$name);
                  $q->bindValue('fname',$fname);
                  $q->bindValue('address',$address);
                  $q->bindValue('city',$city);
                  $q->bindValue('age',$age);

                  $q->bindValue('bgroup',$bgroup);
                  $q->bindValue('email',$email);
                  $q->bindValue('mno',$mno);
                  $q->bindValue('exbgroup',$exbgroup);
                  if($q->execute())
                  {
                      echo "<script>alert('Donor Registered Successfully')</script>";
                  }
                  else{
                    echo "<script>alert('Donor Registration Failed')</script>";
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