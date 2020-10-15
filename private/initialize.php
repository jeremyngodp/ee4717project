<?php
// ob_start();

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . "/public");
define("SHARED_PATH", PRIVATE_PATH . "/shared");

require_once("database.php");
require_once("queryfunction.php");
require_once("functions.php");

@$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$errors = [];

?>