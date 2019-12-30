<?php

// register autoloader
include_once "autoload.php";
autoload ("upload");


// initialize main plugin class
upload\main::init($plugin_cf, $plugin_tx);


// main plugin function
// upload to path
// attributes:
function Upload ($path, $attributes = false) {

	// memberaccess installed
	// and logged
	// and user is in upload access group
	if (class_exists("ma\Access") && ma\Access::user() && ma\Groups::user_is_in_group(ma\Access::user()->username(), news\Config::access_admin_group())) {

		upload\main::edit(true);
	}
	
	// execute
	return upload\main:: render($path, $attributes);

}

?>