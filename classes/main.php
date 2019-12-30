<?php

/*
 * Main plugin class
 */
namespace upload;

class Main {
	
	private static $path = false;
	
	
	// edit state
	private static $edit = false;
	
	// initial plugin class
	public static function init($config, $text) {

		// load plugin data
		Session::load();
		Config::init($config["upload"]);
		Text::init($text["upload"]);
		
		self::action();
	}
	
	// render view
	// only if memberaccess active and user is logged
	public static function render ($path = false, $attributes = false) {
		
		// has edit access
		if ($self::edit) {
			$o .= view::upload($self::path);
		}
		
		return $o;
	}
	
	// set edit state
	public static function edit ($status) {
		$self::edit = $status;
	}
	
	// check for uploaded file
	public static function action () {
	}
}

?>