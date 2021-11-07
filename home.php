<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
    <link rel="stylesheet" href="MiniStyle.css"> 
 
</head>

<body>
    <img id="logo" background-position="top left" width="600"  src="cowell logo2.jpg">
    <p id="title" class="titlepos">HomePage</p>
    
    <nav>
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
        if(isset($_SESSION["username"]))
        {
            echo "<ul>

            <!--<li> <a href='signup.php'>SignUp</a></li>          
            <li> <a href='login.php'>Login</a></li>-->
            <li> <a href='dashboard.php'>Dashboard</a></li>
            <li> <a href='logout.php'>Logout</a></li>
            </ul> ";
            

            $name=$_SESSION["username"];   


            $result = mysqli_query($con,"select* from  `co-well_users` where name='$name' ;");
            if (mysqli_num_rows($result) > 0) 
            {    
                while($row = mysqli_fetch_assoc($result)) 
                    {
                       $_SESSION['area']=$row['area'];
                       $_SESSION['email']=$row['email'];
                       $_SESSION['vac']=$row['vaccine'];
                       $_SESSION['fin']=$row['financials'];
                       $_SESSION['med']=$row['medical_condition'];
                       $_SESSION['dos']=$row['doses_taken'];
                       $_SESSION['age']=$row['age'];
                    }
            }
            else 
            {
               echo "0 results";
            }
            if($_SESSION['dos']==0)
            {
                echo "<h2>Hi ".$_SESSION["username"].", looks like you are yet to take your first vaccine!</h2>";
    
            }
            else if($_SESSION['dos']==1)
            {
                echo "<h2>Hi ".$_SESSION["username"].", oh great! looks like you have already taken your first dose of vaccine. Are you ready for the second one?</h2>";
                echo "<img style='margin-left:35%;' src='cowell thanks2.jpg' width='400'>";
    
            }
            else if($_SESSION['dos']>=2)
            {
                echo "<h2>Hi ".$_SESSION["username"]." ,congrats! you have taken both doses of your vaccine. </h2>";
                echo "<img style='margin-left:35%;' src='cowell thanks2.jpg' width='400'>";
            }
            
           


        }
        
        else
        {
            echo "<ul>
            <li> <a href='signup.php'>SignUp</a></li>            
            <li> <a href='login.php'>Login</a></li>
            </ul> ";
            echo "<h2>Hi ,You  are currently logged out,kindly Login or SignUp.</h2>"; 
        }

        
      
    


        ?>
        <hr>
        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="carrousel1.jpg" style="width:70%;height:400px;">
          <div class="text"></div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="carrousel2.jpg" style="width:70%;height:400px;">
          <div class="text"></div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="carrousel3.jpg" style="width:70%;height:400px;">
          <div class="text"></div>
        </div>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
        </div>
        <hr>
        <h2 class="info"><u>WHY VACCINES ARE SO EFFECTIVE?</u></h2><br>
        <iframe height="420" width="720" style="margin-left:25%;"src="https://www.youtube.com/embed/7bBmQaX2k4w">
        </iframe>
        <hr><h2 class="info"><u>VACCINATION Q&A</u></h2><br>
        <button class="accordion"><h2 class="info">Q:Will the covid vaccination provide long term protection?</h2><br></button>
       <div class="panel">
        <h3>A:Because COVID vaccines have only been developed in the past months, it’s too early to know the 
            duration of protection of COVID-19 vaccines. Research is ongoing to answer this question. 
            However, it’s encouraging that available data suggest that most people who recover from COVID-19 
            develop an immune response that provides at least some period of protection against 
            reinfection – although we’re still learning how strong this protection 
            is, and how long it lasts.</h3><br>
        </div>  
        <button class="accordion"><h2 class="info">Q:How quickly could vaccinations stop the pandemic?</h2><br></button> 
        <div class="panel">
        <h3>A:The impact of COVID-19 vaccines on the pandemic will depend on several factors. These include the 
            effectiveness of the vaccines; how quickly they are approved, manufactured, and delivered; 
            the possible development of other variants and how many people get vaccinated
            Whilst trials have shown several COVID-19 vaccines to have high levels of efficancy, 
            like all other vaccines, COVID-19 vaccines will not be 100% effective. WHO is working to help 
            ensure that approved vaccines are as effective as possible, so they can have the greatest impact on 
            the pandemic.</h3><br>
        </div>     
        <button class="accordion"><h2 class="info">Q:Can i have the second dose with a different vaccine than the first one?</h2><br></button>
        <div class="panel">
            <h3>A:Clinical trials in some countries are looking at whether you can have a first dose from one vaccine and a 
            second dose from a different vaccine. There isn't enough data yet to recommend 
            this type of combination.</h3><br>
        </div>
        

        <hr><h2 class="info"><u>COVID VACCINATION MYTHS</u></h2><br>
        <button class="accordion"><h2 class="info">MYTH: The vaccines aren’t safe because they were developed quickly. This is FALSE</h2><br></button>
        <div class="panel">
        <h3>“The COVID-19 vaccines themselves were developed quickly, but the clinical trials, which examine 
            safety and efficacy, weren’t rushed at all,” says experts. “Safety was not compromised 
            in any way. What happened quickly was finding the vaccine to test. In the 1980s, it took scientists 
            so long to do this, but thanks to scientific advances we’ve made over the years, we can find viruses 
            so quickly.” Also, he adds, COVID-19 is similar to other coronaviruses we’ve seen in humans, like MERS 
            and SARS, so there was previous research that could be used to speed up the process.</h3><br>
        </div>    
        <button class="accordion"><h2 class="info">MYTH:The vaccines can lead to long-term effects. This is FALSE.</h2><br></button>
        <div class="panel">
            <h3>“With vaccines, if there is going to be a complication or side effect (like an allergic reaction, 
            for example) it will occur within minutes to hours of receiving the vaccine,” says experts.  
            “If we’re not seeing serious side effects now, we can pretty much know 
            it will be safe down the road.”</h3><br>
        </div>
        <button class="accordion"><h2 class="info">MYTH: You can get COVID-19 from the vaccines. This is FALSE.</h2><br></button>
        <div class="panel">
        <h3>“There’s no live virus in the vaccines, so they can’t infect you,” says experts. “Basically, 
            the vaccines make our bodies produce one single protein from the virus—the protein that infects our 
            cells. By making that protein, we prevent infection. You might have side effects like a headache or 
            chills, but that’s because your body is creating an immune response, 
            not because you have an infection.”</h3><br>
        </div>
        <button class="accordion"><h2 class="info">MYTH:I’ve already had COVID-19, so I don’t need to get vaccinated. This is FALSE.</h2><br></button>
        <div class="panel">
        <h3>The Center for Disease Control (CDC) recommends that those who have had COVID-19 get the vaccine. 
            “There is preliminary evidence that the vaccine offers better protection than having had the virus,” 
            says experts. “Plus, it’s sometimes hard to know whether you actually had COVID-19. People who 
            had COVID-19 in the early days, before we had laboratory testing available, were being diagnosed based 
            upon symptoms and not a test. Also, some of the tests aren’t always 100% accurate.”</h3><br>
        </div>
        <hr><div id="footer">CONTACT US:<br><br>EMAIL:cowell19official@gmail.com<h1 style="font-size:25px;position:relative;top:-60px;left:90%;">CO-WELL</h1></div><hr>

    </nav>
    <script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

   for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}






var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
    </script>
    
</body>

</html>