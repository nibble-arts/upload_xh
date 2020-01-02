<?php

/*
 * Main plugin class
 */
namespace upload;

class View {
	

	private static $sizes = ["B","KB","MB","GB","TB"];


	// display upload block
	public static function upload ($path, $attr = "") {

		(isset($attr["title"])) ? $title = $attr["title"] : $title = "";
		(isset($attr["text"])) ? $text = $attr["text"] : $text = "";
		(isset($attr["size"])) ? $size = $attr["size"] : $size = Config::file_max_size();

		$o = "";

		$o .= Message::render();
		
		$o .= '<div class="upload_block">';

			// display title and description
			$o .= '<div class="upload_title">' . Text::get($title) . '</div>';
			$o .= '<div class="upload_text">' . Text::get($text) . '</div>';

			$o .= '<div class="upload_size">' . Text::file_max_size() . ' ' . self::filesize($size) . '</div>';

			// upload form start		
			$o .= '<form method="post" enctype="multipart/form-data" action="">';

				// file selection
				$o .= Text::file_select();
				$o .= ' <input type="file" name="upload_file" size="50"';

					// add filter for selector box
					// .file_extension
					// image/*
					// video/*
					// audio/*
					if (isset($attr["accept"])) {
						$o .= ' accept="';
						$o .= $attr["accept"];				
					}
				$o .= '">';

				// hidden parameters				
				$o .= '<input type="hidden" name="MAX_FILE_SIZE" value="2000000">';
				$o .= '<input type="hidden" name="upload_path" value="' . $path . '">';
				$o .= '<input type="submit" name="upload_submit" value="' . Text::file_upload() . '">';
		
			$o .= '</form>';
		$o .= '</div>';
		return $o;
	}


	// display error message
	public static function error ($text_id) {
		$o = '<div class="xh_error">';
			$o .= upload\Text::get($text_id);
		$o .= '</div>';
	}


	// show human readable file size
	public static function filesize($size, $pow = 1) {

		if ($size >= pow(1024, $pow)) {
			return self::filesize($size, $pow + 1);
		}

		else {
			$pow--;

			$value = number_format($size / pow(1024, $pow), 1);

			if ($pow <= count(self::$sizes)) {
				return $value . " " . self::$sizes[$pow];
			}
		}
	}
}