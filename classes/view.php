<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	

	// display upload block
	public static function upload ($path, $attr = "") {

		(isset($attr["title"])) ? $title = $attr["title"] : $title = "";
		(isset($attr["text"])) ? $text = $attr["text"] : $text = "";

		$o = "";
		
		$o .= '<div class="upload_block">';

			$o .= '<div class="upload_title">' . Text::get($title) . '</div>';

			$o .= '<div class="upload_text">' . Text::get($text) . '</div>';
		
			$o .= '<form method="post" enctype="multipart/form-data" action="';
				$o .= '';
			$o .= '">';

			$o .= Text::file_select();

			$o .= ' <input name="upload_file" type="file" size="50"';
//ToDo insert mime type
				//$o .= ' accept="';
				//$o .= 'text/*';				
			$o .= '">';

			
			$o .= '<input type="hidden" name="MAX_FILE_SIZE" value="2000000">';

			$o .= '<input type="hidden" name="upload_path" value="' . $path . '">';

			$o .= '<input type="submit" name="upload_submit" value="';
			$o .= Text::file_upload() . '">';
		
		$o .= '</div>';
		return $o;
	}


	// display error message
	public static function error ($text_id) {
		$o = '<div class="xh_error">';
			$o .= upload\Text::get($text_id);
		$o .= '</div>';
	}
}