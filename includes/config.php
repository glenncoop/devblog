<?php
ob_start();
session_start();

//database creds
define('DBHOST','localhost');
define('DBUSER', 'root');
define('DBPASS', 'youracunt12');
define('DBNAME', 'blog');

$db = new PDO("mysql:host=".DBHOST";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//timezone
date_default_timezone_get('Europe\London');

//classes loaded as needed
function __autoload($class){
	$class = strtolower($class);

	$classpath = 'classes/class.'.$class . '.php';
	if (file_exists($classpth)){
		require_once $classpath;
	}

	$classpath = '../classes/class.' .$class . '.php';
	if (file_exists($classpath)){
		require_once $classpath;
	}
}

$user = new User($db);


?>