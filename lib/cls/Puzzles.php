<?php
//require 'Sudoku.php';
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/18/15
 * Time: 11:15 PM
 */

class Puzzles {

    /*
     * This class will create and store the 10 hardcoded puzzels
     * Will need a function to return a random puzzle
     * Probably will need some sort of array of all puzzles
     */
    public function __construct(){
        $solution1 = array (
            array(6, 3, 7, 9, 8, 4, 5, 2, 1),
            array(8, 4, 1, 2, 5, 7, 3, 6, 9),
            array(5, 9, 2, 3, 6, 1, 7, 8, 4),
            array(3, 8, 9, 4, 7, 5, 2, 1, 6),
            array(4, 7, 5, 6, 1, 2, 9, 3, 8),
            array(1, 2, 6, 8, 3, 9, 4, 7, 5),
            array(7, 1, 3, 5, 4, 8, 6, 9, 2),
            array(9, 5, 8, 7, 2, 6, 1, 4, 3),
            array(2, 6, 4, 1, 9, 3, 8, 5, 7),
        );

        $clues1 = array (
            array(0, 0, 7, 0, 8, 4, 0, 0, 0),
            array(0, 0, 0, 0, 5, 0, 3, 0, 0),
            array(0, 9, 0, 0, 6, 0, 7, 0, 0),
            array(0, 8, 9, 4, 0, 0, 0, 1, 0),
            array(4, 0, 0, 6, 0, 2, 0, 0, 8),
            array(0, 0, 0, 0, 3, 0, 4, 7, 0),
            array(7, 0, 3, 5, 0, 0, 0, 0, 2),
            array(9, 0, 0, 0, 0, 6, 0, 4, 3),
            array(0, 6, 4, 0, 0, 0, 0, 0, 0),
        );

        $solution2 = array (
            array(2, 5, 7, 1, 6, 9, 8, 3, 4),
            array(6, 1, 4, 8 ,3 ,7 ,5, 9, 2),
            array(3, 8, 9, 2, 4, 5, 7, 6, 1),
            array(9, 3, 8, 5, 1, 4, 6, 2, 7),
            array(5, 7, 6, 3, 9, 2, 4, 1, 8),
            array(4, 2, 1, 7, 8, 6, 9, 5, 3),
            array(1, 6, 2, 9, 7, 8, 3, 4, 5),
            array(7, 4, 5, 6, 2, 3, 1, 8, 9),
            array(8, 9, 3, 4, 5, 1, 2, 7, 6),
        );

        $clues2 = array (
            array(0, 5, 0, 0, 6, 0, 0, 0, 4),
            array(0, 0, 4, 0 ,3 ,7 ,5, 0, 0),
            array(0, 0, 9, 0, 4, 0, 7, 0, 1),
            array(9, 0, 8, 0, 0, 0, 6, 0, 7),
            array(5, 0, 0, 0, 0, 2, 4, 0, 0),
            array(0, 2, 0, 7, 0, 6, 0, 5, 3),
            array(0, 6, 0, 9, 0, 8, 0, 4, 0),
            array(0, 0, 0, 0, 0, 3, 0, 8, 0),
            array(0, 9, 3, 4, 0, 0, 0, 7, 0),
        );

        $solution3 = array (
            array(6, 2, 9, 3, 5, 8, 1, 7, 4),
            array(1, 8, 3, 7, 6, 4, 9, 5, 2),
            array(7, 5, 4, 1, 9, 2, 3, 6, 8),
            array(2, 3, 6, 8, 1, 5, 7, 4, 9),
            array(9, 1, 5, 2, 4, 7, 6, 8, 3),
            array(8, 4, 7, 9, 3, 6, 5, 2, 1),
            array(4, 7, 1, 6, 8, 3, 2, 9, 5),
            array(3, 6, 8, 5, 2, 9, 4, 1, 7),
            array(5, 9, 2, 4, 7, 1, 8, 3, 6),
        );

        $clues3 = array (
            array(6, 0, 0, 0, 0, 8, 0, 7, 0),
            array(0, 8, 3, 0, 0, 0, 0, 0, 2),
            array(0, 0, 0, 1, 9, 0, 3, 6, 0),
            array(2, 3, 6, 0, 0, 0, 0, 4, 0),
            array(0, 0, 5, 0, 4, 0, 6, 0, 0),
            array(0, 4, 0, 0, 0, 0, 5, 2, 1),
            array(0, 7, 1, 0, 8, 3, 0, 0, 0),
            array(3, 0, 0, 0, 0, 0, 4, 1, 0),
            array(0, 9, 0, 4, 0, 0, 0, 0, 6),
        );

        $solution4 = array (
            array(4, 5, 6, 3, 9, 2, 1, 8, 7),
            array(3, 8, 1, 4, 7, 5, 2, 6, 9),
            array(7, 2, 9, 1, 8, 6, 3, 4, 5),
            array(8, 6, 3, 9, 5, 1, 7, 2, 4),
            array(2, 9, 5, 6, 4, 7, 8, 1, 3),
            array(1, 4, 7, 2, 3, 8, 5, 9, 6),
            array(6, 7, 2, 5, 1, 9, 4, 3, 8),
            array(5, 1, 4, 8, 6, 3, 9, 7, 2),
            array(9, 3, 8, 7, 2, 4, 6, 5, 1),
        );

        $clues4 = array (
            array(4, 0, 0, 0, 0, 2, 0, 0, 7),
            array(0, 8, 1, 4, 0, 0, 0, 0, 0),
            array(0, 0, 0, 1, 0, 0, 3, 0, 0),
            array(8, 6, 0, 9, 5, 0, 7, 0, 0),
            array(0, 0, 5, 6, 0, 7, 8, 0, 0),
            array(0, 0, 7, 0, 3, 8, 0, 9, 6),
            array(0, 0, 2, 0, 0, 9, 0, 0, 0),
            array(0, 0, 0, 0, 0, 3, 9, 7, 0),
            array(9, 0, 0, 7, 0, 0, 0, 0, 1),
        );

        $solution5 = array (
            array(8, 7, 9, 4, 1, 5, 6, 3, 2),
            array(1, 6, 2, 3, 9, 8, 7, 5, 4),
            array(5, 3, 4, 6, 2, 7, 1, 9, 8),
            array(9, 8, 7, 5, 4, 3, 2, 1, 6),
            array(3, 2, 6, 7, 8, 1, 5, 4, 9),
            array(4, 5, 1, 2, 6, 9, 8, 7, 3),
            array(7, 4, 5, 8, 3, 2, 9, 6, 1),
            array(6, 1, 8, 9, 5, 4, 3, 2, 7),
            array(2, 9, 3, 1, 7, 6, 4, 8, 5),
        );

        $clues5 = array (
            array(8, 0, 9, 0, 0, 5, 6, 0, 0),
            array(0, 6, 0, 0, 0, 8, 0, 0, 0),
            array(0, 0, 4, 0, 2, 0, 0, 0, 8),
            array(0, 0, 7, 5, 0, 0, 2, 0, 6),
            array(0, 0, 6, 7, 0, 1, 5, 0, 0),
            array(4, 0, 1, 0, 0, 9, 8, 0, 0),
            array(7, 0, 0, 0, 3, 0, 9, 0, 0),
            array(0, 0, 0, 9, 0, 0, 0, 2, 0),
            array(0, 0, 3, 1, 0, 0, 4, 0, 5),
        );

        $solution6 = array (
            array(5, 9, 6, 2, 4, 1, 8, 3, 7),
            array(8, 3, 2, 9, 6, 7, 4, 5, 1),
            array(7, 1, 4, 5, 3, 8, 9, 2, 6),
            array(1, 5, 7, 4, 2, 9, 3, 6, 8),
            array(3, 4, 9, 8, 5, 6, 1, 7, 2),
            array(2, 6, 8, 1, 7, 3, 5, 4, 9),
            array(4, 7, 1, 3, 8, 2, 6, 9, 5),
            array(9, 2, 3, 6, 1, 5, 7, 8, 4),
            array(6, 8, 5, 7, 9, 4, 2, 1, 3),
        );

        $clues6= array (
            array(0, 0, 6, 0, 4, 1, 8, 0, 0),
            array(8, 0, 2, 0, 0, 7, 0, 0, 0),
            array(0, 0, 0, 0, 0, 8, 0, 2, 6),
            array(0, 0, 7, 4, 2, 0, 0, 0, 0),
            array(0, 4, 9, 0, 5, 0, 1, 7, 0),
            array(0, 0, 0, 0, 7, 3, 5, 0, 0),
            array(4, 7, 0, 3, 0, 0, 0, 0, 0),
            array(0, 0, 0, 6, 0, 0, 7, 0, 4),
            array(0, 0, 5, 7, 9, 0, 2, 0, 0),
        );

        $solution7 = array (
            array(8, 9, 1, 2, 3, 7, 4, 6, 5),
            array(4, 6, 7, 5, 8, 9, 3, 1, 2),
            array(3, 2, 5, 4, 6, 1, 8, 7, 9),
            array(7, 5, 3, 9, 2, 4, 6, 8, 1),
            array(9, 4, 6, 1, 5, 8, 2, 3, 7),
            array(1, 8, 2, 3, 7, 6, 9, 5, 4),
            array(6, 7, 9, 8, 1, 2, 5, 4, 3),
            array(5, 1, 4, 6, 9, 3, 7, 2, 8),
            array(2, 3, 8, 7, 4, 5, 1, 9, 6),
        );

        $clues7 = array (
            array(8, 0, 1, 2, 3, 0, 0, 0, 0),
            array(0, 0, 7, 0, 0, 9, 0, 0, 2),
            array(0, 2, 0, 0, 6, 0, 8, 0, 9),
            array(7, 0, 0, 0, 0, 4, 0, 8, 0),
            array(9, 0, 0, 0, 0, 0, 0, 0, 7),
            array(0, 8, 0, 3, 0, 0, 0, 0, 4),
            array(6, 0, 9, 0, 1, 0, 0, 4, 0),
            array(5, 0, 0, 6, 0, 0, 7, 0, 0),
            array(0, 0, 0, 0, 4, 5, 1, 0, 6),
        );

        $solution8 = array (
            array(5, 3, 2, 7, 4, 1, 9, 6, 8),
            array(8, 4, 1, 9, 3, 6, 2, 7, 5),
            array(6, 9, 7, 8, 2, 5, 3, 4, 1),
            array(9, 8, 3, 4, 6, 7, 1, 5, 2),
            array(7, 2, 5, 3, 1, 8, 4, 9, 6),
            array(4, 1, 6, 2, 5, 9, 8, 3, 7),
            array(2, 7, 9, 6, 8, 4, 5, 1, 3),
            array(3, 5, 4, 1, 7, 2, 6, 8, 9),
            array(1, 6, 8, 5, 9, 3, 7, 2, 4),
        );

        $clues8 = array (
            array(5, 3, 2, 0, 0, 1, 9, 0, 8),
            array(8, 0, 1, 0, 0, 0, 2, 0, 0),
            array(0, 0, 7, 0, 0, 5, 0, 0, 0),
            array(0, 8, 0, 4, 0, 7, 0, 0, 0),
            array(0, 2, 0, 0, 0, 0, 0, 9, 0),
            array(0, 0, 0, 2, 0, 9, 0, 3, 0),
            array(0, 0, 0, 6, 0, 0, 5, 0, 0),
            array(0, 0, 4, 0, 0, 0, 6, 0, 9),
            array(1, 0, 8, 5, 0, 0, 7, 2, 4),
        );

        $solution9 = array (
            array(7, 3, 1, 5, 8, 4, 6, 2, 9),
            array(4, 2, 8, 9, 1, 6, 3, 5, 7),
            array(9, 6, 5, 3, 7, 2, 1, 8, 4),
            array(2, 9, 4, 7, 6, 5, 8, 3, 1),
            array(5, 8, 3, 2, 4, 1, 9, 7, 6),
            array(6, 1, 7, 8, 9, 3, 5, 4, 2),
            array(8, 7, 2, 1, 3, 9, 4, 6, 5),
            array(3, 4, 9, 6, 5, 7, 2, 1, 8),
            array(1, 5, 6, 4, 2, 8, 7, 9, 3),
        );

        $clues9 = array (
            array(7, 0, 1, 0, 8, 0, 6, 0, 0),
            array(0, 0, 8, 0, 0, 6, 0, 5, 7),
            array(9, 0, 0, 0, 0, 2, 0, 0, 0),
            array(0, 9, 4, 7, 0, 0, 0, 0, 1),
            array(0, 8, 0, 0, 0, 0, 0, 7, 0),
            array(6, 0, 0, 0, 0, 3, 5, 4, 0),
            array(0, 0, 0, 1, 0, 0, 0, 0, 5),
            array(3, 4, 0, 6, 0, 0, 2, 0, 0),
            array(0, 0, 6, 0, 2, 0, 7, 0, 3),
        );

        $solution10 = array (
            array(7, 4, 5, 6, 9, 1, 2, 3, 8),
            array(8, 1, 6, 3, 2, 5, 7, 4, 9),
            array(3, 9, 2, 7, 8, 4, 5, 1, 6),
            array(5, 2, 3, 1, 6, 7, 9, 8, 4),
            array(4, 6, 9, 8, 5, 3, 1, 7, 2),
            array(1, 7, 8, 2, 4, 9, 6, 5, 3),
            array(2, 5, 7, 9, 3, 8, 4, 6, 1),
            array(9, 8, 4, 5, 1, 6, 3, 2, 7),
            array(6, 3, 1, 4, 7, 2, 8, 9, 5),
        );

        $clues10 = array (
            array(7, 4, 0, 6, 0, 0, 0, 3, 8),
            array(8, 0, 0, 0, 0, 0, 0, 4, 9),
            array(0, 9, 2, 7, 0, 0, 0, 0, 6),
            array(0, 0, 3, 1, 6, 0, 0, 0, 0),
            array(0, 0, 0, 0, 5, 0, 0, 0, 0),
            array(0, 0, 0, 0, 4, 9, 6, 0, 0),
            array(2, 0, 0, 0, 0, 8, 4, 6, 0),
            array(9, 8, 0, 0, 0, 0, 0, 0, 7),
            array(6, 3, 0, 0, 0, 2, 0, 9, 5),
        );

        $cheatSolution = array (
            array(2, 6, 3, 7, 5, 8, 4, 1, 9),
            array(8, 1, 7, 4, 2, 9, 6, 3, 5),
            array(5, 4, 9, 1, 6, 3, 7, 8, 2),
            array(7, 3, 8, 5, 4, 2, 9, 6, 1),
            array(6, 9, 4, 8, 3, 1, 2, 5, 7),
            array(1, 2, 5, 6, 9, 7, 8, 4, 3),
            array(9, 8, 6, 3, 7, 5, 1, 2, 4),
            array(4, 5, 2, 9, 1, 6, 3, 7, 8),
            array(3, 7, 1, 2, 8, 4, 5, 9, 6),
        );

        $cheatClue = array (
            array(0, 0, 0, 0, 5, 0, 0, 1, 9),
            array(0, 0, 0, 0, 2, 0, 6, 3, 5),
            array(0, 0, 9, 1, 0, 0, 7, 0, 0),
            array(0, 0, 8, 0, 4, 0, 9, 0, 1),
            array(6, 0, 0, 0, 0, 0, 0, 0, 7),
            array(1, 0, 5, 0, 9, 0, 8, 0, 0),
            array(0, 0, 6, 0, 0, 5, 1, 0, 0),
            array(4, 5, 2, 0, 1, 0, 0, 0, 0),
            array(3, 7, 0, 0, 8, 0, 0, 0, 0),
        );

        $this->puzzle = new Sudoku($solution1, $clues1);
        $this->puzzle2 = new Sudoku($solution2, $clues2);
        $this->puzzle3 = new Sudoku($solution3, $clues3);
        $this->puzzle4 = new Sudoku($solution4, $clues4);
        $this->puzzle5 = new Sudoku($solution5, $clues5);
        $this->puzzle6 = new Sudoku($solution6, $clues6);
        $this->puzzle7 = new Sudoku($solution7, $clues7);
        $this->puzzle8 = new Sudoku($solution8, $clues8);
        $this->puzzle9 = new Sudoku($solution9, $clues9);
        $this->puzzle10 = new Sudoku($solution10, $clues10);

        $this->puzzle->setPuzzleNum(1);
        $this->puzzle2->setPuzzleNum(2);
        $this->puzzle3->setPuzzleNum(3);
        $this->puzzle4->setPuzzleNum(4);
        $this->puzzle5->setPuzzleNum(5);
        $this->puzzle6->setPuzzleNum(6);
        $this->puzzle7->setPuzzleNum(7);
        $this->puzzle8->setPuzzleNum(8);
        $this->puzzle9->setPuzzleNum(9);
        $this->puzzle10->setPuzzleNum(10);

        $this->allPuzzles = array($this->puzzle, $this->puzzle2, $this->puzzle3, $this->puzzle4,
            $this->puzzle5, $this->puzzle6, $this->puzzle7, $this->puzzle8, $this->puzzle9,
            $this->puzzle10);

        $this->cheat = new Sudoku($cheatSolution, $cheatClue );
    }

    public function getRandomPuzzle(){      //can't really test this, due to its randomness... I tried.
        $rand = rand(0, 9);
        return $this->allPuzzles[$rand];
    }

    public function getCheatPuzzle(){
        return $this->cheat;
    }

    public function getPuzzleNum($int){
        return $this->allPuzzles[$int];
    }


    private $puzzle = array();
    private $puzzle2 = array();
    private $puzzle3 = array();
    private $puzzle4 = array();
    private $puzzle5 = array();
    private $puzzle6 = array();
    private $puzzle7 = array();
    private $puzzle8 = array();
    private $puzzle9 = array();
    private $puzzle10 = array();
    private $allPuzzles = array();
    private $cheat = array();




}