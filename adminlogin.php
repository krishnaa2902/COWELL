<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_login_page</title>
    <link rel="stylesheet" href="MiniStyle.css">
</head>
<body>
    
        <p id="title">Admin Login</p>
        
        <ul>

            <li> <a href='signup.php'>SignUp</a></li>
            <li> <a href='login.php'>Login</a></li>          
            <li> <a href='home.php'>HomePage</a></li>
            </ul> 
            <div class="gradient-border" id="container"> 
<form action="checkadmin.php" method="POST">
Enter UserName:<br>
<input type="text" name="un" id="un" ><br>
Enter password:<br>
<input type="password" name="pass" id="pass" ><br>
<button type="submit">Login</button>
</form>
</div>    
</body>
</html>