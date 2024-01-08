<?php

include "./conn.php";
$boolFormSubmit = false;

if(isset($_GET) and isset($_GET["check"])){
    $username = $_GET["checkUsername"];

    $sql = "SELECT * FROM `userlogin` WHERE `username` = '$username'";
    $conn->query($sql) ;
    $aff = $conn->affected_rows;
    if($aff > 0){
        echo "fail";
        return;
    }else{
        echo "success";
    }

}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $boolFormSubmit = true;

    $name = $_POST["name"];
    $name = $conn->real_escape_string($name);
    $username = $_POST["username"];
    $username = $conn->real_escape_string($username);
    $phoneno = $_POST["phoneno"];
    $phoneno = $conn->real_escape_string($phoneno);
    $address = $_POST["address"];
    $address = $conn->real_escape_string($address);


    $sql = "SELECT * FROM `userlogin` WHERE `email` = '$email'";
    $conn->query($sql) ;
    $aff = $conn->affected_rows;
    if($aff < 0){
        echo "Sorry!!! Try Again";
        return;
    }

        $sql = "UPDATE `userlogin`
                SET `name`='$name',`username`='$username',`phoneno`='$phoneno',`address`='$address') 
                WHERE `email` = '$email'; " ;


        $conn->query($sql) ;

        $aff = $conn->affected_rows;

        if($aff > 0){
            echo "Success";
        }else{
            // echo "Failed";
            echo mysqli_error($conn) ;
        }
}


?>