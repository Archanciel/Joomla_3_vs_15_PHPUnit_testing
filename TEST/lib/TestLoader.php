<?php

/**
 * Testloader class
 *
 * This class strips the requested class and passes it thru
 * to the Joomla autoload function
 *
 * @author Paul de Raaij <paul@paulderaaij.nl>
 */

// Preload the model so we can add paths to the include path of JLoader
jimport ( 'joomla.application.component.model' );

class TestLoader {
	
	/**
 	 * Strip the given class and pass it to the
 	 * Joomla autoloader.
 	 *
 	 * If it's a component add the path to the
 	 * include path of the loader
 	 *
 	 * @param String $classname
 	 * @return bool Has the inclusion succeeded
 	 */
	static public function load($classname) {
		$explodedPath = self::explodeClassname ( $classname );
		
		if ($explodedPath == null) {
			return self::loadJoomlaClass ( $classname );
		}
		
		// Add the folder to the loader include path
		JModel::addIncludePath ( JPATH_ROOT . '/components/com_' . $explodedPath ['component'] . '/' . $explodedPath ['type'] . 's' );
		
		return self::loadJoomlaClass ( $classname );
	}
	
	/**
	 * Explode the classname and strip component name,
	 * type and type name
	 *
 	 * @param string $classname
 	 * @return mixed Returns null when it's a core file. Returns an array with data if it's a component data
 	 */
	static protected function explodeClassname($classname) {
		$types = array ('model', 'controller', 'helper', 'view' );
		$classname = strtolower ( $classname );
		
		if ($classname == 'jmodel') {
			return null;
		}
		
		$fileInfo = array ();
		
		foreach ( $types as $type ) {
			if (false !== strpos ( $classname, $type )) {
				$fileInfo ['type'] = $type;
			}
		}
		
		if (isset ( $fileInfo ['type'] )) {
			$fileInfo ['component'] = substr ( $classname, 0, strpos ( $classname, $fileInfo ['type'] ) );
			$fileInfo ['name'] = substr ( $classname, (strpos ( $classname, $fileInfo ['type'] ) + strlen ( $fileInfo ['type'] )) );

			return $fileInfo;
		}
		
		return null;
	}
	
	/**
	 * Simple pass thru function to the Joomla autoloader
	 *
	 * @param string $class
	 * @return bool Has inclusion succeeded?
	 */
	static public function loadJoomlaClass($class) {
		return JLoader::load ( $class );
	}
}

?>