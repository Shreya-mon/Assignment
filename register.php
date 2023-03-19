<?php
require 'connection.php';
$user=$_POST['user_name'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$sql="select * from user where email='$email'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $response['status']="403";
    $response['message']="Already registered!";
}
else
{
    
    $query="INSERT INTO user_details(user_name,email,password) VALUES('$user','$email','$password','$token')";
    $result=mysqli_query($con,$query);

    if($result){

        $response['status']="200";
        $response['message']="Registration successful!";
    }
    else
    {
        $response['error']="400";
        $response['message']="Registeration failed!";
    }

}

echo json_encode($response);
?>