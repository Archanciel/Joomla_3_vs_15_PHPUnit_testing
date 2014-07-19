<?php

define ( 'DS', DIRECTORY_SEPARATOR );
require_once dirname ( __FILE__ ) . DS . '..' . DS . 'lib' . DS . 'TestCase.php';

class DBUnitJoomlaUnitTest extends PHPUnit_Extensions_Database_TestCase {
	
	public function setUp() {
		parent::setUp();
	}
	
	public function testLoadRecordUsingTableAccessOnDbUnitData() {
		$contentRow = JTable::getInstance ( 'content' );
		$contentRow->load ( 100001 );
		$this->assertEquals ( "Great Barrier Reef", $contentRow->title );
	}
	
	public function testLoadRecordUsingQuery() {
		$query = "SELECT * FROM  `#__content` WHERE `id` = 100001";
		
		/* @var $db JDataBase */
		$db = JFactory::getDBO ();
		$db->setQuery ( $query );
		$result = $db->loadAssocList ();
		
		/* Die on error */
		if ($db->getErrorMsg ()) {
			echo $db->getErrorMsg ();
			die ();
		}
		
		$this->assertEquals ( "Great Barrier Reef", $result [0] ['title'] );
	}
	
	/**
	 * Sets the connection to the database
	 *
	 * @return connection
	 */
	protected function getConnection() {
		
		// Beware the PHP version !
		
// 		$dbURLPHP5_3_6_andLater = 'mysql:host=localhost;dbname=plucon15_dev;charset=UTF-8';
// 		$pdo = new PDO ( $dbURLPHP5_3_6_andLater, 'root', '' );

		$dbURLBeforePHP5_3_6 = 'mysql:host=localhost;dbname=pluscon15_dev';
		$options = array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
		$pdo = new PDO ( $dbURLBeforePHP5_3_6, 'root', '', $options );	// no pw for root !
				
		return $this->createDefaultDBConnection ( $pdo, 'pluscon15_dev' );
	}
	
	/**
	 * Gets the data set to be loaded into the database during setup
	 *
	 * @return xml dataset
	 */
	protected function getDataSet() {
		return $this->createXMLDataSet ( dirname ( __FILE__ ) . DS . '..' . DS . 'data' . DS . 'test.xml' );
	}
	
	protected function getSetUpOperation() {
		return $this->getOperations ()->INSERT();
	}
		
	protected function getTearDownOperation() {
		return $this->getOperations ()->DELETE();
	}
}

?>