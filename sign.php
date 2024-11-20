<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$email = $_POST['email'];
$college = $_POST['college'];
$password = $_POST['password'];

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' ,'$college','$email' , '$password')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:account.php?q=1");
}
else
{
    $q4=mysqli_query($con,"SELECT password from user where email='$email'");
    if($password == $q4)
    {
        session_start();
         $_SESSION["email"] = $email;
         $_SESSION["name"] = $name;
        header("location:account.php?q=1");
    }
    else
   { 
    echo '<script> alert("Wrong password"); window.location.href="login.html";
    </script>';

 } }
ob_end_flush();
?>