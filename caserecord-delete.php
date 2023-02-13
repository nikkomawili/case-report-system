<?php

if (isset ($_GET["id"])) {
    $id = $_GET["id"];

    include "classes/dbh.classes.php";

    $serveruser="root";
    $serverpass="";
    $connection = new mysqli('mysql:host=localhost;dbname=case-report-system_db', $serveruser, $serverpass);

    $sql = "DELETE FROM case_reports WHERE id=$id";

    $connection->query($sql);

    header("location: caserecord.php");
    exit;

}