<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/20/15
 * Time: 5:00 PM
 */
require __DIR__ . "/autoload.inc.php";
$site = new Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the PHP session system
session_start();
define("GAME_SESSION", 'game');

// If there is a game session, use that. Otherwise, create one
if(!isset($_SESSION[GAME_SESSION])) {
    $_SESSION[GAME_SESSION] = new Game();
}

$game = $_SESSION[GAME_SESSION];

$user = null;
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}

// redirect if user is not logged in
if(!isset($login) && $user === null) {
    $root = $site->getRoot();
    header("location: $root/login.php");
    exit;
}
?>