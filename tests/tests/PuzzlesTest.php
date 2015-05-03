<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class PuzzlesTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$puzzle = new Puzzles();
		$this->assertInstanceOf("Puzzles", $puzzle);
	}

	public function test_cheat(){
		$puzzle = new Puzzles();

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

		$cheat = new Sudoku($cheatSolution, $cheatClue );

		$this->assertTrue($puzzle->getCheatPuzzle() == $cheat);
	}
}

/// @endcond
?>
