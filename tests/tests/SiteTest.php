<?php
/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */
class EmptyTest extends \PHPUnit_Framework_TestCase
{
	public function test_email(){
		$site = new Site();
		$site->setEmail("lawre272@msu.edu");
		$this->assertEquals("lawre272@msu.edu",$site->getEmail());
	}

	public function test_root(){
		$site = new Site();
		$site->setRoot('Site root');
		$this->assertEquals('Site root', $site->getRoot());
	}

	public function test_gettablePrefix(){
		$site = new Site();
		$site->dbConfigure('host','user','pass','prefx');
		$this->assertEquals('prefx', $site->getTablePrefix());
	}

	public function test_localize() {
		$site = new Site();
		$localize = require 'localize.inc.php';
		if(is_callable($localize)) {
			$localize($site);
		}
		$this->assertEquals('testp2_', $site->getTablePrefix());
	}

}

/// @endcond
?>
