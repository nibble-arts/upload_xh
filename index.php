<?php

// register autoloader
include_once "autoload.php";
autoload ("upload");


// initialize main plugin class
upload\Main::init($plugin_cf, $plugin_tx);


// main plugin function
// upload to path
// attributes:
// 	all attributes are optional
//		group: access group
//		title: upload dialog title
//		text: upload description text
//		accept: selector box filter
function Upload ($path = false, $attributes = false) {

	if ($path) {

		$groups = [];

		// memberaccess installed
		// and logged
		// and access with correct group
		if (isset($attributes["group"]) && class_exists("ma\Access") && ma\Access::has_rights($attributes["group"])) {

			$groups[] = $attributes["group"];

			upload\Main::edit(true);
		}

		// execute
		return upload\Main::render($path, $attributes);
	}

	else {
		return upload\View::error("error_no_path");
	}
}

?>