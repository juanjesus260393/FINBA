<?php

require_once("../models/mdlusers.php");
$username = filter_input(INPUT_POST, 'username');
if (!empty($username) ) { 
} else {
    Mdlauth::Logout();
}
