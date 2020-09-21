<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '123456', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $class = mysqli_real_escape_string($db, $_POST['class']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($class)) { array_push($errors, "Class is required"); }
    if (empty($department)) { array_push($errors, "department is required"); }
    
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    if($class=="FY"){
    
    $user_check_query = "SELECT * FROM fy WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        
        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
    }
    
    else if($class=="SY"){
        
        $user_check_query = "SELECT * FROM sy WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
    }
    
    else if($class=="TY"){
        
        $user_check_query = "SELECT * FROM ty WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
    }
    
    else if($class=="BE"){
        
        $user_check_query = "SELECT * FROM be WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
    }
    // Finally, register user if there are no errors in the form
    if($class=="FY")
    {
        
       if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        $query = "INSERT INTO fy (username, email, password,class,department)
  			  VALUES('$username', '$email', '$password','$class','$department')";
        mysqli_query($db, $query);
       // $_SESSION['username'] = $username;
       // $_SESSION['success'] = "You are now logged in";
        echo "<script>
               alert('Registered successfully !');
               window.location.href='login.php';
               </script>";  
      }
    }
    else if($class=="SY")
    {
        
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            
            $query = "INSERT INTO sy (username, email, password,class,department)
  			  VALUES('$username', '$email', '$password','$class','$department')";
            mysqli_query($db, $query);
           // $_SESSION['username'] = $username;
          //  $_SESSION['success'] = "You are now logged in";
            echo "<script>
               alert('Registered successfully !');
               window.location.href='login.php';
               </script>";  
        }
    }
    else if($class=="TY")
    {
        
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            
            $query = "INSERT INTO ty (username, email, password,class,department)
  			  VALUES('$username', '$email', '$password','$class','$department')";
            mysqli_query($db, $query);
          
            echo "<script>
               alert('Registered successfully !');
               window.location.href='login.php';
               </script>";  
        }
    }
    else if($class=="BE")
    {
        
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            
            $query = "INSERT INTO be (username, email, password,class,department)
  			  VALUES('$username', '$email', '$password','$class','$department')";
            mysqli_query($db, $query);
           // $_SESSION['username'] = $username;
          //  $_SESSION['success'] = "You are now logged in";
            echo "<script>
               alert('Registered successfully !');
               window.location.href='login.php';
               </script>";  }
    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $course = mysqli_real_escape_string($db, $_POST['course']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    if($course=="FY")
    {
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM fy WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['course'] = $_POST['course'];
            $_SESSION['department'] = $_POST['department'];
            $_SESSION['success'] = "You are now logged in";
            header('location: welcome.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
    }
    
    elseif($course=="SY")
    {
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM sy WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['course'] = $_POST['course'];
                $_SESSION['department'] = $_POST['department'];
                $_SESSION['success'] = "You are now logged in";
                header('location: welcome.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
    
    elseif($course=="TY")
    {
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM ty WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['course'] = $_POST['course'];
                $_SESSION['department'] = $_POST['department'];
                $_SESSION['success'] = "You are now logged in";
                header('location: welcome.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
    
    elseif($course=="BE")
    {
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM be WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['course'] = $_POST['course'];
                $_SESSION['department'] = $_POST['department'];
                $_SESSION['success'] = "You are now logged in";
                header('location: welcome.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
}
   
  


//admin login
if (isset($_POST['adminlogin_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    if($username==("sanjivani") && $password==("sanjivani"))
    {
       header("location:adminlogin.php");
    }
    else {
        array_push($errors, "Wrong username/password combination");
    }
}

//complain register

if (isset($_POST['complain_user'])) 
{
   
    $field = mysqli_real_escape_string($db, $_POST['field']);
    $complain = mysqli_real_escape_string($db, $_POST['complain']);
    $course = $_SESSION['course'];
    $department = $_SESSION['department'];
    if ($course=="FY") {
        /// your code here
        if($department=="First year")
        {
        if($field==("student"))
        {
            
            $query="insert INTO fycomplain(student) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";  
            
        }
        if($field==("faculty"))
        {
           
            
            $query="insert INTO fycomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
       
            
        }
        if($field==("hostel"))
        {
          
            
            $query="insert INTO fycomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
             echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
        
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO fycomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
        }
         if($field==("canteen"))
        {
           
            
            $query="insert INTO fycomplain(canteen) values('$complain')";       
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
        }
            if($field==("studentsection"))
        {
         
            $query="insert INTO fycomplain(studentsection) values('$complain')";   
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
        }
            if($field==("supportingstaff"))
        {
         
            $query="insert INTO fycomplain(supportingstaff) values('$complain')";  
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
        }
            if($field==("sports"))
        {
           
            
            $query="insert INTO fycomplain(sports) values('$complain')";  
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
        }
            if($field==("accountsection"))
            {
                
                
                $query="insert INTO fycomplain(accountsection) values('$complain')";      
                mysqli_query($db, $query);
                
                echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";  
            }
        }
    }
    
    
    
    elseif ($course=="SY") 
    {
       
        if($department=="Computer")
        {
           
        if($field==("student"))
        {
            session_status();
            $query="insert INTO sycomputercomplain(student) values('$complain')";
            
            mysqli_query($db, $query);
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
           
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO sycomputercomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO sycomputercomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
       if($field==("library"))
        {
            
            
            $query="insert INTO sycomputercomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO sycomputercomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO sycomputercomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO sycomputercomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO sycomputercomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO sycomputercomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    
    if($department=="Mechanical")
    {
        
        if($field==("student"))
        {
            session_status();
            $query="insert INTO symechanicalcomplain(student) values('$complain')";
            echo "done";
            mysqli_query($db, $query);
            
            
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO symechanicalcomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO symechanicalcomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO symechanicalcomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO symechanicalcomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO symechanicalcomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO symechanicalcomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO symechanicalcomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO symechanicalcomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    if($department=="Civil")
    {
        
        if($field==("student"))
        {
            session_status();
            $query="insert INTO sycivilcomplain(student) values('$complain')";
            echo "done";
            mysqli_query($db, $query);
            
            
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO sycivilcomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO sycivilcomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO sycivilcomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO sycivilcomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO sycivilcomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO sycivilcomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO sycivilcomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO sycivilcomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    if($department=="IT")
    {
        
        if($field==("student"))
        {
            session_status();
            $query="insert INTO syitcomplain(student) values('$complain')";
            echo "done";
            mysqli_query($db, $query);
            
            
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO syitcomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO syitcomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO syitcomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO syitcomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO syitcomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO syitcomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO syitcomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO syitcomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    if($department=="E & TC")
    {
        
        if($field==("student"))
        {
            session_status();
            $query="insert INTO syentccomplain(student) values('$complain')";
            echo "done";
            mysqli_query($db, $query);
            
            
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO syentccomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO syentccomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO syentccomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO syentccomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO syentccomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO syentccomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO syentccomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO syentccomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    if($department=="Electrical")
    {
        
        if($field==("student"))
        {
            session_status();
            $query="insert INTO syelectricalcomplain(student) values('$complain')";
            echo "done";
            mysqli_query($db, $query);
            
            
            
        }
        if($field==("faculty"))
        {
            
            
            $query="insert INTO syelectricalcomplain(faculty) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
            
            
        }
        if($field==("hostel"))
        {
            
            
            $query="insert INTO syelectricalcomplain (hostel) values('$complain')";
            if(mysqli_query($db, $query)){
                echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                
        }
        if($field==("library"))
        {
            
            
            $query="insert INTO syelectricalcomplain(library) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("canteen"))
        {
            
            
            $query="insert INTO syelectricalcomplain(canteen) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("studentsection"))
        {
            
            $query="insert INTO syelectricalcomplain(studentsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("supportingstaff"))
        {
            
            $query="insert INTO syelectricalcomplain(supportingstaff) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("sports"))
        {
            
            
            $query="insert INTO syelectricalcomplain(sports) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
        if($field==("accountsection"))
        {
            
            
            $query="insert INTO syelectricalcomplain(accountsection) values('$complain')";
            mysqli_query($db, $query);
            
            echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
        }
    }
    
 }
  
 elseif ($course=="TY")
 {
     
     if($department=="Computer")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tycomputercomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tycomputercomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tycomputercomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tycomputercomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tycomputercomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tycomputercomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tycomputercomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tycomputercomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tycomputercomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
     
     if($department=="Mechanical")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tymechanicalcomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tymechanicalcomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tymechanicalcomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tymechanicalcomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tymechanicalcomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tymechanicalcomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tymechanicalcomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tymechanicalcomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tymechanicalcomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
     if($department=="Civil")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tycivilcomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tycivilcomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tycivilcomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tycivilcomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tycivilcomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tycivilcomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tycivilcomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tycivilcomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tycivilcomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
     if($department=="IT")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tyitcomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tyitcomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tyitcomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tyitcomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tyitcomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tyitcomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tyitcomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tyitcomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tyitcomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
     if($department=="E & TC")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tyentccomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tyentccomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tyentccomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tyentccomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tyentccomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tyentccomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tyentccomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tyentccomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tyentccomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
     if($department=="Electrical")
     {
         
         if($field==("student"))
         {
             session_status();
             $query="insert INTO tyelectricalcomplain(student) values('$complain')";
             echo "done";
             mysqli_query($db, $query);
             
             
             
         }
         if($field==("faculty"))
         {
             
             
             $query="insert INTO tyelectricalcomplain(faculty) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             
             
         }
         if($field==("hostel"))
         {
             
             
             $query="insert INTO tyelectricalcomplain (hostel) values('$complain')";
             if(mysqli_query($db, $query)){
                 echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                 
         }
         if($field==("library"))
         {
             
             
             $query="insert INTO tyelectricalcomplain(library) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("canteen"))
         {
             
             
             $query="insert INTO tyelectricalcomplain(canteen) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("studentsection"))
         {
             
             $query="insert INTO tyelectricalcomplain(studentsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("supportingstaff"))
         {
             
             $query="insert INTO tyelectricalcomplain(supportingstaff) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("sports"))
         {
             
             
             $query="insert INTO tyelectricalcomplain(sports) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
         if($field==("accountsection"))
         {
             
             
             $query="insert INTO tyelectricalcomplain(accountsection) values('$complain')";
             mysqli_query($db, $query);
             
             echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
         }
     }
 }
     elseif ($course=="BE")
     {
         
         if($department=="Computer")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO becomputercomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO becomputercomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO becomputercomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO becomputercomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO becomputercomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO becomputercomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO becomputercomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO becomputercomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO becomputercomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
         
         if($department=="Mechanical")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO bemechanicalcomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO bemechanicalcomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO bemechanicalcomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO bemechanicalcomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
         if($department=="Civil")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO becivilcomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO becivilcomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO becivilcomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO becivilcomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO becivilcomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO becivilcomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO becivilcomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO becivilcomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO becivilcomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
         if($department=="IT")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO beitcomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO beitcomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO beitcomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO beitcomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO beitcomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO beitcomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO beitcomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO beitcomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO beitcomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
         if($department=="E & TC")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO beentccomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO beentccomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO beentccomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO beentccomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO beentccomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO beentccomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO beentccomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO beentccomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO beentccomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
         if($department=="Electrical")
         {
             
             if($field==("student"))
             {
                 session_status();
                 $query="insert INTO beelectricalcomplain(student) values('$complain')";
                 echo "done";
                 mysqli_query($db, $query);
                 
                 
                 
             }
             if($field==("faculty"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain(faculty) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
                 
                 
             }
             if($field==("hostel"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain (hostel) values('$complain')";
                 if(mysqli_query($db, $query)){
                     echo "<script>
               alert(' success!! !');
               window.location.href='final.php';
               </script>";}
                     
             }
             if($field==("library"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain(library) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("canteen"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain(canteen) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("studentsection"))
             {
                 
                 $query="insert INTO beelectricalcomplain(studentsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("supportingstaff"))
             {
                 
                 $query="insert INTO beelectricalcomplain(supportingstaff) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("sports"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain(sports) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
             if($field==("accountsection"))
             {
                 
                 
                 $query="insert INTO beelectricalcomplain(accountsection) values('$complain')";
                 mysqli_query($db, $query);
                 
                 echo "<script>
              alert(' success!! !');
               window.location.href='final.php';
               </script>";
             }
         }
     }
     


// Close connection
mysqli_close($db);
}
?>
