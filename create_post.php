<?php
require 'login.php';
$id=$_POST['id'];
$content=$_POST['content'];
$email=$_POST['email'];
if($response['status']=="200"){
    $query="INSERT INTO POST_details(POST_id,POST_content,user_email) VALUES('$id','$content','$email')";
    $result=mysqli_query($con,$query);

    if($result){

        $response['status']="200";
        $response['message']="POST successful!";
    }
    else
    {
        $response['status']="400";
        $response['message']="failed!";
    }

}
echo json_encode($response);
?>