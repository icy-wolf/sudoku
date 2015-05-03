<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/18/15
 * Time: 12:44 AM
 */

$login = true;
require '../lib/game.inc.php';

if(isset($_POST['user']) && isset($_POST['password'])) {
    $users = new Users($site);

    $user = $users->login($_POST['user'], $_POST['password']);
    if($user !== null) {
        $_SESSION['user'] = $user;
        header("location: load-post.php");
        exit;
    }
}

header("location: ../login.php");