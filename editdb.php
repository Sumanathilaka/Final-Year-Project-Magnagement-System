<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
       
 
<?php
include_once 'config.php';
  
      $topic=mysqli_real_escape_string($conn, $_POST['topic']);
      $domain=mysqli_real_escape_string($conn, $_POST['domain']);
      $roll=mysqli_real_escape_string($conn, $_POST['rollno']);
	 
$sql =  "UPDATE studentinfo SET topic='$topic' WHERE rollno='$roll' ";
$sql2 = "UPDATE studentinfo SET domain='$domain' WHERE rollno='$roll' ";
 
	
	
$result= mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql2) === TRUE) {
   echo "<script>alert('Details Added');window.location.href='home.php';</script>";
} else {
         echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>







   </body>
</html>