<?php

//isset is not best practice
// if(isset($_POST["submitSignup"]))
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    // Grabbing the data
    // $uid = $_POST["uid"];
    // $pwd = $_POST["pwd"];
    // $pwdRepeat = $_POST["pwdRepeat"];
    // $email = $_POST["email"];

    //SQLInjection safe best practice for grabbing data from the form
    $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
    $pwdRepeat = htmlspecialchars($_POST["pwdRepeat"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars($_POST["role"], ENT_QUOTES, 'UTF-8');


    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email, $role);

    // Running error handlers and user signup
    $signup->signupUser();

    // Running methods from the ProfileInfoContr class and create a profile in the profile TABLE
    $userId = $signup->fetchUserId($uid);

    // Instantiate ProfileInfoContr class
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    // Gets the ID and UID for ProfileInfoContr
    $profileInfo = new ProfileInfoContr($userId, $uid);
    $profileInfo->deFaultProfileInfo();

    // Going back to front page
    header("location: ../user_manage.php?error=none");
}