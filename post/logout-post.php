<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 3/18/15
 * Time: 12:48 AM
 */

require '../lib/game.inc.php';
unset($_SESSION['user']);
unset($_SESSION['game']);
header("location: ../login.php");