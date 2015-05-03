<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/18/15
 * Time: 12:44 AM
 */

$login = true;
require '../lib/game.inc.php';

$users = new Users($site);

$user = $users->getGuest("guest");
var_dump($user);

if($user !== null) {
    $_SESSION['user'] = $user;
    header("location: ../game.php");
    exit;
}

header("location: ../login.php");