<?php

include "./conn.php";
$boolFormSubmit = false;
session_start();
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["user"]) ){
  $sessionUsername = $_SESSION["user"];

  $sql = "SELECT * FROM `userlogin` WHERE `username` = '$sessionUsername'";
  $result = $conn->query($sql) ;
  $data = $result->fetch_object();

  $sessionSno = $data->{"user_sno"};
  $sessionEmail = $_SESSION["email"];
  $boolLoggedin = true;

}else{
    // exit;
}

if(isset($_GET) and isset($_GET["book_sno"])){
    $book_sno = $_GET["book_sno"];
    
    $sql = "SELECT * FROM `books` WHERE `book_sno` = '$book_sno'";
    $result = $conn->query($sql) ;
    $aff = $conn->affected_rows;
    if($aff < 1){
        echo "fail";
        return;
    }

    $data = $result->fetch_object();
    $book_category = $data->{"book_category"};
    $book_author = $data->{"book_author"};
    $book_title = $data->{"book_title"};
    $book_description = $data->{"book_description"};
    $book_price = $data->{"book_price"};
    $book_rating = $data->{"book_rating"};
    $book_image = $data->{"book_image"};
    $time = $data->{"time"};

    $sql = "INSERT INTO `cart` (`book_sno`, `user_sno`, `username`, `quantity`, `book_price`,`book_category`) VALUES ('$book_sno', '1', '$sessionUsername', '$sessionSno', '$book_price', '$book_category')";

    $result = $conn->query($sql) ;
    $aff = $conn->affected_rows;
    if($aff > 0){
        echo "success";
    }else{
        echo "fail";
    }




}

?>