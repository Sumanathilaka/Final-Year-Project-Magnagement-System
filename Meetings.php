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

   <label >Student Full Name</label>
    <input disabled="TRUE" type="text"  name="name"  required="true" value="<?php  echo $name ?>">
  <label >Student Roll No</label>
    <input disabled="true" type="text"  name="roll"  required="true" value=<?php  echo $roll ?>>
  <br>
<label >Project Topic </label>
<input disabled="true" type="text"  name="topic"  required="true" value="<?php  echo $project ?>"> 

<label >Project Domain </label>
<input disabled="true" type="text"  name="domain" required="true" value="<?php  echo $domain ?>">


<center><h3 style="color: green">Meeting Updates</h3></center>
<form action="meetingdb.php" method="POST">
<label >Subject </label>
<input type="text"  name="subject" placeholder="Subject" required="true">
<input type="hidden" name="roll" value=<?php  echo $roll ?>>

<label >Feedback</label>
<textarea  class="w3-border w3-padding ckeditor" name="feedback" id="editor1" placeholder="Write Something..........." style="width: 100%"> </textarea>
<label >Date</label>
<input type="date"  name="date" placeholder="Date" required="true">
<input type="submit" value="Submit">
</form>


<center><h3 style="color:green">Progress History</h3></center>
<?php
$sql = "SELECT *
FROM meeting 
Where roll='$roll'";

$result= mysqli_query($conn, $sql);

echo  "<table id = 'records'>"; 
echo "<tr>";
      echo  "<th>Date</th>";
      echo  "<th>Subject</th>";
      echo  "<th>Feedback</th>";
      echo "</tr>";    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {    
        echo "<tr><td>", $row['date'] , "</td><td>", $row['subject'] , "</td><td>" , $row['feedback'] ,"</td></tr>";
      
     
 }
 echo "</table>";
}
                
mysqli_close($conn);
?> 

</div> 
</body>
</html>
