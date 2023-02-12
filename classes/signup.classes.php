<!-- This is a MODEL class that connects to the database for changes -->



<?php

class Signup extends Dbh {

    // Signs up the user and puts his data into the database
    protected function setUser($uid, $pwd, $email, $role) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, users_role) VALUES (?, ?, ?, ?);');

        // This build-in SQLi function hashes the password for the user
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email, $role))) {
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

        protected function getUserId($uid){
            $stmt = $this->connect()->prepare('SELECT users_id FROM users  WHERE users_uid = ?;');
    
            // This statement checks if the function fails
            if(!$stmt->execute(array($uid))){
                $stmt = null;
                header('location: profile.php?error=stmtfailed');
    
                // If condition is not met, the whole method doesn't continue with any code after the exit function
                exit();
            }
    
            // Then this checks if we actually did get something from the database
            $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($profileData) == 0){
                $stmt = null;
                header('location: profile.php?error=ProfileNotFound');
                exit();
            }
            return $profileData;
        }

}