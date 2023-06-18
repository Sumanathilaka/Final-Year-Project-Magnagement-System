<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
<title>FYP Management System</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
<center>
<h1>Informatics Institute of Technology</h1>
<h2>FYP management System - 2023</h2></center>
<br><br>

<center><button class="buttonupdate" onclick="window.location.href='add.php'">Add New Project</button>
<br><br>

<form action="search.php" method="POST">
<input style="width: 90%" type="text" name="search" placeholder="Search by RollNo or Name">
<input  type="submit" value="search">
</form>

<?php
include_once 'config.php';

$sql = "SELECT *
FROM studentinfo";

$result= mysqli_query($conn, $sql);

echo  "<table id = 'records'>"; 
echo "<tr>";
      echo  "<th>Academic Year</th>";
      echo  "<th>Name</th>";
      echo  "<th>Roll No</th>";
      echo  "<th>Project</th>";
      echo  "<th>Domain</th>";
      echo  "<th>Details and Edit</th>";
      echo "<th> Progress and Meeting</th>";
      echo "<th> Google Drive</th>";
    
     
     
  echo "</tr>";    
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
              $roll=$row['rollno'];
        
        echo "<tr><td>", $row['year'] , "</td><td>", $row['name'] , "</td><td>" , $row['rollno'] , "</td><td>" , $row['topic'] , "</td><td>" , $row['domain'] , "</td><td><form action = 'edit.php' method = 'post'><input type = 'hidden' name = 'rollno' value = ", $roll, "><input type = 'submit' value = 'Edit'></form>","</td><td><form action = 'meetings.php' method = 'post'><input type = 'hidden' name = 'rollno' value = ", $roll, "><input type = 'submit' value = 'Status'></form>","</td><td><a href=",$row['googledrive'],"> Link </a>","</td></tr>";
      
	   
 }
 echo "</table>";
}
                
mysqli_close($conn);
?> 

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