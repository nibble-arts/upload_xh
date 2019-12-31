<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	

	// display upload block
	public static function upload ($text = "") {
		
		$o = "";
		
		$o .= '<div class="upload_block">';
		
			$o .= '<form method="post" enctype="multipart/form-data" action="';
				$o .= '';
			$o .= '">';

			$o .= Text::file_select();

			$o .= '<input name="upload_file" type="file" size="50"';
//ToDo insert mime type
				//$o .= ' accept="';
				//$o .= 'text/*';
				
				$o .= '<input type="hidden" name="MAX_FILE_SIZE" value="2000000">';
			$o .= '">';

			$o .= Text::get($text);
			
			$o .= '<input type="submit" name="upload_submit" value="';
			$o .= Text::file_submit() . '">';
		
		return $o;
	}


	// display error message
	public static function error ($text_id) {
		$o = '<div class="xh_error">';
			$o .= upload\Text::get($text_id);
		$o .= '</div>';
	}
}