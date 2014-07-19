<?php

// We are a valid Joomla entry point.
define ( '_JEXEC', 1 );

// Setup the path related constants.
define ( 'DS', DIRECTORY_SEPARATOR );

// Once your tests run smoothly, you may comment out the next line. Without it,
// PHPUnit will fail silently, even in --verbose mode, every time a Joomla! framework
// include/require is missing ! An alternative is the PHPUnit -d display_errors=On 
// command line argument
ini_set('display_errors', 'on');

// Load PHPUnit plus DB extensions
//require_once 'PHPUnit' . DS . 'Framework.php';
require_once 'PHPUnit' . DS . 'Extensions' . DS . 'Database' . DS . 'TestCase.php';
require_once 'PHPUnit' . DS . 'Extensions' . DS . 'Database' . DS . 'DataSet' . DS . 'XmlDataSet.php';

// For Zend Studio 8.0 ...
//require_once 'PHPUnit\Extensions\Database\TestCase.php';
//require_once 'PHPUnit\Extensions\Database\DataSet\XmlDataSet.php';

define ( 'JPATH_BASE', dirname ( dirname ( dirname ( __FILE__ ) ) ) );
define ( 'JPATH_ROOT', JPATH_BASE );
define ( 'JPATH_ADMINISTRATOR', JPATH_BASE . DS . 'administrator' );
define ( 'JPATH_CONFIGURATION', JPATH_BASE );
define ( 'JPATH_LIBRARIES', JPATH_BASE . DS . 'libraries' );
define ( 'JPATH_METHODS', JPATH_ROOT . DS . 'methods' );

// Load the library importer, datbase + table classes and configuration
require_once (JPATH_LIBRARIES . DS . 'import.legacy.php');
require_once (JPATH_LIBRARIES . DS . 'legacy' . DS . 'request' . DS . 'request.php');
require_once (JPATH_LIBRARIES . DS . 'cms' . DS . 'version' . DS . 'version.php');
require_once (JPATH_LIBRARIES . DS . 'joomla' . DS . 'object' . DS . 'object.php');

require_once (JPATH_LIBRARIES . DS . 'joomla' . DS . 'database' . DS . 'database.php');
require_once (JPATH_LIBRARIES . DS . 'joomla' . DS . 'table' . DS . 'table.php');
require_once (JPATH_CONFIGURATION . DS . 'configuration.php');
require_once (JPATH_LIBRARIES . DS . 'cms.php');

// Load the TestLoader
require_once dirname ( __FILE__ ) . '\TestLoader.php';

// Register specific test autloader
if (! defined ( 'LOADED_AUTOLOADER' )) {
	spl_autoload_register ( array ('TestLoader', 'load' ) );
	define ( 'LOADED_AUTOLOADER', true );
}

// Import plugin
jimport ( 'joomla.plugin.plugin' );

// Define configuration
jimport ( 'joomla.registry.registry' );

// Create the JConfig object
$config = new JConfig ();

// Get the global configuration object
$registry = JFactory::getConfig ();

// Load the configuration values into the registry
$registry->loadObject ( $config );

// initialise a session so that it is not started later after header info has been sent to Pear Printer.
// Prevents this error: session_start(): Cannot send session cookie - headers already sent by (output started at C:\xampp\php\PEAR\PHPUnit\Util\Printer.php:173)
JFactory::getSession();
?>