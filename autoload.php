<?php

// init class autoloader
function autoload () {

	spl_autoload_register(function ($path) {
	
		if ($path && strpos($path, "upload\\") !== false) {

			$path = "classes/" . str_replace("upload\\", "", strtolower($path)) . ".php";

			include_once $path; 
		}
	});
}
	
?>