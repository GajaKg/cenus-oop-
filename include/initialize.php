<?php 

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", 'C:'.DS.'wamp64'.DS.'www'.DS.'zaposleni');
defined("LIB_PATH") ? null : define("LIB_PATH", __DIR__ . DS);

require_once(LIB_PATH . "dbconnection.php");
require_once(LIB_PATH . "dbobject.php");
require_once(LIB_PATH . "employee.php");
require_once(LIB_PATH . "info.php");
require_once(LIB_PATH . "session.php");









?>