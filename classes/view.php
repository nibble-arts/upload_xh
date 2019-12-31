<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	
	public static function upload ($text = "") {
		
		$o = "";
		
		$o .= '<div class="upload_block">';
		
			$o = text::file_select();
			$o .= '<input name="upload_file" type="file" size="50" accept="';
//ToDo insert mime type
				$o .= '';
			$o .= 'text/*">';
			$o .= $text;
			
			$o .= '<input type="submit" name="upload_submit" value="';
			$o .= text::file_submit() . '">';
		
		return $o;
	}
}