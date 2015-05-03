<?php


/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 2/18/2015
 * Time: 11:33 AM
 */

class Cell {

    /**
     * Constructor
     * @param $value  -- the passed in value
     */
    public function __construct($value, $row_num, $column_num) {

        $this->value = $value;      //set the member variable for Value equal to the passed in value.
        $this->row = $row_num;          //set the Row and Column.
        $this->column = $column_num;
    }

    /** If the cell's value is 0, return true*/
    public function isEmpty(){
        if($this->value == 0){
            return true;
        }
        return false;
    }


    /**  Getter for Value */
    public function getValue(){
        return $this->value;
    }
    /**  Setter for Value */
    public function setValue( $value ){
        $this->setClueMode(false);
        if ($value >=0  && $value <=9){
            $this->value = $value;

        }
        else{
            $this->value = 0;
        }
    }

    /**  Getter for Row */
    public function getRow(){
        return $this->row;
    }

    /**  Setter for Row */
    public function setRow( $row ){
        $this->row = $row;
    }

    /**  Getter for Column */
    public function getColumn(){
        return $this->column;
    }
    /**  Setter for Column */
    public function setColumn( $column ){
        $this->column = $column;
    }


    /**  Getter for ClueMode Flag */
    public function isClueMode(){
        return $this->clue_flag;
    }

    /**  Setter for ClueMode Flag */
    public function setClueMode( $bool ){

        //If clue Mode = true, set Value=0
        if ($bool == true){
            $this->value = 0;
        }
        $this->clue_flag = $bool;

        //If clue Mode turned off, empty clues array
        if ($bool == false){
            $this->clues = array();
        }
    }

    /** Getter for Clues array */
    public function getClues(){
        return $this->clues;
    }

    /** Add a Clue to Clues Array */
    public function addClue( $clue ){

        //no duplicate clues
        if(!in_array($clue, $this->clues)){
            $this->setClueMode(true);
            $this->clues[] = $clue;
        }
    }

    /** Delete a clue from the clues array*/
    public function deleteClue( $del_clue ){
        if(($key = array_search($del_clue, $this->clues)) !== false) {
            unset($this->clues[$key]);
        }
    }

    /**If a clue is a black clue that shows up at the beginning of the game, return true*/
    public function isBlackClue(){
        if ($this->value != 0){
            return true;
        }
        return false;
    }

    public function setClues($str){
        $clues = str_split($str);
        $this->setClueMode(True);
        foreach($clues as $clue){
            $this->clues[] = (int)$clue;
        }
    }



    private $value;     //The value the cell is holding
    private $row;       //The Row index
    private $column;    //The Column index
    private $clue_flag = false;  //Boolean if Cell is in clue mode or not
    private $clues = array();   //The clues or "keys"
}