<?php
	include("dbconnection.php");
	session_start();
    $name = $_POST['name'];  
    $password = $_POST['password']; 
    $email = $_POST['email'];  
    $college = $_POST['college'];  
       
      
		//to prevent from mysqli injection  
        $name = stripcslashes($name);  
        $password = stripcslashes($password);  
        $email=stripcslashes($email);
        $college=stripcslashes($college);
        $name = mysqli_real_escape_string($con, $name);  
        $password = mysqli_real_escape_string($con, $password);  
        $email=mysqli_real_escape_string($con,$email);
        $college=mysqli_real_escape_string($con,$college);
		$str="SELECT * from user WHERE email='$email'";
		$result=mysqli_query($con,$str);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
    if($count>0)    
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
			header("refresh:0;url=login.html");             
        }
		else
		{
            $str="insert into user set name='$name',email='$email',password='$password',college='$college'";
			if((mysqli_query($con,$str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
            header('location: login.html'); 					
    }
?>