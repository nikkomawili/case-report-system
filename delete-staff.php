<?php

if (isset ($_GET["id"])) {
    $id = $_GET["id"];

    include "classes/dbh.classes.php";

    $serveruser="root";
    $serverpass="";
    $connection = new PDO('mysql:host=localhost;dbname=case-report-system_db', $serveruser, $serverpass);

    $sql = "DELETE FROM staffs WHERE id=$id";

    $connection->query($sql);

    header("location: manage_staff.php");
    exit;

}