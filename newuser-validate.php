<?php
$login = false;
require_once "lib/game.inc.php";

$controller = new ValidationController($site);
$msg = $controller->validate($_GET['v']);

header("location: login.php");
exit;