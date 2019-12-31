<?php

// init class autoloader
function autoload ($namespace) {

	spl_autoload_register(function ($path) {
	
		if ($path && strpos($path, $namespace . "\\") !== false) {
			
			$path = "classes/" . str_replace($namespace . "\\", "", strtolower($path)) . ".php";

debug($path);
			include_once $path; 
		}
	});
}
	
?>