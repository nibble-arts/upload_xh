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

		if (self::$file) {
			return true;
		}
		else {
			return false;
		}
	}
	
	// get file property
	// name, type, size, tmp_name, error
	public static function __call ($name, $atte) {
		
		if (self::has_file && isser(self::$file [$name])) {
			return self::$file [$name];
		}
		
		return false;
	}
}

?>