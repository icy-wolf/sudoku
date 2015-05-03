<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class CellTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {

		//cell with val 3 and some arbitrary row/column
		$cell = new Cell(3, 2, 1);  //visually row "3", col "2"
		$this->assertInstanceOf("Cell", $cell);
	}

	public function test_value_getset(){
		//cell with val 3 and some arbitrary row/column
		$cell = new Cell(3, 2, 1);  //visually row "3", col "2"

		//lets get the value, should return 3, which asserts true.
		$this->assertTrue(3 == $cell->getValue());

		//lets test the setter, and get it
		$value = 6;
		$cell->setValue($value);
		$this->assertTrue(6 == $cell->getValue());
	}

	public function test_rowcol_getset(){
		//cell with val 3 and some arbitrary row/column
		$cell = new Cell(3, 2, 1);  //visually row "3", col "2"

		$this->assertTrue(2 == $cell->getRow());
		$this->assertTrue(1 == $cell->getColumn());

		$cell->setRow(6);
		$cell->setColumn(5);

		$this->assertFalse(2 == $cell->getRow());
		$this->assertTrue(6 == $cell->getRow());
		$this->assertFalse(1 == $cell->getColumn());
		$this->assertTrue(5 == $cell->getColumn());
	}

	public function test_clue_mode(){
		//cell with val 3 and some arbitrary row/column
		$cell = new Cell(3, 2, 1);  //visually row "3", col "2"

		$this->assertTrue(3 == $cell->getValue());
		$this->assertFalse(true == $cell->isClueMode());	//NOT in clue mode!
		$this->assertTrue(0 == count($cell->getClues()));

		//now change to Clue Mode; value should = 0, isEmpty should = true
		$cell->setClueMode(true);
		$this->assertTrue(true == $cell->isClueMode());
		$this->assertTrue(0 == $cell->getValue());
		$this->assertTrue(true == $cell->isEmpty());

		//Lets add some clues
		$cell->addClue(5);
		$this->assertTrue(1 == count($cell->getClues()));
		$cell->addClue(2);
		$this->assertTrue(2 == count($cell->getClues()));
		$cell->addClue(1);
		$this->assertTrue(3 == count($cell->getClues()));		//ok we can add clues. yay.
		$cell->addClue(1);
		$this->assertTrue(3 == count($cell->getClues()));       //shouldn't add a duplicate!

		//Set ClueMode flag to False again
		$cell->setClueMode(false);
		$this->assertTrue(0 == count($cell->getClues()));
		$cell->addClue(4);
		$this->assertTrue(1 == count($cell->getClues()));	//just to make sure you can't add clues
		$this->assertTrue(0 == $cell->getValue());
	}


}

/// @endcond
?>
