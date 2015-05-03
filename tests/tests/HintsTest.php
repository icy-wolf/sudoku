<?php
/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */


class HintsTest extends \PHPUnit_Extensions_Database_TestCase
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
        return $this->createDefaultDBConnection(self::$site->pdo(), 'norwoo25');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/game.xml');
    }

    public function test_construct() {
        $hints = new Hints(self::$site);
        $this->assertInstanceOf('Hints', $hints);
    }

    public function test_addHints(){
        $hints = new Hints(self::$site);
        $userid = 3;
        $row = 4;
        $column = 5;
        $hints->addHints($userid, $row, $column, "123");

        $result = $hints->getHints(3);

        $this->assertEquals($row, $result[0]['row']);
        $this->assertEquals($column, $result[0]['col']);
        $this->assertEquals("123", $result[0]['hints']);
    }

    public function test_getHints(){
        $hints = new Hints(self::$site);
        $userid = 3;
        $row = 4;
        $column = 5;
        $hints->addHints($userid, $row, $column, "123");

        $row2 = 6;
        $column2 = 7;
        $hints->addHints($userid, $row2, $column2, "456");

        $result = $hints->getHints(3);

        $this->assertEquals($row, $result[0]['row']);
        $this->assertEquals($column, $result[0]['col']);
        $this->assertEquals("123", $result[0]['hints']);

        $this->assertEquals($row2, $result[1]['row']);
        $this->assertEquals($column2, $result[1]['col']);
        $this->assertEquals("456", $result[1]['hints']);
    }

    public function test_deleteHints(){
        $hints = new Hints(self::$site);
        $userid = 3;
        $row = 4;
        $column = 5;
        $hints->addHints($userid, $row, $column, "123");

        $row2 = 6;
        $column2 = 7;
        $hints->addHints($userid, $row2, $column2, "456");

        $result = $hints->getHints($userid);

        $this->assertEquals(2, count($result));

        $hints->deleteHints($userid);

        $result = $hints->getHints($userid);

        $this->assertEquals(0, count($result));


    }
	
}

/// @endcond
?>
