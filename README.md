Joomla_3_vs_15_PHPUnit_testing
==============================

Overview
--------

This repository intends to document how to setup a lightweight PHPUnit testing environnement to unit test self developed Joomla components. The unit tests use **PHPUnit** and **DBUnit**. The two packages are installed with **Composer**. The unit tests are run from the command line or run from **Eclipse LUNA for PHP developers**. Debugging the tests inside Eclipse with **XDebug** on a local **Apache/MySql** backed by **PHP 5.4** (Xammp 1.8.2 on Windows 8.1 x64) will also be documented. Two main commits are of interest: the commit titled [**initial Joomla 1.5 PHPUnit testing environment**](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/commit/17282191abf9fbd6342a341e59e60c6b82443aee) contains the PHPUnit testing environment which works for Joomla 1.5. The commit titled [**adapt PHPUnit testing environment to Joomla 3.x**](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/commit/46f8dcfd3d4d0cce6611cff76cf9945334a1b42b) contains the same environment, but adapted and ported to Joomla 3.x. This commit does display what was changed to the base test classes and to the test data to comply with Joomla 3.x.

_French speakers find information rich spoken audio on my site: http://plusconscient.net._

_This readme file was written with the free [Dillinger Markdown editor](http://dillinger.io/)_


Installing the testing environment
----------------------------------

Unless specifed, the explanations below apply to both version of Joomla !

###Composer
-----------

* install composer on your workstation (installable available at https://getcomposer.org/)
* create a composer folder in the root of your Joomla project
* in the composer folder, create a file named composer.json
* edit composer.json and add
````
{
    "require-dev": {
        "phpunit/phpunit": "3.7.37",
		"phpunit/dbunit": "1.3.1"
   }
}
````
_I did not yet figured out how to set up the run and debug Eclipse configuration with PHPUnit 4+ !_

* open a dos window on the composer folder and type
```
composer install
```
This will download the PHPUNIT and DBUNIT packages in the composer\vendor folder. Composer is easy to use. More info at https://getcomposer.org/.

###Eclipse project PHP include path
-----------------------------------

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_include_path.jpg)
_Notice that no libraries are required to run or debug the tests !_

###Eclipse run configuration
----------------------------

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_%20ext_tool_run_conf.jpg)
_the config displayed above is taken from the Joomla3.x project. On a Joomla 1.5 project, only the Joomla root part of the path does change !_

###Warning
When running the tests in the Joomla 1.5 environnement, the tests succed but the run ends with the stack trace below. I did not figure out why this happens !

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_error_stack_trace.jpg)

###Eclipse debug configuration
------------------------------

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_debug_conf.jpg)

Test directory structure
------------------------

```
<Joomla root>
   TEST
      data     // contains D£BUnit test data  files
      lib      // contains test base class and test loader
      unittest // contains PHPUnit tests
```

Running tests
---------

###At command line

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_run_command_line.jpg)

###In Eclipse

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_run_selected_test.jpg)
_Running one selected PHPUnit test_

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_run_all_tests.jpg)
_Running all PHPUnit tests in the selected folder_

Debugging tests in Eclipse
------------------------

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_debug_selected_test.jpg)

Disabling coverage to increase test speed
---------------------------------------------------

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Joo15_3x_disable_coverage.jpg)

Using MakeGood to run and debug tests
-------------------------------------

###Install MakeGood 3.1.1 or later
Previous versions either not compatible with Eclipse PDT Luna or bogged down. Releases are listed [here](https://github.com/piece/makegood/releases). But normally, install from Eclipse Marketplace like any Eclipse plugin !

###Create preload PHP script somewhere in your workspace with content similar to
````
<?php
	// Setup the path related constants.
	define ( 'DS', DIRECTORY_SEPARATOR );
	require dirname ( __DIR__ ) . DS . 'composer' . DS . 'vendor' . DS . 'autoload.php';
?>
````

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Makegood_script_loc.jpg)

_Here, the preload script is put in the TEST folder_

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Makegood_refresh.jpg)

_Do not forget to refresh the Eclipse folder !_

![](https://github.com/Archanciel/Joomla_3_vs_15_PHPUnit_testing/blob/master/Github_doc/Makegood_properties.jpg)

_Finally, edit the MakeGood properties accessed in the project properties_

You now are able to run and debug your tests with the MakeGood plugin, as explained in the [MakeGood user guide](http://piece-framework.com/projects/makegood/wiki/MakeGood_User_Guide_1_7_0)