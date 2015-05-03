<?php

/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 2/18/2015
 * Time: 11:33 AM
 */


class Sudoku {


    public function __construct(Array $solutionArray, Array $cluesArray){
        for ($row = 0; $row < 9; $row++){

            for ($column = 0; $column < 9; $column++){

                $cell = new Cell($solutionArray[$row][$column], $row, $column);
                $clueCell = new Cell($cluesArray[$row][$column], $row, $column);
                $playerCell = new Cell($cluesArray[$row][$column], $row, $column);

                // We want to add Cell entries into the private member variable!
                $this->solution_array[$row][$column] = $cell;
                $this->player_array[$row][$column] = $clueCell;
                $this->clues_array[$row][$column] = $playerCell;
            }
        }
    }


    /** Input a Value to the Player Board */
    public function inputValue($value, $row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        $cell->setValue($value);
    }

    /** Input a Clue to a Cell in the Player Board */
    public function inputClue($clue, $row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        $cell->addClue($clue);
    }
    /** Delete a Clue from a Cell in the Player Board */
    public function deleteClue($clueToDelete, $row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        $cell->deleteClue($clueToDelete);
    }

    /** If the Player board matches the Solution */
    public function isSolved(){
        $arraysAreEqual = ($this->getSolution() == $this->getPlayerBoard());
        if($arraysAreEqual){
            $this->solved = true;
            return true;
        }
        else{
            return false;
        }
    }

    /** Check to see if the cell's value is correct*/
    public function isValueCorrect($value, $row, $column){
        $player_cell = $this->player_array[$row][$column];
        if($value == $this->solution_array[$row][$column]->getValue()){
            return true;
        }

        return false;
    }

    /** Getter for the solution array*/
    public function getSolution(){
        return $this->solution_array;
    }

    /** Getter for the player array*/
    public function getPlayerBoard(){
        return $this->player_array;
    }

    /** Getter for the clues array*/
    public function getCluesBoard(){
        return $this->clues_array;
    }

    /** Get the array of cell clues*/
    public function getCellsClues($row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        return $cell->getClues();
    }

    /**Check to see if a cell is in clue mode*/
    public function isClueMode($row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        return $cell->isClueMode();
    }

    /**Get a cell's value*/
    public function getCellValue($row, $column){
        $clues = $this->getPlayerBoard();
        $cell = $clues[$row][$column];
        return $cell->getValue();
    }

    /**Check to see if a cell has a black clue, if so return true*/
    public function clueCheck($row, $column){
        $clues_board = $this->getCluesBoard();
        $cell = $clues_board[$row][$column];
        return $cell->isBlackClue();
    }

    /**Get the value at that location of the solution board*/
    public function getSolutionValue($row, $column){
        return $this->solution_array[$row][$column]->getValue();
    }


    /**
     * @return mixed
     */
    public function getPuzzleNum()
    {
        return $this->puzzleNum;
    }

    /**
     * @param mixed $puzzleNum
     */
    public function setPuzzleNum($puzzleNum)
    {
        $this->puzzleNum = $puzzleNum;
    }

    public function setPlayerBoard($ary){
        $this->player_array = $ary;
    }

    private $solution_array;    //The solution
    private $player_array;       //The clues the user will start off with
    private $clues_array;        //The immutable Clues Array
    private $solved = false;    //Flag to represent if we solved the puzzle
    private $puzzleNum = 0;

}