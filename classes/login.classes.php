<!-- This is a MODEL class that connects to the database and/or handles database changes -->

<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $uid))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // $loginData2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($loginData) == 0){
            $stmt = null;
            header("location: ../index.php?error=UserNotFound1");
            // return $loginData2;
            return $loginData;
            exit();
        } 


        // $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $loginData[0]["users_pwd"]);
    
        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../index.php?error=WrongPassword");
            exit();
        }
        elseif($checkPwd == true)
        {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $uid, $loginData[0]["users_pwd"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if(count($loginData) == 0){
                $stmt = null;
                header("location: ../index.php?error=UserNotFound2");
                exit();
            }            

            $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // These two variables can be called for unique users whenever theyre logged in
            session_start();
            $_SESSION["userid"] = $userData[0]["users_id"];
            $_SESSION["useruid"] = $userData[0]["users_uid"];
            $_SESSION["userrole"] = $userData[0]["users_role"];
            
            if($userData[0]['users_role'] == 'admin')
            {
                header('location: ../indexadmin.php?adminerror=none');
            }
            elseif($userData[0]['users_role'] == 'staff')
            {
                header('location: ../indexstaff.php?stafferror=none');
            }
            elseif($userData[0]['users_role'] == 'user')
            {
                header('location: ../indexuser.php?usererror=none');
            }
            else
            {
                header('location: ../index.php?indexerror=none');
            }

            $stmt = null;

            return $userData;
        }

        return $loginData;

    }

    protected function getLoginInfo($userId){
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_id = ?;');

        // This statement checks if the function fails
        if(!$stmt->execute(array($userId))){
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