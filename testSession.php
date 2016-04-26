<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 19/04/2016
 * Time: 3:10 PM
 */
session_start();
require_once("Login-Signup-PDO-OOP/class.user.php");
$login = new USER();
if($login->is_loggedin()) {
    echo "haha";
}