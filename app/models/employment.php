<?php
	class Employment extends AppModel
	{
		public $name = 'Employment';
		
		public $validate = array(
			'work_name'	=> array(
				'notEmpty'			=> array(
					'rule'			=> 'notEmpty',
					'required'		=> true,
					'message'		=> 'Work name is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 100),
					'message'		=> 'Maximum length of 100 characters for Work Name'
				)
			),
			'first_name'			=> array(
				'alphaNumeric'		=> array(
					'rule'			=> 'alphaNumeric',
					'required'		=> true,
					'message'		=> 'First name is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 50),
					'message'		=> 'Maximum length of 50 characters for First Name'
				)
			),
			'last_name'				=> array(
				'alphaNumeric'		=> array(
					'rule'			=> 'alphaNumeric',
					'required'		=> true,
					'message'		=> 'Last name is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 80),
					'message'		=> 'Maximum length of 80 characters for Last Name'
				)
			),
			'email_address'			=> array(
				'email'				=> array(
					'rule'			=> 'email',
					'required'		=> true,
					'message'		=> 'A valid email address is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 100),
					'message'		=> 'Maximum of 100 characters for Email Address'
				)
			),
			'phone_number'			=> array(
				'notEmpty'			=> array(
					'rule'			=> 'notEmpty',
					'message'		=> 'Your contact number is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 20),
					'message'		=> 'Maximum of 20 characters for Phone Number'
				)
			),
			'suburb'				=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Suburb'
			),
			'state'					=> array(
				'notEmpty'			=> array(
					'rule'			=> 'notEmpty',
					'message'		=> 'Your State is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 20),
					'message'		=> 'Maximum of 20 characters for State'
				)
			),
			'age'					=> array(
				'numeric'			=> array(
					'rule'			=> 'numeric',
					'message'		=> 'Please provide a valid age'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 3),
					'message'		=> 'Maximum of 3 characters for Age'
				)
			),
			'height'				=> array(
				'rule'				=> array('maxLength', 50),
				'message'			=> 'Maximum of 50 characters for Height'
			),
			'dress_size'			=> array(
				'rule'				=> array('maxLength', 50),
				'message'			=> 'Maximum of 50 characters for Dress Size'
			),
			'shoe_size'				=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Shoe Size'
			),
			'bust_size'				=> array(
				'notEmpty'			=> array(
					'rule'			=> 'notEmpty',
					'message'		=> 'Please provide your Bust Size'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 20),
					'message'		=> array('Maximum of 20 characters for Bust Size')
				)
			),
			'natural'				=> array(
				'allowedChoce'		=> array(
					'rule'			=> array('inList', array('Yes', 'No')),
					'message'		=> 'Invalid input for "Natural" question. Please select from the drop down box'
				)
			),
			'waist'					=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Waist Size'
			),
			'hips'					=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Hips'
			),
			'hair_colour'			=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Hair Colour'
			),
			'hair_length'			=> array(
				'rule'				=> array('maxLength', 30),
				'message'			=> 'Maximum of 30 characters for Hair Length'
			),
			'eye_colour'			=> array(
				'rule'				=> array('maxLength', 20),
				'message'			=> 'Maximum of 20 characters for Eye Colour'
			),
			'how_heard'				=> array(
				'rule'				=> array('maxLength', 255),
				'message'			=> 'Maximum of 255 characters for How did you hear about us'
			),
			'description'			=> array(
				'rule'				=> 'notEmpty',
				'message'			=> 'Please provide a brief description of yourself in the description box'
			),
			'recent_photograph1'	=> array(
				'rule'				=> array('validateUploadFile', true),
				'message'			=> 'An error occurred whilst uploading file #1. Please ensure the file is of one of these formats: jpg, jpeg, png, gif'
			),
			'recent_photograph2'	=> array(
				'rule'				=> array('validateUploadFile', false),
				'message'			=> 'An error occurred whilst uploading file #2. Please ensure the file is of one of these formats: jpg, jpeg, png, gif'
			),
			'recent_photograph3'	=> array(
				'rule'				=> array('validateUploadFile', false),
				'message'			=> 'An error occurred whilst uploading file #3. Please ensure the file is of one of these formats: jpg, jpeg, png, gif'
			),
			'recent_photograph4'	=> array(
				'rule'				=> array('validateUploadFile', false),
				'message'			=> 'An error occurred whilst uploading file #4. Please ensure the file is of one of these formats: jpg, jpeg, png, gif'
			)
		);
		
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
			if ($uploaded_info['error'] !== 0)
				return false;
			
			// Only allow jpg/jpeg/png/gif files
			$filename = basename($uploaded_info['name']);
			$ext = substr($filename, strrpos($filename, '.')  + 1);

			if (($ext != "jpg" && $uploaded_info['type'] != "image/jpeg") && ($ext != "jpeg" && $uploaded_info['type'] != "image/jpeg")
			&& ($ext != "png" && $uploaded_info['type'] != "image/png") && ($ext != "gif" && $uploaded_info['type'] != "image/gif"))
				return false;
			
			// Finally, use PHP's own file validation method.
			return is_uploaded_file($uploaded_info['tmp_name']);
		}
		
		/**
		 * Our beforeSave function
		 *
		 * Before we save the record to the database - we need to upload any files that may have been submitted
		 *
		 * @param Array $created The created record
		*/
		public function beforeSave($created)
		{
			$uploadDir = APP . 'tmp' . DS . 'employment' . DS;
			
			for ($i = 1; $i <= 4; $i++) {
				$currentItem = 'recent_photograph' . $i;
				extract($this->data['Employment'][$currentItem], EXTR_OVERWRITE);
				$fileName = $uploadDir . '_' . time() . '_' . $name;
				
				if ($size && !$error) {
					move_uploaded_file($tmp_name, $fileName);
					$this->data['Employment'][$currentItem] = $fileName;
				} else
					$this->data['Employment'][$currentItem] = NULL;
			}
			
			return true;
		}
	}