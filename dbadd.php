<?php
session_start();
if(!isset($_SESSION['username'])) {
        header('Location:index.php');
	}
?>

<!DOCTYPE html>
<html>
<body>
       
 
<?php
       include_once 'config.php';
      $name=mysqli_real_escape_string($conn, $_POST['name']);
      $year=mysqli_real_escape_string($conn, $_POST['year']);
      $rollno=mysqli_real_escape_string($conn, $_POST['rollno']);
      $email=mysqli_real_escape_string($conn, $_POST['emailid']);
      $department=mysqli_real_escape_string($conn, $_POST['department']);
      $topic=mysqli_real_escape_string($conn, $_POST['topic']);
      $domain=mysqli_real_escape_string($conn, $_POST['domain']);
      $date=mysqli_real_escape_string($conn, $_POST['date']);
	
	
	   
	 $sql = " INSERT INTO studentinfo (name,rollno,email,dep,topic,domain,date,year) VALUES 
('$name','$rollno','$email','$department','$topic','$domain','$date','$year')";
 
if (mysqli_query($conn, $sql) === TRUE) {
   echo "<script>alert('Details Added');window.location.href='home.php';</script>";
} else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

</body>
</html>