<!-- This is a MODEL class that connects to the database for changes -->

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

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // These two variables can be called for unique users whenever theyre logged in
            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            
            $stmt = null;

            return $user;
        }

        return $loginData;

    }
}