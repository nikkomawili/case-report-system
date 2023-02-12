<?php

class ProfileInfo extends Dbh {
    
    protected function getProfileInfo($userId){
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');

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

    protected function setNewProfileInfo($profileAbout,/* $profileTitle, $profileText, */$userId){
        $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?/*, profiles_introtitle = ?, profiles_introtext = ?*/ WHERE users_id = ?;');

        // This statement checks if the function fails
        if(!$stmt->execute(array($profileAbout, /*$profileTitle, $profileText,*/ $userId))){
            $stmt = null;
            header('location: profile.php?error=stmtfailed');

            // If condition is not met, the whole method doesn't continue with any code after the exit function
            exit();
        }

        $stmt = null;

    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');

        // This statement checks if the function fails
        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))){
            $stmt = null;
            header('location: profile.php?error=stmtfailed');

            // If condition is not met, the whole method doesn't continue with any code after the exit function
            exit();
        }
        
        $stmt = null;

    }

}