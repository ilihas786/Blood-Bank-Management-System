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
      <h2 align="center">Blood Bank Management System</h2>     
      </div>
      <div id="body">
          <br><br><br><br><br><br><br><br><br>
        <form action="" method="post">
          <table align="center">
              <tr>
                  <td width="200px" height="70px"><b>Enter the Username </b></td>
                  <td width="100px" height="70px"><input type="text" name="un" placeholder="Enter Username" ></td>
              </tr>
              <tr>
                  <td width="200px" height="70px"><b>Enter the password </b></td>
                  <td width="100px" height="70px"><input type="text" name="ps" placeholder="Enter password"></td>
              </tr>
              <tr>
                  <td align="center" style="margin-left: 10px;"><input type="submit" name="sub" Value="Login"  style="width:70px; height:40px;border-radius:5px;"></td>
              </tr>
           </table>
        </form>
        <?php
        if(isset($_POST['sub'])){
            $un=$_POST['un']; 
            $ps=$_POST['ps'];
           
            $q=$db->prepare("SELECT * FROM admin where uname='$un' && pass='$ps'");
            $q->execute();
            $res=$q->fetchAll(PDO::FETCH_OBJ);
          if($res){
              $_SESSION['un']=$un;
              header("Location:admin-home.php");
          }
          else{
              echo "<script> alert('Wrong User') </script>";
          }
        }
        ?>
      </div>
      <div id="footer">
          
          <h4 align="center"> copyright @blooddonation camp.org</h4>
      </div>

        
    </div>
    
</div>


</body>
</html>