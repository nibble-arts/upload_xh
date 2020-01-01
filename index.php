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
//		
function Upload ($path = false, $attributes = false) {

	if ($path) {

		$groups = [];

		// memberaccess installed
		// and logged
		// and user is in upload access group
		if (class_exists("ma\Access") && ma\Access::user() && ma\Groups::user_is_in_group(ma\Access::user()->username(), news\Config::access_admin_group())) {

			// collect access classes
			// add admin
			$groups[] = "admin";

			// group set
			if (isset($attributes["group"])) {

				$groups[] = $attributes["group"];

				// access with correct group
				if (\ma\Groups::user_is_in_group(\ma\Access::user()->username(), $groups)) {

					upload\Main::edit(true);
				}

				// show when no group defined
				else {
					upload\Main::edit(true);
				}
			}
		}
		
		// execute
		return upload\Main::render($path, $attributes);
	}

	else {
		return upload\View::error("error_no_path");
	}
}

?>