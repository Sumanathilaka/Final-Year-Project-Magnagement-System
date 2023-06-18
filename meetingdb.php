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
      $subject=mysqli_real_escape_string($conn, $_POST['subject']);
      $feeback=mysqli_real_escape_string($conn, $_POST['feedback']);
      $rollno=mysqli_real_escape_string($conn, $_POST['roll']);
      $date=mysqli_real_escape_string($conn, $_POST['date']);
    
	
	
	   
	 $sql = " INSERT INTO meeting (subject,feedback,date,roll) VALUES 
('$subject','$feeback','$date','$rollno')";
 
if (mysqli_query($conn, $sql) === TRUE) {
   echo "<script>alert('Details Added');window.location.href='home.php';</script>";
} else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

</body>
</html>