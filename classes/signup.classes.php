<!-- Does all of the general database queries -->
<!-- This is a MODEL class which handles all the database connections -->

<?php

class Signup extends Dbh {

    // Signs up the user and puts his data into the database
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        // This build-in SQLi function hashes the password for the user
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

        // Checks if the user inputted in the form exists in the database
        protected function checkUser($uid, $email) {
            $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    
            if(!$stmt->execute(array($uid, $email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
    
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resultCheck = false;
            if(count($profileData) > 0)
            {
                $resultCheck = false;
    
            }
            else
            {
                $resultCheck = true;
            }
            return $resultCheck;
            return $profileData;

        }

        protected function getUserId($uid) {
            $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');

            if(!$stmt->execute(array($uid))){
                $stmt = null;
                header("location: index.php?error=stmtfailed");
                exit();
            }

            // Gets the data as an associative array
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($profileData) == 0){
                $stmt = null;
                header("location: index.php?error=profilenotfound");
                exit();

            }
            return $profileData;

        }

}