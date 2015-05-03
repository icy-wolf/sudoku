<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class GameControllerTest extends \PHPUnit_Framework_TestCase
{
	public function testConstruct() {
		//$this->assertEquals($expected, $actual);
        $game = new Game();
        $controller = new GameController($game, array());

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertEquals('game.php', $controller->getPage());

	}

    public function test_new() {
        $game = new Game(false);
        $controller = new GameController($game, array('new' => '', 'name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals('game.php?name=Joey', $controller->getPage());
    }


    public function test_giveup() {
        $game = new Game();
        $controller = new GameController($game, array('giveup' => '', 'name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertEquals('lose.php?name=Joey', $controller->getPage());
    }

    public function test_guess() {
        $game = new Game();
        $controller = new GameController($game, array('guess' => '1', 'r'=>'2', 'c'=>'2', 'name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertEquals('game.php?name=Joey', $controller->getPage());
    }

    public function test_value() {
        $game = new Game();
        $controller = new GameController($game, array('value' => '1', 'r'=>'2', 'c'=>'2', 'name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertEquals('game.php?name=Joey', $controller->getPage());

    }

    public function test_name() {
        $game = new Game();
        $controller = new GameController($game, array('name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertTrue($controller->isReset());
        $this->assertEquals('game.php?name=Joey', $controller->getPage());

    }

    public function test_delete() {
        $game = new Game();
        $controller = new GameController($game, array('delete'=>'','r'=>'3','c'=>'2', 'name'=>'Joey'));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertEquals('game.php?name=Joey', $controller->getPage());

    }

    public function test_cheat(){
        $game = new Game();
        $controller = new GameController($game, array('cheat'=>''));

        $this->assertInstanceOf('GameController', $controller);
        $this->assertFalse($controller->isReset());
        $this->assertTrue($controller->isCheatMode());
        $this->assertEquals('game.php', $controller->getPage());

    }

}

/// @endcond
?>
