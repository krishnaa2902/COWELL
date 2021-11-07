<?php
   $dbServername="localhost";
   $dbUsername="root";
   $dbPassword="";
   $dbName="co-well";
   $con= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
     }
     if(isset($_POST["signup"])){
        $un=$_POST['un'];
        $pass=$_POST['pass'];
        $em=$_POST['em'];
        $num=$_POST['num'];
        $age=$_POST['age'];
        $ar=$_POST['ar'];
        $vac=$_POST['vac'];
        $fin=$_POST['fin'];
        $med=$_POST['med'];
        
        $sql = "insert into `co-well_users` values ('$un','$pass','$em','$num','$age','$ar','$vac','$fin','$med',0);";
         
      
        $result = mysqli_query($con,$sql);
        if($result){
          echo "Inserted!!<br>";
          header("location:login.php");
      }
      else{
          echo "error<br>";
      }
    } 