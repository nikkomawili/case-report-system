<!-- This is a CONTROLLER class which handles all user inputs -->
<!-- A CONTROLLER class is connected to its MODEL class -->


<?php

class ProfileInfoContr extends ProfileInfo {
    
    // These properties are initiated in a $_SESSION variable, that's why they're here
    private $userId;
    private $userUid;

    // Data from the input will get passed in to the variables inside this class
    public function __construct($userId, $userUid)
    {
        $this->userId = $userId;
        $this->userUid = $userUid;
    }

    public function defaultProfileInfo()
    {
        $profileAbout = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga a et ea suscipit?";
        $profileTitle = "Hi, I am " . $this->userUid;
        $profileText = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae praesentium officiis commodi placeat, totam velit?";
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    public function updateProfileInfo($about/*, $introTitle, $introText*/)
    {
        // Error Handlers for updating profile
        if($this->emptyInputCheck($about/*, $introTitle, $introText*/) == true)
        {
            header("location ../profilesettings.php?error=emptyinput");
            exit();
        }

        // Update profile info
        $this->setNewProfileInfo($about,/*, $introTitle, $introText, */$this->userId);
    }

    private function emptyInputCheck($about/*, $introTitle, $introText*/)
    {
        $result = false;
        if(empty($about)/* || empty($introTitle) || empty($introText)*/)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }
}