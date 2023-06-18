<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center>
<h1>Informatics Institute Of Technology</h1>
<h2> FYP Management System</h2></center>
<br><br>
<?php

include_once 'config.php';

$rollno=mysqli_real_escape_string($conn, $_POST['rollno']);
$sql = "SELECT *
FROM studentinfo
where rollno='$rollno'";
    
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
   $roll=$row['rollno'];      
   $name=$row['name'];
   $email=$row['email'];
   $project=$row['topic'];
   $year=$row['year'];
   $department=$row['dep'];
   $domain=$row['domain'];
   $date=$row['date'];
	    
	    
}
}
                  

?>

<br><br>

<form action="editdb.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">


   <label >Student Full Name</label>
    <input disabled="TRUE" type="text"  name="name"  required="true" value="<?php  echo $name ?>">
        <label >Student Roll No</label>
    <input disabled="true" type="text"  name="roll"  required="true" value=<?php  echo $roll ?>>
     <input  type="hidden"  name="rollno"  required="true" value=<?php  echo $roll ?>>
        <label > Student Email Id</label>
    <input disabled="TRUE" type="text"  name="emailid" required="true" value=<?php  echo $email ?>>
    <label > Student Department</label>
    <input disabled="TRUE" type="text"  name="departmentp" required="true" value=<?php  echo $department ?>>

	
  <h3 style="color:green">Project Details</h3></center>
  <br>
<label >Project Topic </label>
<input type="text"  name="topic"  required="true" value="<?php  echo $project ?>"> 

<label >Project Domain </label>
<input type="text"  name="domain" required="true" value="<?php  echo $domain ?>">


<label >Date</label>
<input disabled="TRUE" type="date"  name="date"  required="true" value=<?php  echo $date ?> >

<input type="submit" value="Update">
</form>
    <footer style="position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;"
  <center>
  
  Logged in as :
    <?php
     echo $_SESSION['username'];
     ?>
  
  </center>
</footer>
   
</body>
</html>
</body>
</html>