<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/20/15
 * Time: 4:59 PM
 */
require 'lib/game.inc.php';
$controller = new GameController($game, $_REQUEST);

if($controller->isReset()) {
    unset($_SESSION[GAME_SESSION]);
}

if ($controller->isCheatmode()){
    $_SESSION[GAME_SESSION] = new Game(true); //add cheat parameter
}


header('Location: ' . $controller->getPage());

?>