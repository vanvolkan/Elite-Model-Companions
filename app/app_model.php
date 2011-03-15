<?php
	class AppModel extends Model
	{
		public $actsAs = array('Containable');
		public $recursive = -1;
		
		/**
		 * Custom validation rule for uploaded files.
		 * 
		 * @param Array $data CakePHP File info.
		 * @param Boolean $required Is this file required?
		 * @return Boolean Did the validation pass or fail
		*/
		public function validateUploadFile($data, $required = false)
		{
			// Remove first level of Array ($data['recent_photograph1']['size'] because $data['size'])
			$uploaded_info = array_shift($data);
						
			// No file uploaded
			if ($uploaded_info['size'] == 0) {
				// If the image is required return false
				if ($required)
					return false;
				
				// Otherwise return true
				return true;
			}
				
			// Check for basic PHP file errors
			if ($uploaded_info['error'] !== 0) {
				die($uploaded_info['error']);
				return false;
			}
			
			// Only allow jpg/jpeg/png/gif files
			$filename = basename($uploaded_info['name']);
			$ext = substr($filename, strrpos($filename, '.')  + 1);

			if (($ext != "jpg" && $uploaded_info['type'] != "image/jpeg") && ($ext != "jpeg" && $uploaded_info['type'] != "image/jpeg")
			&& ($ext != "png" && $uploaded_info['type'] != "image/png") && ($ext != "gif" && $uploaded_info['type'] != "image/gif"))
				return false;
			
			// Finally, use PHP's own file validation method.
			return is_uploaded_file($uploaded_info['tmp_name']);
		}
	}