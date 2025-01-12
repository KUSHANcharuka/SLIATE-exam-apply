<?php

//Add connection
include "connect.php";

//Add details
if(isset($_POST['SUBMIT'])){
$title=$_POST['title'];
$fullName=$_POST['fullName'];
$nameWithInitials=$_POST['nameWithInitials'];
$regNumber=$_POST['regNumber'];
$address =$_POST['address'];
$mobile =$_POST['mobile'];
$email =$_POST['email'];
$gender =$_POST['gender'];
$password =$_POST['password'];
$confirmPassword =$_POST['confirmPassword'];
$department =$_POST['department'];

//checking existing customer IDs
$sql1="SELECT * FROM student WHERE Registration_number='$regNumber'";
$result1=$conn->query($sql1);
if($result1->num_rows > 0) {
    echo "<script>alert('You are already signup!')
    window.history.back();
    </script>";
}else{
//inserting customers
$sql2 = "INSERT INTO `student`(`Registration_number`,`title`,`Full_Name`,`name_with_initials`,
`gender`,`email`,`contact_number`,`address`,`deparment`,`password`,`confirm_password`) 
        VALUES('$regNumber','$title','$fullName','$nameWithInitials','$gender','$email',
        '$mobile','$address','$department','$password','$confirmPassword')";

$result2=$conn->query($sql2);

if($result2){
    echo "<script>alert('You successfully signup')
    window.history.back();
    </script>";
}}
}

//closing connection
$conn->close();
?>