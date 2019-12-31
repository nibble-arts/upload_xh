<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	
	public static function upload ($text = "") {
		
		$o = "";
		
		$o .= '<div class="upload_block">';
		
			$o = text::select_file();
			$o .= '<input name="upload_file" type="file" size="50" accept="';

				$o .= '';
			$o .= 'text/*">';
			$o .= $text;
			
		$o .= '</div>;
		
		return $o;
	}
}