<!-- Grabs the data from the Login Form -->

<?php

// Gets that the submit button is "true"
if (isset($_POST['submitLogin'])) 
// isset is outdated, not best practice

// if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    // Grabbing the data from the form

    // Vulnerable to SQLInjections due to special characters might be detected as a query in the database
    // $uid = $_POST['uid'];
    // $pwd = $_POST['pwd'];

    // SQLInjection fix
    $uid = htmlspecialchars($_POST['uid'], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST['pwd'], ENT_QUOTES, 'UTF-8');

    // Instantiate LoginContr class
    // These include statements are instantiated procedurally
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and User Signup
    $login->loginUser();

    // Going back to the front page
    header("location: ../index.php?error=none");
}