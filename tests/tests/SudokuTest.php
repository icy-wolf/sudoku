<?php
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */

class SudokuTest extends \PHPUnit_Framework_TestCase
{

	public function test_construct() {
		$dummy_solution = array (
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

		$dummy_clues = array (
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

		$sudoku = new Sudoku($dummy_solution, $dummy_clues);		//So our Sudoku object was made.
		$this->assertInstanceOf("Sudoku", $sudoku);

		//Let's verify that the index of something in our Sudoku board is correct.
		//How about let's grab number 9 out of row 3, column 2
		$solution_array = $sudoku->getSolution();
		$cell = $solution_array[2][1];
		$this->assertTrue(9 == $cell->getValue() );

		//Let's make sure at row 4, col 5 is a 0  in clues array!
		$clues_array = $sudoku->getPlayerBoard();
		$cell_clue = $clues_array[3][4];
		$this->assertTrue(0 == $cell_clue->getValue());

	}

	public function test_inputValue(){
		$dummy_solution = array (
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

		$dummy_clues = array (
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

		$sudoku = new Sudoku($dummy_solution, $dummy_clues);		//So our Sudoku object was made.
		$sudoku->inputValue(7, 0, 0);	//user inputs 7 at row 1, col 1
		$current_cell = $sudoku->getPlayerBoard()[0][0];
		$this->assertTrue(7 == $current_cell->getValue());	//should be 7 now!
		$sudoku->inputValue(9, 1, 2);	//user inputs 9 at row 2, column 3
		$current_cell = $sudoku->getPlayerBoard()[1][2];

		//Just testing getCellValue, it should work
		$this->assertTrue(9 == $sudoku->getCellValue(1,2));	//should be 9 now!
		$this->assertTrue(0 == count($current_cell->getClues()));	//making sure cell's clues array empty
	}

	public function test_inputClue_deleteClue(){
		$dummy_solution = array (
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

		$dummy_clues = array (
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

		// I also test the getCellsClues function here. it works.
		$sudoku = new Sudoku($dummy_solution, $dummy_clues);		//So our Sudoku object was made.
		$sudoku->inputClue(4, 0, 0);	// will input clue into Cell at row 1, col 1
		$current_cell = $sudoku->getPlayerBoard()[0][0];
		$cell_clues_size = count($sudoku->getCellsClues(0,0));
		$this->assertTrue(1 == $cell_clues_size);				// clues array has 1 value!

		$sudoku->inputClue(2, 0, 0);
		$cell_clues_size = count($sudoku->getCellsClues(0,0));	//should be size 2 now
		$this->assertTrue(2 == $cell_clues_size);

		// try deleting a clue
		$sudoku->deleteClue(2, 0, 0);
		$cell_clues_size = count($sudoku->getCellsClues(0,0));	//should be size 1
		$this->assertTrue(1 == $cell_clues_size);

		//delete a clue that doesn't exist in Cell, Cell's clues array stays same
		$sudoku->deleteClue(1, 0, 0);
		$cell_clues_size = count($sudoku->getCellsClues(0,0));	//should be size 1 STILL
		$this->assertTrue(1 == $cell_clues_size);
	}

	public function test_isSolved(){
		$dummy_solution = array (
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

		$dummy_clues = array (
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

		// I also test the getCellsClues function here. it works.
		$sudoku = new Sudoku($dummy_solution, $dummy_clues);		//So our Sudoku object was made.
		$isSolved = $sudoku->isSolved();
		$this->assertFalse(true == $isSolved);		//Clearly not equal.


		$they_solved_it = array (
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

		//Now let's make the arrays equal on a new Sudoku object and see.
		$sudoku2 = new Sudoku($dummy_solution, $they_solved_it);
		$isSolved = $sudoku2->isSolved();
		$this->assertTrue(true == $isSolved);		//They solved it!
	}
}

/// @endcond
?>
