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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<center>
<h1>Informatics Institute Of Technology</h1>
<h2> FYP Management System</h2></center>

<br><br>

 <div class="container">
 <form action="dbadd.php" method="POST" enctype="multipart/form-data">
   <label >Year</label>
    <input type="text"  name="year" placeholder="Year" required="true">

   <label >Student Full Name</label>
    <input type="text"  name="name" placeholder="Name" required="true">
        <label >Student IIT No</label>
    <input type="text"  name="rollno" placeholder="Roll No" required="true">
        <label > Student Email Id</label>
    <input type="text"  name="emailid" placeholder="EmailId" required="true">

<label for="department">Student Department</label>
<select  name="department">
<option value="">Select the department</option>    
<option value="CS">CS</option>   
<option value="SE">SE</option>
<br>
</select>

  <h3 style="color:green">Project Details</h3></center>
  <br>
  <label >Project Topic </label>
<textarea  class="w3-border w3-padding ckeditor" name="topic" id="editor1" placeholder="Write Something..........." style="width: 100%"> </textarea>
<br>
<label >Project Domain </label>
<input type="text"  name="domain" placeholder="Project Domain" required="true">


<label >Date</label>
<input type="date"  name="date" placeholder="Date" required="true">
<input type="submit" value="Submit">
</form>
</div> 
</body>
</html>
