<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class GameTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$game = new Game();
		$this->assertInstanceOf("Game", $game);
	}

	public function test_name(){
		$game = new Game();

		$game->setName("Gabriel");
		$this->assertTrue("Gabriel" == $game->getName());
	}

	public function test_clueMode(){
		$game = new Game();


		$this->assertTrue(false == $game->isClueMode(0, 0));  //should return false
		$game->inputClue(2, 0, 0);
		$this->assertTrue(true == $game->isClueMode(0,0));	  //should be right.
		$this->assertTrue(1 == count($game->getCellClues(0, 0)));

		//test delete clue
		$game->deleteClue(2, 0, 0);
		$this->assertTrue(0 == count($game->getCellClues(0, 0)));
	}

	public function test_inputValue(){
		$game = new Game();

		$game->inputValue(3, 0, 0);
		$this->assertTrue(1 == $game->getNumberOfInputs());
		$this->assertTrue(3 == $game->getCellValue(0, 0));

		//check if input is correct match with solution at index 0,0
		$solution_value = $game->getSolutionValue(0, 0);
		$this->assertFalse($solution_value == $game->getCellValue(0, 0));	//shouldn't be equal, (im guessing)

		$game->inputValue($solution_value, 0, 0);	//now it has the solution value at 0, 0
		$this->assertTrue(2 == $game->getNumberOfInputs());
		$this->assertTrue($solution_value == $game->getCellValue(0, 0));	//should be true!

		$bool = $game->isValueCorrect($solution_value, 0, 0);	//will also turn Cell's "correctiveness" flag on
		$this->assertTrue(true == $bool);


	}


}

/// @endcond
?>
