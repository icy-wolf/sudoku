<?php
/**
 * Created by PhpStorm.
 * User: nicolelawrence
 * Date: 2/17/15
 * Time: 4:35 PM
 */

class Game {

    public function __construct($cheat = false){
        if($cheat == true){
            $puzzle = new Puzzles();
            $sudoku_object = $puzzle->getCheatPuzzle();
            $this->sudoku = $sudoku_object;
            $cheat = false;
        }
        else{
            $puzzle = new Puzzles();
            $sudoku_object = $puzzle->getRandomPuzzle();
            $this->sudoku = $sudoku_object;
        }

    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function inputValue($value, $row, $column){
        $this->input_count = $this->input_count + 1;        //increment the amount of user insertions
        $this->sudoku->inputValue($value, $row, $column);
        return $this->sudoku->isSolved();       //to check every input if they solved it!
    }

    public function inputClue($clue, $row, $column){
        $this->sudoku->inputClue($clue, $row, $column);
    }

    public function deleteClue($clueToDelete, $row, $column){
        $this->sudoku->deleteClue($clueToDelete, $row, $column);
    }

    public function isValueCorrect($value, $row, $column){      //cant test... returns a Cell.. why?
        return $this->sudoku->isValueCorrect($value, $row, $column);
    }

    public function getCellClues($row, $column){
        return $this->sudoku->getCellsClues($row, $column);
    }

    public function isClueMode($row, $column){
        return $this->sudoku->isClueMode($row, $column);
    }

    public function getCellValue($row, $column){
        return $this->sudoku->getCellValue($row, $column);
    }

    public function getSolutionValue($row, $column){
        return $this->sudoku->getSolutionValue($row, $column);
    }

    public function getSudokuBoard(){
        return $this->sudoku;
    }

    public function clueCheck($row, $column){
        return $this->sudoku->clueCheck($row, $column);
    }

    public function getNumberOfInputs(){
        return $this->input_count;
    }

    public function setSudoku($sudoku){
        $this->sudoku = $sudoku;
    }

    private $sudoku;  //Sudoku object
    private $name;  //The Player's name
    private $input_count = 0;  //How many times the user inputs a value

}