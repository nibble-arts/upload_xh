<?php

namespace upload;

class File {
	
	private static $file = false;
	
	// load files data from http post
	public static function init ($id) {
		
		if (isset($_FILES[$id])) {
			self::$file = $_FILES[$id];
		}
		else {
			self::$file = false;
		}
	}

	// check for file
	public static function has_file () {

		if (!self::$file["error"] && self::$file["size"] > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	

	// copy file to destination
	public static function copy ($target) {

debug("copy tmp file ".self::$file["tmp_name"]." to ".$target."/".self::$file["name"]);

	}


	// get file property
	// name, type, size, tmp_name, error
	public static function __callStatic ($name, $atte) {
		
		if (self::has_file() && isset(self::$file [$name])) {
			return self::$file [$name];
		}
		
		return false;
	}
}

?>