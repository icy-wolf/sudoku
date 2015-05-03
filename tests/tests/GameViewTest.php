<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class GameViewTest extends \PHPUnit_Extensions_Database_TestCase
{
    private static $site;
    private static $user;

    public static function setUpBeforeClass() {
        self::$site = new Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
        $row = array('id' => 9,
            'userid' => 'dude',
            'name' => 'The Dude',
            'email' => 'dude@ranch.com',
            'password' => '12345678',
            'joined' => '2015-01-15 23:50:26',
            'role' => '1');
        self::$user = new User($row);
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'cbowen');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/user.xml');
    }

    public function test_construct() {
        $game = new Game();
        $view = new GameView(self::$site, self::$user, $_REQUEST, $game);

        $this->assertInstanceOf('GameView', $view);
    }

    public function test_presentBoard() {
        $game = new Game(true);
        $view = new GameView(self::$site, self::$user, $_REQUEST, $game);

        $this->assertInstanceOf('GameView', $view);

        $display = $view->presentBoard();
        $this->assertContains('<td><a href="cell.php?r=2&amp;c=1&amp;name=The Dude">', $display);
        $this->assertContains('<div class="puzzle"><div class="wrapper"><table class="outerTable">', $display);

    }
    public function test_getName() {
        $game = new Game();
        $game->setName('Joey');
        $controller = new GameController($game, array('name'=>'Joey'));
        $view = new GameView(self::$site, self::$user, $_REQUEST, $game);

        $this->assertInstanceOf('GameView', $view);

        $this->assertEquals($view->getName(), 'Joey');
    }

    public function test_displayNumClues(){
        $game = new Game();
        $view = new GameView(self::$site, self::$user, $_REQUEST, $game);

        $this->assertInstanceOf('GameView', $view);

        $display = $view->displayNumClues();
        $this->assertContains("You entered 0 clues to", $display);

    }

    public function test_presentSolution(){
        $game = new Game(true);
        $view = new GameView(self::$site, self::$user, $_REQUEST, $game);

        $this->assertInstanceOf('GameView', $view);
        $display = $view->presentSolution();
        $this->assertContains('<td><p>5</p></td>', $display);
        $this->assertContains('<td><p>9</p></td>', $display);
    }



}

/// @endcond
?>
