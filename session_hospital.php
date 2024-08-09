<?php
if(isset($_SESSION['hospital'])){
    $email=$_SESSION['hospital'];
    $sel  ="SELECT * FROM hospital_registration join city on city.cityid = hospital_registration.city where email_id='$email'";
    $res = mysqli_query($conn,$sel); 
    $row1 = mysqli_fetch_array($res);
    $hid=$row1['hid'];
    $name=$row1['hospital_name'];
    $logo=$row1['logo'];
    $address=$row1['address'];
    $mobileno=$row1['mobileno'];
    $newcase=$row1['h_newcasefees'];
    $oldcase=$row1['h_oldcasefees'];
    $city=$row1['cityname'];
 
}
else{
    header("location:../index.php");
}
?>