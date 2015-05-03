<?php
/**
 * Created by PhpStorm.
 * User: Joseph Norwood
 * Date: 4/18/2015
 * Time: 12:28 PM
 */
require '../lib/game.inc.php';

$temp = $game->getSudokuBoard()->getPlayerBoard();

$hints = New Hints($site);
$hints->deleteHints($user->getId());

$puzzString = '';

$outcnt = 0;
$incnt = 0;
foreach($temp as $row){
    foreach($row as $num){
        if($temp[$outcnt][$incnt]->isClueMode()){

            $hintstr = '';

            foreach($temp[$outcnt][$incnt]->getClues() as $hnt){
                $hintstr .= (string)$hnt;
            }

            $hints->addHints($user->getId(), $outcnt, $incnt, $hintstr);
        }

        $puzzString .= (string)$num->getValue();
        $incnt++;
    }
    $incnt = 0;
    $outcnt++;
}

$games = new Games($site);

$games->save_game($user->getId(), $game->getSudokuBoard()->getPuzzleNum(), $puzzString);

header("location: ../game.php");