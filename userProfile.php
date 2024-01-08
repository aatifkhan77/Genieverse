<?php

include "./assets/partials/conn.php";

// For Login
session_start();

$session_email = "";
if(isset($_SESSION) and isset($_SESSION["user"])){
    $session_email = $_SESSION["user"];

    $user_sno ; 
    $name ;
    $state ;
    $district ;
    $time ;
    
    $sql = "SELECT * FROM userlogin
            WHERE `user_email` = '$session_email' ";
    $result = $conn->query($sql);
    $aff = $conn->affected_rows;
      
    if($aff>0){
      
        $data=$result->fetch_object();
        $user_sno = $data->{"user_sno"};
        $name = $data->{"user_name"};
        $email = $data->{"user_email"};
        $state = $data->{"state"};
        $district = $data->{"district"};
        $time = $data->{"datetime"};
        
    }
}else{
    echo '<script>alert("Login Required!!!")</script>'; 
    header("Location: ./index.php");
}


//cart

$sql = "SELECT a.history_sno, a.user_email, a.genie_sno, a.datetime, g.userid, g.name, g.email, g.phoneno, g.occupation, g.experience, g.rating,
               u.user_sno, u.user_name , u.user_email
        FROM appointmenthistory as a, genie_profile as g, userlogin as u
        WHERE a.user_email = u.user_email and a.genie_sno = g.userid
        -- FULL JOIN userlogin ON appointmenthistory.user_email = userlogin.email
        -- FULL JOIN genie_profile ON appointmenthistory.genie_sno = genie_profile.userid; " ;

$result = $conn->query($sql);
$aff = $conn->affected_rows;

$cart = "Nothing to show here";
$count = 0 ;

if ($aff > 0) {
    $cart = "";
    while ($data = $result->fetch_object()) {

        $count = $count + 1 ;
        $history_sno = $data->{"history_sno"};

        $genie_sno = $data->{"userid"};
        $genie_name = $data->{"name"};
        $genie_email = $data->{"email"};
        $genie_phoneno = $data->{"phoneno"};
        $genie_occupation = $data->{"occupation"};
        $genie_experience = $data->{"experience"};
        $genie_rating = $data->{"rating"};
                                       
        $user_sno = $data->{"user_sno"};
        $user_name = $data->{"user_name"};
        
        $datetime = $data->{"datetime"};

        $cart .=
            "
            <tr>
                <td>$count</td>
                <td>$genie_name</td>
                <td>$genie_email</td>
                <td>&nbsp&nbsp$genie_phoneno</td>
                <td>&nbsp$genie_occupation</td>
                <td>$genie_experience</td>
                <td>&nbsp&nbsp&nbsp&nbsp$genie_rating</td>
            </tr>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> Profile | BookVerse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <hr>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-sm-10">
                <h1> <?php echo $name; ?></h1>
            </div>
            <div class="col-sm-2">
                <a href="userProfile.php" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">

                <ul class="list-group">
                    <li class="list-group-item text-muted" style="background-color: lightgrey; color:black;">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> <?=$time?> </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span> <?=$name?> </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span> <?=$email?> </li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted " style="background-color: lightgrey; color:black;">Personal Information <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>District</strong></span> <?=$district?> </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>State</strong></span> <?=$state?> </li>

                </ul>
            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs" id="myTab">
                    <li><a href="./index.php">Home</a></li>
                    <li class="active"><a href="#history" data-toggle="tab">History</a></li>
                    <li><a href="#review" data-toggle="tab">Review</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a href="./assets/php/logout.php">Log Out</a></li>
                </ul>
                <div class="tab-content">


                    <!-- For Appointment History -->
                    <div class="tab-pane active" id="history">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Genie Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Occupation</th>
                                        <th>Experience</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    <?php echo $cart; ?>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <ul class="pagination" id="myPager"></ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- For Add Review -->
                    <div class="tab-pane" id="review">
                        <hr>
                        <form class="form" id="addReviewForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="reviewName">
                                        <h4>Name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="reviewName" id="reviewName" placeholder="<?=$name;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="reviewEmail">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="reviewEmail" id="reviewEmail" placeholder="<?=$email;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="reviewRating">
                                        <h4>Rating</h4>
                                    </label>
                                    <input type="text" class="form-control" name="reviewRating" id="reviewRating" placeholder="Enter the Rating">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="reviewMessage">
                                        <h4>Review</h4>
                                    </label>
                                    <input type="text" class="form-control" name="reviewMessage" id="reviewMessage" placeholder="Leave a Comment">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" id="editBtn"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset" id="cancelEditBtn"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- For Profile Edit -->
                    <div class="tab-pane" id="settings">
                        <hr>
                        <form class="form" id="editProfileForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="editName">
                                        <h4>Name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="editName" id="editName" placeholder="<?=$name;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="<?=$email;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="editDistrict">
                                        <h4>District</h4>
                                    </label>
                                    <input type="text" class="form-control" name="editDistrict" id="editDistrict" placeholder="<?=$district;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="editState">
                                        <h4>State</h4>
                                    </label>
                                    <input type="text" class="form-control" name="editState" id="editState" placeholder="<?=$state;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" id="editBtn"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset" id="cancelEditBtn"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="./js/userEditBack.js"></script>
    <script src="./js/addDonateBack.js"></script>
    <script src="./js/reviewBack.js"></script>
    <script type="text/javascript">
    </script> 
    </script>
</body>

</html>