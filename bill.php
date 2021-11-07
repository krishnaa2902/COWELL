<?php
session_start();
$name=$_SESSION["username"]; 
    $vac=$_SESSION['vac'];
    $slot="slots_available_".$vac;
    $conhos=$_SESSION['conhos'];
    $age=$_SESSION['age'];
    $vac=$_SESSION['vac'];
    $type=$_SESSION['type'];
    $med=$_SESSION['med'];
    $area=$_SESSION['area'];
    $email=$_SESSION['email'];
    $date = date('Y-m-d', strtotime($_POST['dat']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bill</title>
    <link rel="stylesheet" href="MiniStyle.css">
    <style type="text/css">
    #bill{
  margin-left:25%;
  margin-right:25%;
  padding-left:15px;
  padding-top:5px;
  width:50%;
  border-radius:10px;

  background-image:url('cowell bg.jpg');
  color:black;
}
#print{
  width:20%;
  position:sticky;
  top: 100px;
  left:0px; 
  transform:translate(-210%,70%);
  
}

    </style>

</head>
</head>
<body>
<img id="logo" background-position="top left" width="600"  src="cowell logo2.jpg">
<p id="title" class="titlepos"style="margin-left:100px;">Bill</p>
<button id="print" onclick="window.print()">Print Bill</button> 

<p><br>This page will automatically be redirected in 30 seconds...<br></p>   
<div id="bill">
<?php
echo"    
<h2>Name:$name</h2><br>
<h2>Age: $age</h2><br>
<h2>Hospital booked: $conhos</h2><br>
<h2>Location of hospital: $area</h2><br>
<h2>Vaccine type: $vac</h2><br>
<h2>Date of vaccination: $date </h2><br>";
if($med=='none')
{
    echo"<h2>Medical issue:$med</h2><br>";
}
if($med!='none')
{
    echo"<h2>Medical issue:$med<br><b>(NOTE:IT IS HIGHLY RECOMMENDED THAT YOU CONSULT YOUR DOCTOR BEFORE TAKING THE VACCINE)</b></h2><br>";
}
if($type=='govt')
{
    echo "<h2>Amount payed:Rs 0</h2><br>";
}
if($type=='private')
{
    echo "<h2>Amount payed:Rs 1000</h2><br>";
}
echo "<hr><h1>THINGS TO NOTE AFTER TAKING THE VACCINE --></h1>
<h3>1.Stay at the vaccination centre for the observation period.<h3><br>
<h3>2.Care for the arm where your vaccine was injected.<h3><br>
<h3>3.Certain side effects include Itching ,Fainting ,Vomiting , Severe allergic reaction,Wheezing, difficulties in breathing or shortness of breath.<h3><br>
<h3>4.Take tablets like paracetemol and dolo-650 for ailing the symptoms.<h3><br>
<h3>5.If symptoms are unbearably severe visit the hosptial right away.<h3><br>
<h3>6.Ensure that you take up the second dose of the vaccine without fail after the 90 day perid.<h3><br>

";


?>
</div> 


<?php
     $dbServername="localhost";
     $dbUsername="root";
     $dbPassword="";
     $dbName="co-well";
    $con= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

        $_SESSION['rpay']='payed';
        $_SESSION['rbill']='payed';
    
    if(isset($_POST['pay']) || isset($_POST['bill']))
    {
        
        $result = mysqli_query($con,"update `co-well_hospitals` set $slot =($slot -1) where name='$conhos';");
        if($result)
        {
            
        }
        else
        {
            echo "error1";
        }
        $result = mysqli_query($con,"update `co-well_users` set `doses_taken` =(`doses_taken`+1) where name='$name';");
        if($result)
        {
            
        }
        else
        {
            echo "error2";
        }
    }
    header("refresh: 30; url = home.php"); 
?>
<?php
                $result = mysqli_query($con,"select* from  `co-well_users` where name='$name' ;");
                if (mysqli_num_rows($result) > 0) 
                {    
                    while($row = mysqli_fetch_assoc($result)) 
                        {

                           $doseno=$row['doses_taken'];
                           
                        }
                }
                else 
                {
                   echo "0 results";
                }

?>


<?php

            if($doseno==1)
            {
                $sql = "insert into `co-well_admin_users` (name,email,age,vaccinedose1,hospitaldose1,datedose1,vaccinedose2,hospitaldose2,datedose2) values ('$name','$email','$age','$vac','$conhos','$date','-','-','-') ;";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                  
                }
                else
                {
                  echo "error<br>";
                } 
            }
            if($doseno==2)
            {  
                $sql = "UPDATE `co-well_admin_users` SET vaccinedose2='$vac',hospitaldose2='$conhos',datedose2='$date' WHERE name='$name'";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                  
                }
                else
                {
                  echo "error<br>";
                } 
            }


?>


<?php
$uniqueid = random_int(100000, 999999);
$to_email = $email;
$subject = "CO-WELL";

$message = "<html>
<head>
<style>
h1
{
    color:#f40;
    font-size:70px;
} 
h2
{
    color:#000;
    font-size:20px;
}    
table,th,td
{   background-color:rgb(220, 255, 255); 
    font-size:40px; 
    border:5px solid #000;
}
th
{
    color:black;
    border:2px solid #000;

}
td
{
    color:rgb(0, 0, 255);
    border:2px solid #000;

}    
</style>
</head>
<body>
<h2>Congrats your vaccination booking has been confirmed kindly note the UNIQUE ID for future references<h2>
<h1 >BILL</h1>
<table>
<tr><th>NAME</th><td>".$name."</td></tr>
<tr><th>AGE</th><td>".$age."</td></tr>
<tr><th>HOSPITAL</th><td>".$conhos."</td></tr>
<tr><th>LOCATION</th><td>".$area."</td></tr>
<tr><th>DATE</th><td>".$date."</td></tr>
<tr><th>VACCINE</th><td>".$vac."</td></tr>
<tr><th>UNIQUE ID</th><td>".$uniqueid."</td></tr>
</table></body></html>";
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers .= "From: cowell19official@gmail.com";

if (mail($to_email, $subject, $message, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}


?>

</body>
</html>