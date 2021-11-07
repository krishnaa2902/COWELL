<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup_page</title>
    <link rel="stylesheet" href="MiniStyle.css">
       
</head>
<body>

<p id="title">SignUp</p>
<div class="gradient-border" id="container" >
      <form action="config.php" name="frm" method="post" onsubmit="return ver()"  >
          UserName:<br>
          <input type="text" name="un" id="un" required><br>
          Password:<br>
          <input type="password" name="pass" id="pass" required><br>
          E-mail ID:<br>
          <input type="text" name="em"id="em" pattern="[a-zA-Z0-9.+_&$#^]+@[a-z]+\.[a-z]{2,}$" required><br>
          Mobile no:<br>
          <input type="number" name="num" id="num" required><br>
          Age:<br>
          <input type="number" name="age" id="age" required><br>
          Area:<br>
          <select id="ar" name="ar" required>
          <option id="ar" name="ar" value="T.Nagar" >T.Nagar</option>
          <option id="ar" name="ar" value="Teynampet" >Teynampet</option>
          <option id="ar" name="ar" value="Mylapore" >Mylapore</option>
          <option id="ar" name="ar" value="Tambaram" >Tambaram</option>
          <option id="ar" name="ar" value="Chrompet" >Chrompet</option>
          <option id="ar" name="ar" value="Mambalam" >Mambalam</option>
          <option id="ar" name="ar" value="Other" >Other</option>
          </select><br>
          Preferred vaccine:<br>
          <input  type="radio" id="vac" name="vac" value="covaxin" required>covaxin<br>
          <input  type="radio" id="vac" name="vac" value="covishield">covishield<br>
          Financially poor:<br>
          <input type="radio" id="fin" name="fin" value="yes" required>Yes<br>
          <input type="radio" id="fin" name="fin" value="no" required>No<br>
          Medical condition/illness:<br>
          <input type="text" name="med" id="med" value="none" required><br>
<input type="submit" name="signup" value="signup" >
          <button><a href="login.php">already signedup?</a></button>
      </form> </div>
<script>
    function ver()
    {
        var v=0;
        if(document.getElementById('num').value.toString().length !=10)
        {
            alert("number must be exactly 10 digits");
            v++;
        }
        if(document.getElementById('age').value<18 || document.getElementById('age').value>60)
        {
            alert("Only people between the age 18-60 are eligible for vaccine");
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
