<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/29/15
 * Time: 10:19 PM
 */

$login = false;
require_once "../lib/game.inc.php";

unset($_SESSION['newuser-error']);

$nu = new LostPassword($site);
$msg = $nu->newPass(
    strip_tags($_POST['email']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']),
    new Email());

if($msg !== null) {
    $_SESSION['newuser-error'] = $msg;
    header("location: ../lostpw.php");
    exit;
}

header("location: ../validation.php");
exit;