Joomla_3_vs_15_PHPUnit_testing
==============================

Overview
--------

This repository intends to document how to setup a lightweight PHPUnit testing environnement to unit test self developed Joomla components. The unit tests use **PHPUnit** and **DBUnit**. The two packages are installed with **Composer**. The unit tests are run from the command line or run from **Eclipse LUNA for PHP developers**. Debugging the tests inside Eclipse with **XDebug** on a local **Apache/MySql** backed by **PHP 5.4** (Xammp 1.8.2 on Windows 8.1 x64) will also be documented. Two main commits are of interest: the commit titled **initial Joomla 1.5 PHPUnit testing environment** contains the PHPUnit testing environment which works for Joomla 1.5. The commit titled **adapt PHPUnit testing environment to Joomla 3.x** contains the same environment, but adapted and ported to Joomla 3.x. This commit does display what was changed to the base test classes and to the test data to comply with Joomla 3.x.

_If you are french speaking, you may be interested by my site: http://plusconscient.net._

###_REST OF DOCUMENTATION TO BE WRITTEN ON JULY 20TH, 2014_
------------------------------------------------------

Installing the testing environment
----------------------------------

Unless specifed, the explanations below apply to both version of Joomla !

###Composer
-----------

* create a composer folder in the root of your Joomla project
* in the composer folder, create a file named composer.json
* edit composer.json, typing
````
{
    "require-dev": {
        "phpunit/phpunit": "3.7.37",
		"phpunit/dbunit": "1.3.1"
   }
}
````
* open a dos window on the composer folder and type
```
composer install
```
This will download the PHPUNIT and DBUNIT packaages in the composer\vendor folder. Composer is easy to use. More info at https://getcomposer.org/.

###Eclipse run configuration
----------------------------

###Eclipse debug configuration
------------------------------

Test directory structure
------------------------

Run tests
---------

###From command line

###From Eclipse

Debug tests from Eclipse
------------------------