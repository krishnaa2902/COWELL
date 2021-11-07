<?php 
session_start();
//include 'config.php';
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="co-well";
$con= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully<br>";
  
  $un=$_POST['un'];
$pass=$_POST['pass'];
echo $un."hi";
  

$sql="select* from `co-well_admin_credentials` where username='$un' and password='$pass';";
$result = mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
if($count>0){
    $_SESSION["username"]=$un;
      header("location:adminview.php");
  }
  else{
    header("location:adminlogin.php");
    echo "enter correct username and password";
  }