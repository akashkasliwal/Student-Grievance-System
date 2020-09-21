<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
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
                <a href="index.php?logout='1'" style="color: red;">logout</a>
            </nav>
       
        
    </div>
   <center><h3>Complains registered till date</h3></center> 
    <?php
    //admin

/* Attempt MySQL server connection. Assuming you are running MySQL
 server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "", "demo");

// Check connection


// Attempt select query execution
if (isset($_POST['admin_user'])) {
    $db = mysqli_connect('localhost', 'root', '123456', 'registration');
    
    $course = mysqli_real_escape_string($db, $_POST['course']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    if($course=="FY")
    {
        if($department=="First year")
        {
      $sql = "SELECT * FROM fycomplain";
      if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
    }
    
    if($course=="SY")
    {
        if($department=="Computer")
        {
            $sql = "SELECT * FROM sycomputercomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Mechanical")
        {
            $sql = "SELECT * FROM symechanicalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Civil")
        {
            $sql = "SELECT * FROM sycivilcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="IT")
        {
            $sql = "SELECT * FROM syitcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="E & TC")
        {
            $sql = "SELECT * FROM syentccomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Electrical")
        {
            $sql = "SELECT * FROM syelectricalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
    }
    if($course=="TY")
    {
        
        
        if($department=="Computer")
        {
            $sql = "SELECT * FROM tycomputercomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Mechanical")
        {
            $sql = "SELECT * FROM tymechanicalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Civil")
        {
            $sql = "SELECT * FROM tycivilcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="IT")
        {
            $sql = "SELECT * FROM tyitcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="E & TC")
        {
            $sql = "SELECT * FROM tyentccomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Electrical")
        {
            $sql = "SELECT * FROM tyelectricalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
    }
    if($course=="BE")
    {
        if($department=="Computer")
        {
            $sql = "SELECT * FROM becomputercomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Mechanical")
        {
            $sql = "SELECT * FROM bemechanicalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Civil")
        {
            $sql = "SELECT * FROM becivilcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="IT")
        {
            $sql = "SELECT * FROM beitcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="E & TC")
        {
            $sql = "SELECT * FROM beentccomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
        if($department=="Electrical")
        {
            $sql = "SELECT * FROM beelectricalcomplain";
            if($result = mysqli_query($db, $sql)){
                if(mysqli_num_rows($result) > 0){
                    ?>
        <table border="1" color="black">
        <tr>
        <th>Complain_no</th>
        <th>Student</th>
        <th>Faculty</th>
        <th>Hostel</th>
        <th>Library</th>
        <th>Canteen</th>
        <th>Studentsection</th>
        <th>Supportingstaff</th>
        <th>Sports</th>
        <th>Accountsection</th>
        </tr>
        <?php 
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['complain_no'] . "</td>";
            echo "<td>" . $row['student'] . "</td>";
            echo "<td>" . $row['faculty'] . "</td>";
            echo "<td>" . $row['hostel'] . "</td>";
            echo "<td>" . $row['library'] . "</td>";
            echo "<td>" . $row['canteen'] . "</td>";
            echo "<td>" . $row['studentsection'] . "</td>";
            echo "<td>" . $row['supportingstaff'] . "</td>";
            echo "<td>" . $row['sports'] . "</td>";
            echo "<td>" . $row['accountsection'] . "</td>";
            echo "</tr>";
            
        }
       
        
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
        }
    }
}

    ?>
     <div class="fixed-footer">
        <div class="container"><center>Copyright &copy; to Akash Kasliwal</center></div>        
    </div>
</body>
</html>
