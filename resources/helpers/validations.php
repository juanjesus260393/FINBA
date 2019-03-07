<?php

class validations {

    public static function loginVoid($username, $password) {
        $userinformation = true;
        if (empty($username) && empty($password)) {
            $userinformation = FALSE;
        } else {
            $userinformation = TRUE;
        }
        return $userinformation;
    }

}
