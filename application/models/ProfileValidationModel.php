<?php

class ProfileValidationModel extends CI_Model{
    private function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

function checkName($name) {
        $statesName = 1;
        if (empty($name)) {
            $statesName = 1;
        } else {
            $nameReturn = $this->test_input($name);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $nameReturn)) {
                $statesName = 2;
            } else {
                $statesName = 0;
            }
        }
        return $statesName;
    }

    function checkEmail($url) {

        $statesUrl = 0;
        if (empty($url)) {
            $statesUrl = 0;
        } else {
            $email = $this->test_input($url);
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                $statesUrl = 1;
            } else {
                $statesUrl = 2;
            }
        }
        return $statesUrl;
    }

    function checkPassword($password, $confirmPassword) {
        $pwdStatus = 1;
        $password = $this->test_input($password);
        $confirmPassword = $this->test_input($confirmPassword);
        if (empty($password)) {
            $pwdStatus = 1;
        }elseif (strlen($password)<=5) {
            $pwdStatus = 4;
        }else {
            if ($password === $confirmPassword) {
                $pwdStatus = 2;
            } else {
                $pwdStatus = 3;
            }
        }
        return $pwdStatus;
    }

    function checkCompanyName($companyName) {
        $companyNameStatus = 1;
        if (empty($companyName)) {
            $companyNameStatus = 1;
        } else {
            $companyNameStatus = 2;
        }
    }
    
}

?>
