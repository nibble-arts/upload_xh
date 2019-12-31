<?php

/*
 * Main plugin class
 */
namespace upload;

class Main {
	
	private static $path = false;
	private static $edit = false;
	
	// initial plugin class
	public static function init($config, $text) {

		// load plugin data
		Session::load();
		Config::init($config["upload"]);
		Text::init($text["upload"]);
		File::init("upload_file");
		
		self::action();
	}
	
	// render view
	// only if memberaccess active and user is logged
	public static function render ($path = false, $attributes = false) {

		$o = "";

//ToDo check for user has group
		// has edit access
		if (self::$edit) {
			$o .= view::upload($attributes);
		}
		
		return $o;
	}
	
	// set edit state
	public static function edit ($status) {

		self::$edit = $status;
	}
	
	// check for uploaded file
	public static function action () {

		if (File::has_file()) {

			debug("File uploaded");
		}
		
		
	}
}

?>