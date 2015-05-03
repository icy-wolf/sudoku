<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/27/15
 * Time: 11:17 PM
 */

$login = false;
require_once "../lib/game.inc.php";

unset($_SESSION['newuser-error']);

if($_POST['secret'] !== "super477") {
    $_SESSION['newuser-error'] = "Invalid secret!";
    header("location: ../newuser.php");
    exit;
}

$nu = new NewUsers($site);
$msg = $nu->newUser(
    strip_tags($_POST['userid']),
    strip_tags($_POST['name']),
    strip_tags($_POST['email']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']),
    new Email());

if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    header("location: ../newuser.php");
    exit;
}

header("location: ../validation.php");
exit;