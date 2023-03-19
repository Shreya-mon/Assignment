<?php

  require 'connection.php';

  $email=$_POST['email'];
  $password=md5($_POST['password']);

  $query="SELECT * FROM user_details WHERE email='$email'";

  $result=mysqli_query($con,$query);



  if(mysqli_num_rows($result)>0){ 

        $checkUserquery="SELECT user_name, email FROM user_details WHERE email='$email' and password='$password'";
        $result=mysqli_query($con,$checkUserquery);
        
        if(mysqli_num_rows($result)>0){
            $str=rand(100,1000);
        $token=md5($str);
        mysqli_query($con,"update user_details set token='$token'");
        while($row=$result->fetch_assoc())
        
        $response['user']=$row;
        $response['status']="200";
        $response['message']="login successful";
        }
        else{
        $response['user']=(object)[];
        $response['status']="400";
        $response['message']="Wrong credentials";

        }
    
        
    }
else{

        $response['user']=(object)[];
        $response['error']="400";
        $response['message']="user does not exist";


  }

  echo json_encode($response);
    
?>