<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_View</title>
    <link rel="stylesheet" href="MiniStyle.css"> 

</head>

<body>
    <img id="logo" background-position="top left" width="600"  src="cowell logo2.jpg">
    <span><p id="title" class="titlepos">Admin View</p></span>
    <span><img id="homelogo" src="admin.jpg"></span>
    <nav>
    <ul>
    <li> <a href='logout.php'>Logout</a></li>
    </ul> 
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



        echo "
        <form action='' method='post'>
        <input type='submit' name='hosview' value='View Hospitals'><br> 
        </form>       
        ";
        echo "
        <form action='' method='post'>
        <input type='submit' name='addvac' value='Update Vaccine Slots'><br> 
        </form>       
        ";
        echo "
        <form action='' method='post'>
        <input type='submit' name='userview' value='View All Users'><br> 
        </form>       
        ";
        echo "
        <form action='' method='post'>
        <input type='submit' name='vacuserview' value='View Vaccinated Users'><br>  
        </form>      
        ";
        if(isset($_POST['hosview']))
        {
            $result = mysqli_query($con,"select* from  `co-well_hospitals`; ");
            if (mysqli_num_rows($result) > 0) 
            {   echo "<h1 class='info'>HOSPITALS:</h1><br><br><table class='gradient-border' ><tr><th>name</th><th>location</th><th>covaxin slots</th><th>covishield slots</th><th>Min Age Allowed</th><th>Max Age Allowed</th><th>Type of Hospital</th></tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                   echo "<tr><td> " . $row['name']. " hospital</td><td> ".$row['area']."</td><td> " . $row['slots_available_covaxin']."</td><td> " . $row['slots_available_covishield']."</td><td> " . $row['min_age_allowed']."</td><td> " . $row['max_age_allowed']."</td><td> " . $row['type']."</td>";
                }
            }    
        }
        if(isset($_POST['addvac']))
        {
            echo "
            <form action='' method='post'>
            Select hospital to update:<br>
            <select id='shos' name='shos' required>
            <option id='shos' name='shos' value='appolo' >appolo hospital</option>
            <option id='shos' name='shos' value='raju' >raju hospital</option>
            <option id='shos' name='shos' value='kauvery' >kauvery hospital</option>
            <option id='shos' name='shos' value='gandhi' >gandhi hospital</option>
            <option id='shos' name='shos' value='nehru' >nehru hospital</option>
            <option id='shos' name='shos' value='agada' >agada hospital</option>
            <option id='shos' name='shos' value='fortis' >fortis hospital</option>
            <option id='shos' name='shos' value='frontline' >frontline hospital</option>
            </select><br>
            Select vaccination type to increase slots:<br>
            <select id='av' name='av' required>
            <option id='av' name='av' value='covaxin' >covaxin</option>
            <option id='av' name='av' value='covishield' >covishield</option>
            </select>
            <br>Enter number of vaccine slots to add:<br>
            <input type='number' name='as'><br>
            <input type='submit' name='addslot' value='Update Vaccine Slots'><br>
            </form>
            ";
        }
        if(isset($_POST['addslot']))
        {   $upslot=$_POST['as'];
            $uphos=$_POST['shos'];
            $upvac=$_POST['av'];
            $updateslot="slots_available_".$upvac;
            $result = mysqli_query($con,"update `co-well_hospitals` set $updateslot =$updateslot+$upslot where name='$uphos';");
            if($result)
            {
                echo "<h3>Added $upslot slots of $upvac in $uphos hospital</h3>";
            }
            else
            {
                echo "error";
            }
        }
        if(isset($_POST['userview']))
        {
            $result = mysqli_query($con,"select* from  `co-well_users`; ");
            if (mysqli_num_rows($result) > 0) 
            {   echo "<h1 class='info' >USERS:</h1><br><br><table class='gradient-border' ><tr><th>Name</th><th>Password</th><th>Email</th><th>Mobile No</th><th>age</th><th>Area</th><th>Vaccine</th><th>Financially Stable?</th><th>Medical Condition</th><th>Doses Taken</th></tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                   echo "<tr><td> " . $row['name']. "</td><td> ".$row['password']."</td><td> " . $row['email']."</td><td> " . $row['mobile_number']."</td><td> " . $row['age']."</td><td> " . $row['area']."</td><td> " . $row['vaccine']."</td><td> " . $row['financials']."</td><td> " . $row['medical_condition']."</td><td> " . $row['doses_taken']."</td>";
                }
            }   
        }
        if(isset($_POST['vacuserview']))
        {
            $result = mysqli_query($con,"select* from  `co-well_admin_users`; ");
            if (mysqli_num_rows($result) > 0) 
            {   echo "<h1 class='info' >VACCINATED USER DETAILS:</h1><br><br><table class='gradient-border' ><tr><th>Name</th><th>Email</th><th>Age</th><th>vaccine dose 1</th><th>hospital dose 1</th><th>date dose 1</th><th>vaccine dose 2 </th><th>hospital dose 2</th><th>date dose 2</th></tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {
                   echo "<tr><td> " . $row['name']. "</td><td> ".$row['email']."</td><td> " . $row['age']."</td><td> " . $row['vaccinedose1']."</td><td> " . $row['hospitaldose1']."</td><td> " . $row['datedose1']."</td><td> " . $row['vaccinedose2']."</td><td> " . $row['hospitaldose2']."</td><td> " . $row['datedose2']."</td>";
                }
            }
        }
        ?>
        



</body>
</html>
