<?php

/*
 * Main plugin class
 */
namespace upload;

class Main {
	
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
	public static function render ($path, $attr = false) {

		$o = "";

		// has edit access
		if (self::$edit) {
			$o .= view::upload($path, $attr);
		}
		
		return $o;
	}
	
	// set edit state
	public static function edit ($status) {
		self::$edit = $status;
	}
	
	// check for uploaded file
	public static function action () {

		// set message/error
		if (File::error()) {
			Messages::failure(File::error_string());
		}
		else {
			Message::success(File::error_string());
		}


		// Session::session("xh_csrf_token") == Session::param("token") && 

		// check session token
		// file exists
		if (File::has_file()) {

			// check file size
			if(File::size() > Config::file_max_size()) {
				Message::failure("error_file_size");
			}

			// copy file to destinition
			else {
				File::copy(Session::param("upload_path"));
			}
		}
	}
}

?>