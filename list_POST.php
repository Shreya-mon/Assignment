<?php
require 'login.php';
$email=$_POST['email'];
if($response['status']=='200'){
    $sql="select POST_content from POST_details where user_email='$email'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        
        while($row1=$res->fetch_assoc()){
            $response['user']=$row1;
            $response['status']="200";
            $response['message']="your post list";
        }
        echo json_encode($response);
    }
    else{

            $response['status']="400";
            $response['users'][]="";
        
        
    }
    
}


?>