<?php

include "./conn.php";
$boolFormSubmit = false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $boolFormSubmit = true;

    $blog_sno = $_POST["blog_sno"];
    $blog_sno = $conn->real_escape_string($blog_sno);

    $blog_username = $_POST["blog_username"];
    $blog_username = $conn->real_escape_string($blog_username);

    $name = $_POST["name"];
    $name = $conn->real_escape_string($name);

    $email = $_POST["email"];
    $email = $conn->real_escape_string($email);

    $rating = $_POST["rating"];
    $rating = $conn->real_escape_string($subject);
    
    $message = $_POST["message"];
    $message = $conn->real_escape_string($message);



    $sql = "INSERT INTO `review` (`blog_sno`,`blog_username`,`name`,`username`,`email`,`rating`,`message`) 
    VALUES ('$blog_sno','$blog_username','$name','$email','$rating','$message');" ;


    $conn->query($sql) ;

    $aff = $conn->affected_rows;

    if($aff > 0){
        echo "success";
    }else{
        echo "failed";
    }


}

?>