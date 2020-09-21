<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="ak.css">
  <script>  
function validateform(){  
var name=document.myform.uname.value;  
var password=document.myform.pass.value;
var email=document.myform.email.value;
  
if (name==null || name==""){  
  alert("Please enter Name");  
  return false;  
}
else if(email==null || email==""){  
	  alert("Please enter email..");  
	  return false;  
	  }
else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }
else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
  
</script>
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
    <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  Username::<input type="text" name="username" value="<?php echo $username; ?>"><br><br>
  	</div>
  	<div class="input-group"> 
  	  Email::<input type="email" name="email" value="<?php echo $email; ?>"><br><br>
  	</div>
  	<div class="input-group">
  	
  	   Password::<input type="password" name="password_1"><br><br>
  	</div>
  	<div class="input-group">
  	  Confirm Password::<input type="password" name="password_2"><br><br>
  	</div>
  	<div class="input-group">
  	  Class::<select id="class" name="class" >
                    <option value="FY">First year</option>
                    <option value="SY">Second Year</option>
                    <option value="TY">Third Year</option>
                    <option value="BE">Final Year</option>
          </select><br><br>
  	</div>
  	<div department="input-group">
  	
  	
          <label for="department">Choose your Department:</label>
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
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  <div class="fixed-footer">
        <div class="container"><center>Copyright &copy; to Akash Kasliwal</center></div>        
    </div>
  
</body>
</html>