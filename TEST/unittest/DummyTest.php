<?php

define ( 'DS', DIRECTORY_SEPARATOR );
require_once dirname ( __FILE__ ) . DS . '..' . DS . 'lib' . DS . 'TestCase.php';

class DummyTest extends PHPUnit_Framework_TestCase {
	public function testHello() {
		$this->assertEquals('hello','hello');
	}
}

?>