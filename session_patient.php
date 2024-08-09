<?php
if(isset($_SESSION['patient'])){
    $email=$_SESSION['patient'];
    $sel  ="SELECT * FROM patient where email='$email'";
    $res = mysqli_query($conn,$sel); 
    $row1 = mysqli_fetch_array($res);
    $id=$row1['pid'];
    $firstname=$row1['firstname'];
    $name=$row1['lastname'];
    
 
}
else{
    header("location:index.php");
}
?>