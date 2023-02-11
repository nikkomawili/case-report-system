<!-- Does all the updating in the database -->
<!-- This is a CONTROLLER class which handles all the input from the user -->
<?php

class SignupContr extends Signup{

    // These variables are instantiated here

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // These variables are grabbed from the form
    public function __construct($uid, $pwd, $pwdRepeat, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    // Error Handlers
    
    public function signupUser() {
        if($this->emptyInput() == false) {
            // echo "Empty input(s)!";
            header("location: ../index.php?error=EmptyInput");
            exit();
        }

        if($this->invalidUid() == false) {
            // echo "Invalid username!";
            header("location: ../index.php?error=InvalidUID");
            exit();
        }

        if($this->invalidEmail() == false) {
            // echo "Invalid email!";
            header("location: ../index.php?error=InvalidEmail");
            exit();
        }

        if($this->pwdMatch() == false) {
            // echo "Passwords don't match!";
            header("location: ../index.php?error=PasswordUnmatched");
            exit();
        }

        if($this->uidTakenCheck() == false) {
            // echo "Username or email already taken!";
            header("location: ../index.php?error=UIDTaken");
            exit();
        }

        // This officially signs up the user to the website
        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    // Checks if inputs are empty
    private function emptyInput() {
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email) ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Checks if UID has certain characters
    private function invalidUid() {
        $result = false;
        if (!preg_match("/^[a-zA-z0-9]*$/", $this->uid)){
            $result = false;
        } else {
            $result = true;
        } return $result;
    }

        // Checks if email is invalid
        private function invalidEmail() {
            $result = false;
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = false;
            } else {
                $result = true;
            } return $result;
        }

        // Checks if the passwords matched
        private function pwdMatch(){
            $result = false;
            if ($this->pwd !== $this->pwdRepeat){
                $result = false;
            } else {
                $result = true;
            } return $result;
        }
        
        // Checks if the user already exists in the database
        private function uidTakenCheck(){
            $result = false;
            if (!$this->checkUser($this->uid, $this->email)){
                $result = false;
            } else {
                $result = true;
            } return $result;
        }

        public function fetchUserId($uid)
        {
            $userId = $this->getUserId($uid);
            return $userId[0]['users_id'];
        }



}