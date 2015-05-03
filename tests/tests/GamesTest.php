<?php
/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */


class GamesTest extends \PHPUnit_Extensions_Database_TestCase
{
    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'lawre272');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/game.xml');
    }

    public function test_construct() {
        $games = new Games(self::$site);
        $this->assertInstanceOf('Games', $games);
    }

    //FOR SOME REASON PLAYER PUZZLE FIELD ISNT BEING SAVED RIGHT************************************************!!!!!
    public function test_save_game(){
        $games = new Games(self::$site);

        //save the user with id=2 and puzzleNum=1 's game puzzle
        $userid = 2;
        $puzzleNum = 1;
        $playerPuzzle = "563370454031201021019191910044445000044040523454534230230234340900023023043431000";

        $games->save_game($userid, $puzzleNum, $playerPuzzle);
        $result = $games->load_game($userid);
        $this->assertEquals($playerPuzzle, $result['playerPuzzle']);
    }

    public function test_load(){
        $games = new Games(self::$site);

        $userid = 2;
        $result = $games->load_game($userid);

        $this->assertEquals( '2', $result['Userid'] );
        $this->assertEquals( '1', $result['puzzleNum'] );
        $this->assertEquals( '003300454030201021010101010044445000044040523454534230230234340900023023043431000', $result['playerPuzzle'] );
    }

    public function test_add_game(){
        $games = new Games(self::$site);

        $userid = 3;
        $playerPuzzle = "563370454031201021019191910044445000044040523454534230230234340900023023043431000";
        $games->save_game($userid, 6, $playerPuzzle);

        //should add a new game, let's see.
        $result = $games->load_game($userid);
        var_dump($result);
        $this->assertEquals('3', $result['Userid']);

        //
    }
	
}

/// @endcond
?>
