<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>booking</title>
<link rel="stylesheet" href="MiniStyle.css">
<style>
#php{
    font-size:20px;
}
input[type=date] {
    border:3px solid black;
  width:300px;
   padding: 12px 20px;
   margin: 8px;
   background-color: #ffd447;
   border-radius:5px;
   font-size:20px;

    }
</style>

    
</head>
<body>
<img id="logo" background-position="top left" width="600"  src="cowell logo2.jpg">
<p id="title" class="titlepos">Booking</p>
    <nav>
         
         <ul><li> <a href="home.php">HomePage</a></li> 
         <li> <a href="dashboard.php">Dashboard</a></li>
          
         </ul>         
         </nav>
         <div id="php">
    <?php
     $dbServername="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbName="co-well";
    
     $con= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
     if (!$con) {
         die("Connection failed: " . mysqli_connect_error());
       }
       $conhos=$_SESSION['conhos'];

       $result = mysqli_query($con,"select type from  `co-well_hospitals` where name='$conhos';");
       if (mysqli_num_rows($result) > 0) 
      {    
          while($row = mysqli_fetch_assoc($result)) 
          {
            $type=$row['type'];
            $_SESSION['type']=$type;
          }
          
      }
      else 
      {
      echo "0 results";
      }  
      $result = mysqli_query($con,"select area from  `co-well_hospitals` where name='$conhos';");
      if (mysqli_num_rows($result) > 0) 
     {    
         while($row = mysqli_fetch_assoc($result)) 
         {
           $area=$row['area'];
           $_SESSION['area']=$area;
         }
         
     }
     else 
     {
     echo "0 results";
     }
    ?>

  <?php if($type=="govt"):?>
     
       <div class="gradient-border" id="container"> 
       <form action="bill.php"  onsubmit="return ver1()" method="POST" >
       <h3>You dont have to pay anything for the vaccine <br>Its free!! Thanks to the govt.</h3>
       <br>Enter Date:<br>
       <input type="date" name="dat" id="dat"  required><br><br>
       <input type="submit"  name="bill" value="Get Bill">
       </form></div>
       <?php endif; ?>
    <?php if($type=="private"):?>
        <div class="gradient-border" id="container"> 
       <form action="bill.php"   onsubmit="return ver()" method="POST" >
       <h3>Amount to be payed:Rs 1000 </h3><br>
       <br>Enter Date:<br>
       <input type="date" name="dat" id="dat"  required><br>
        Enter your card No:<br>
        <input type="number" id="cno" required><br>
        Enter your CVV:<br>
        <input type="password" id="cvv"  required><br>               
        <input type="submit" name="pay" value="pay now">
        </form></div> 
        <?php endif; ?>
    
    <?php
    if($_SESSION['rbill']=='payed') 
    {
      header('location:home.php');
    }
    if($_SESSION['rpay']=='payed') 
    {
      header('location:home.php');
    }
    ?>  
    



<script>

    function ver() {
      v=0;
     var UserDate = document.getElementById("dat").value;
     var ToDate = new Date();

     if (new Date(UserDate).getTime() <= ToDate.getTime()) 
     {
           alert("Enter a date in the future");
           v++;
           
     }
     if(document.getElementById('cno').value.toString().length !=16)
     {
            alert("card number must be exactly 16 digits");
            v++;
     }
     if(document.getElementById('cvv').value.length !=3)
        {
            alert("CVV must be exactly 3 digits");
            v++;
        }
     if(v==0)
     {
       return true;
     }
     else
     {
        return false;
     }
 }
 function ver1() {
      v=0;
     var UserDate = document.getElementById("dat").value;
     var ToDate = new Date();

     if (new Date(UserDate).getTime() <= ToDate.getTime()) 
     {
           alert("Enter a date in the future");
           v++;
           
     }
     
     if(v==0)
     {
       return true;
     }
     else
     {
        return false;
     }
 }
   



</script>

        
       

          
       </body>
       </html>       
        