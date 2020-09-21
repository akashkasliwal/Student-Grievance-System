<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Registration</title>
<script>  
function validateadmin(){  
	var username=document.loginForm.username.value;  
	var password=document.loginForm.password.value;  
	  
	if (username==null || username==""){  
	  alert("Email can't be blank..."); 

	  return false;  
	}
	else if(password==null || password==""){  
		  alert("Password field cant be blank....");  
		  return false;  
		  }
	else if(password.length<6){  
			  alert("Password must be at least 6 characters long.");  
			  return false;  
			  }
	return true;
	}  
  
</script>
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
    <div>
        <form  method="post" action="admin.php">
        <?php include('errors.php'); ?>
<h1>AdminLogin</h1>
        <div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div><br>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div><br>
        <!--  <label for="class">Choose your class:</label>
          <select id="class" name="class" form="regform">
                    <option value="FY">First year</option>
                    <option value="SE">Second Year</option>
                    <option value="TE">Third Year</option>
                    <option value="BE">Final Year</option>
          </select><br><br>-->
         <div class="input-group">
  	  <button type="submit" class="btn" name="adminlogin_user">Login</button>
  	  <button type="reset" class="btn" name="adminlogin_user">Reset</button>
  	</div>

</form>
        </div>
        <div class="fixed-footer">
        <div class="container"><center>Copyright &copy; to Akash Kasliwal</center></div>        
    </div>
</body>
</html>