<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selection</title>
    <link rel="stylesheet" href="MiniStyle.css">
</head>
<body>
    <?php
if(isset($_SESSION['conhos'])){
        $conhos=$_SESSION['conhos'];
        echo "<h2 class='info'>You have selected -></h2><table class='gradient-border'  ><tr><th>NAME OF HOSPITAL</th></tr><tr><td>".$conhos." hospital</td></tr></table><br>This page will automatically be redirected in 10 seconds...";
        echo "<form action='dashboard.php' method='post'>Do you want to change your selection ?<input type='submit' name='rentry' value='Re-Select'></form>";
    }
    header("refresh: 10; url = dashboard.php"); 

    ?>
    
</body>
</html>