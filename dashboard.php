<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>dashboard</title>
<link rel="stylesheet" href="MiniStyle.css">
<style>
#php{
    font-size:20px;
}
</style>
    
</head>
<body>
<img id="logo" background-position="top left" width="600"  src="cowell logo2.jpg">
<p id="title" class="titlepos">Dashboard</p>
    <nav>
         
         <ul><li> <a href="home.php">HomePage</a></li> 
         <li> <a href="logout.php">logout</a></li>
          
         </ul>         
         </nav>
         <div id="php">
    <?php
     $dbServername="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbName="co-well";
     $con= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
     if (!$con) 
       {
         die("Connection failed: " . mysqli_connect_error());
       }
        
       $name=$_SESSION["username"];   
       $ar=$_SESSION["area"];
       $fin=$_SESSION['fin'];
       $vac=$_SESSION['vac'];
       $age=$_SESSION['age'];
       $slot="slots_available_".$vac;
       $_SESSION['rpay']='';
       $_SESSION['rbill']='';
    if($_SESSION['dos']<2)
{
    echo "
    <form action='' method='post'>
    <input type='submit' name='cvac' value='Want to change Vaccine type?'></form>";
    if(isset($_POST['cvac']))
    {
        echo"
        <form action='' method='post'>
        you have currently chosen $vac:<br>
        <select id='va' name='va' required>
        <option id='va' name='va' value='covaxin' >covaxin</option>
        <option id='va' name='va' value='covishield' >covishield</option>
        </select><br>
        <input type='submit' name='cngvac' value='Confirm Type Change'></form>";
    }
    if(isset($_POST['cngvac']))
    {   $_SESSION['vac']=$_POST['va'];
        $vac=$_SESSION['vac'];
        $result = mysqli_query($con,"update `co-well_users` set vaccine ='$vac' where name='$name';");
        if($result)
        {
            echo "<h3>vaccine changed to $vac</h3>";
        }
        else
        {
            echo "error";
        }
    }
    
    

    if((!isset($_SESSION['conhos'])) || isset($_POST['rentry']))
    { 
          
       echo"<form action='' method='post'><input type='submit' name='search' value='Search Hospitals' ></form>";
    }
    if(isset($_POST['search']) )
    {  echo"<form action='' method='post' >";
       echo "We have searched all hospitals in the city and have found the following:<br>";

       if($fin=='yes')
       {    
           $result = mysqli_query($con,"select* from  `co-well_hospitals` where (type='govt' and area='$ar' and ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age));");
           if (mysqli_num_rows($result) > 0) 
           {    echo "Most suggested (available in your area):<br><br><table class='gradient-border'><tr><th>name</th><th>location</th></tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                   echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                }
                echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel' placeholder='For Eg:kauvery'required>";
                echo "<input type='submit' name='hsubmit' value='Confirm'>";
           }
           else 
           {
        
               $result = mysqli_query($con,"select* from  `co-well_hospitals` where type='govt'and ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age);");
               if (mysqli_num_rows($result) > 0) 
               {    echo "sorry we couldn't find any hopital in your area however you can select from these hospitals:<br><br><table class='gradient-border'><tr><th>name</th><th>location</th></tr><br>";
                   while($row = mysqli_fetch_assoc($result)) 
                   {
                       echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                   }
                   echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel' placeholder='For Eg:kauvery'required>";
                   echo "<input type='submit' name='hsubmit' value='Confirm'>";
               }
               else 
               {
                
                   $result = mysqli_query($con,"select* from  `co-well_hospitals` where  ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age);");
                   if (mysqli_num_rows($result) > 0) 
                   {    echo "no govt. hospitals were available.<br><table class='gradient-border'><tr><th>name</th><th>location</th></tr><br>";
                       while($row = mysqli_fetch_assoc($result)) 
                       {
                           echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                       }
                       echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel' placeholder='For Eg:kauvery' required>";
                       echo "<input type='submit' name='hsubmit' value='Confirm'>";
                   }
                   else 
                   {
                       echo "<br>Sorry we couldn't find any hospitals for your requirements";
                       echo"<br>however changing your vaccine type can help .";
                   }
               }


           }
       }
       else 
       {
           $result = mysqli_query($con,"select* from  `co-well_hospitals` where area='$ar' and type='private' and ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age);");
           if (mysqli_num_rows($result) > 0) 
           {    echo "Most suggested (available in your area):<br><table class='gradient-border'><tr><th>name</th><th>location</th></tr><br>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                   echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                }
                echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel' placeholder='For Eg:kauvery' required>";
                echo "<input type='submit' name='hsubmit' value='Confirm'>";
           }
           else 
           {
  
                 $result = mysqli_query($con,"select* from  `co-well_hospitals` where  type='private' and ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age);");
                 if (mysqli_num_rows($result) > 0) 
                {    echo "sorry we couldn't find any hopital in your area however you can select from these hospitals:<br><table class='gradient-border'><tr><th>name</th><th>location</th></tr><br>";
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                       echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                    }
                    echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel'placeholder='For Eg:kauvery' required>";
                    echo "<input type='submit' name='hsubmit' value='Confirm'>";    
                } 
                else 
                {
                       
                     $result = mysqli_query($con,"select* from  `co-well_hospitals` where   ( $slot >0) and (max_age_allowed >= $age) and (min_age_allowed <= $age);");
                     if (mysqli_num_rows($result) > 0) 
                    {    echo "no private hospitals available.<br><table class='gradient-border'><tr><th>name</th><th>location</th></tr><br>";
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                           echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td>";
                        }
                        echo "</table><br>To confirm selection enter hospital name: <input type='text' name='sel' id='sel' placeholder='For Eg:kauvery' required>";
                        echo "<input type='submit' name='hsubmit' value='Confirm'>";
                    }
                    else 
                    {
                       echo "<br>Sorry we couldn't find any hospitals for your requirements";
                       echo"<br>however changing your vaccine type can help .";
                    }
                }
           }

       }

       echo"</form>";
       
       
    
    } 
    if(isset($_POST['hsubmit']))
    {   
        $_SESSION['conhos']=$_POST['sel'];
        header("location:dashboard.php");
        
        
        
    }
    if(isset($_SESSION['conhos']))
    {   echo "<form action='selection.php' method='post'><input type='submit' name='selection' value='Show Selection'></form>";
        echo "<form action='booking.php' method='post'>Would you like to confirm booking?<input type='submit' name='book' value='Confirm Booking'></form>";
    }
}
else
{
    echo "YOU HAVE NOTHING TO FEAR NOW ,NEVERTHELESS TAKE ADEQUATE PRECAUTION AT ALL TIMES";
    echo "<br><br><br><br><img style='margin-left:35%;' src='cowell thanks2.jpg' width='400'>";
}
    
   
    

    ?>
    </div>
    
</body>
</html>