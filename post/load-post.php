<?php
/**
 * Created by PhpStorm.
 * User: Joseph Norwood
 * Date: 4/18/2015
 * Time: 12:28 PM
 */
require '../lib/game.inc.php';

$games = new Games($site);

//$num = $game->getSudokuBoard()->getPuzzleNum();

$result = $games->load_game($user->getId());

if($result !== Null) {


    $puzzleNum = (int)$result['puzzleNum'];
    $playerPuzzle = $result['playerPuzzle'];

    $ary = array();
    for ($x = 0; $x <= 8; $x++) {
        $ary[$x] = array();
        for ($y = 0; $y <= 8; $y++) {
            $ary[$x][$y] = 0;
        }
    }

    $chars = str_split($playerPuzzle);
    for ($i = 0; $i <= 80; $i++) {
        $row = (int)floor($i / 9);
        $col = $i % 9;

        $ary[$row][$col] = new Cell((int)$chars[$i], $row, $col);
    }

    $hints = New Hints($site);

    $hintary = $hints->getHints($user->getId());

    foreach ($hintary as $cell) {
        $r = $cell['row'];
        $c = $cell['col'];
        $val = $cell['hints'];

        if ($ary[$r][$c]->getValue() == 0) {
            $ary[$r][$c]->setClues($val);
        }
    }


    $puzz = new Puzzles();
    if ($puzzleNum == 0) {
        $sudoku = $puzz->getCheatPuzzle();
    } else {
        $sudoku = $puzz->getPuzzleNum($puzzleNum - 1);
    }


    $sudoku->setPlayerBoard($ary);

    $game->setSudoku($sudoku);
}

header("location: ../game.php");