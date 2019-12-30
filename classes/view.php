<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	
	public static function upload ($text = "") {
		
		$o = "";
		
		$o .= '<div class="upload_block">';
		
			$o = 'Upload File ';
			$o .= $text;
			
		$o .= '</div>;
		
		return $o;
	}
}