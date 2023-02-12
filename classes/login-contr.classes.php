<!-- This is a CONTROLLER class which handles all user inputs -->
<!-- A CONTROLLER class is connected to its MODEL class -->

<?php

class LoginContr extends Login{

    // These variables are instantiated here
    private $uid;
    private $pwd;

    // These variables are grabbed from the form
    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;

    }

    // Error Handlers
    
    public function loginUser() {
        if($this->emptyInput() == false) {
            // echo "Empty input(s)!";
            header("location: ../index.php?error=EmptyInput");
            exit();
        }

        // This officially logs in the user to the website
        $this->getUser($this->uid, $this->pwd);
    }

    // Checks if inputs are empty

    private function emptyInput() {
        $result = false;
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Put any other error handlers here


}