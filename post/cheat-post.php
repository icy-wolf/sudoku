<?php
/**
 * Created by PhpStorm.
 * User: Joseph Norwood
 * Date: 4/20/2015
 * Time: 5:24 PM
 */
require '../lib/game.inc.php';

$_SESSION['game'] = New Game(true);

header("location: ../game.php");