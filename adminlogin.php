<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="ak.css">
</head>
<body>
  
	<div class="top">
      
    <img src="logo.jpg" align="left" width="8%">
        <h1><center><p style="color:yellow">Sanjivani College of Engineering,Kopargaon</p></center></h1>
    <h2><p style="color:white"><marquee direction="left">Student Grievance System</marquee></p></h2>
   </div>

    <div class="fixed-header">
       
            <nav>
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="register.php">Registration</a>
                <a href="login.php">Login</a>
                <a href="contact.php">Contact Us</a>
                <a href="admin.php">admin login</a>
            </nav>
       
        
    </div>
    <h3>Select Class & Department</h3>
    <form method="post" action="showcomplain.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  Select Class::<select id="course" name="course" >
                    <option value="FY">First year</option>
                    <option value="SY">Second Year</option>
                    <option value="TY">Third Year</option>
                    <option value="BE">Final Year</option>
          </select><br><br>
  	</div>
  	<div department="input-group">
  	
  	
          <label for="department">Choose Department:</label>
          <select id="department" name="department">
                    <option value="Computer">Computer</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Civil">Civil</option>
                    <option value="IT">Information technology</option>
                    <option value="E & TC">E & TC</option>
                    <option value="Electrical">Electrical</option>
                    <option value="First year">First Year</option>
                   
          </select><br><br>
       </div>   
  	<div class="input-group">
  	  <button type="submit" class="btn" name="admin_user">Check Complains</button>
  	</div>
  	</form>
     <div class="fixed-footer">
        <div class="container"><center>Copyright &copy; to Akash Kasliwal</center></div>        
    </div>
 </body>
 </html>   