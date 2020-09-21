<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home page</title>

 <style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */
    body{        
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
        
    }
    
    .top{
        width: 100%;
        margin: 0 auto; /* Center the DIV horizontally */
        background: #8A2BE2;
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background: #333;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    .fixed-footer{
        bottom: 0;
    }    
    /* Some more styles to beutify this example */
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
    .container p{
        line-height: 200px; /* Create scrollbar to test positioning */
    }
</style>
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
                <a href="index.php?logout='1'" style="color: red;">logout</a>
            </nav>
       
        
    </div>
    

 <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) : ?>
    	<center><p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p></center>
    	
    <?php endif ?>
</div>
<div>
<!--  <center><h2><p>Welcome, <%=session.getAttribute("username")%></p></h2></center>-->


<!--  String course=request.getParameter("course");-->
<!--  <img src="C:\Users\Shri\Downloads\akash\akash\a.png" align="right" width="50%">-->
<form action="welcome.php" method="Post"> 
<?php include('errors.php'); ?>
        <h2>Complain form</h2>
        <div class="input-group">
            
          <label for="field">Choose your complain field:</label>
          <select id="field" name="field" >
                    <option value="student">Regarding Students </option>
                    <option value="faculty">Regarding Faculty</option>
                    <option value="hostel">Regarding Hostel</option>
                    <option value="library">Regarding Library</option>
                     <option value="canteen">Regarding canteens</option>
                      <option value="studentsection">Student Section</option>
                       <option value="supportingstaff">Supporting Staff</option>
                        <option value="sports">Regarding Sports</option>
                        <option value="account">Account Section</option>
          </select><br><br>
        </div>
          <div class="input-group">
          Enter complain here::<textarea name="complain"></textarea><br><br>
          </div>
          <div class="input-group">
  	  <button type="submit" class="btn" name="complain_user">Submit</button>
  	</div>
        </form>
</div>
    <div class="fixed-footer">
        <div class="container"><center>Copyright &copy; to Akash Kasliwal</center></div>        
    </div>
</body>
</html>