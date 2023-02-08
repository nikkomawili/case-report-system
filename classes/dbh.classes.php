<!-- This opens up the database connection to the database-->

<?php

class Dbh {

    // A basic method for connecting to the database
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=case-report-system_db', $username, $password);
            return $dbh;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}