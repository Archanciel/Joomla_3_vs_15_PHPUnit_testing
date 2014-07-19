Joomla_3_vs_15_PHPUnit_testing
==============================

Overview
--------

This repository intends to document how to setup a PHPUnit testing environnement to unit test self developed Joomla components. The unit tests use **PHPUnit** and **DBUnit**. The two packages are installed with **Composer**. The unit tests are **run from the command line** or **run from Eclipse LUNA for PHP developers**. **Debugging the tests inside Eclipse** with **XDebug** on a local **Apache/MySql** backed by **PHP 5.4** (**Xammp 1.8.2 on Windows 8.1 x64**) will also be documented. Two main commits are of interest: the commit titled **initial Joomla 1.5 PHPUnit testing environment** contains the PHPUnit testing environment which works for Joomla 1.5. The commit titled **adapt PHPUnit testing environment to Joomla 3.x ** contains the same environment, but adapted and ported to Joomla 3.x. This commit does display what was changed to the base test classes and to the test data to comply with Joomla 3.x.
