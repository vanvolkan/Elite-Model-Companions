<?php
	class Employment extends AppModel
	{
		public $name = 'Employment';
		
		public $validate = array(
			'work_name'	=> array(
				'alphaNumeric'		=> array(
					'rule'			=> 'alphaNumeric',
					'required'		=> true,
					'message'		=> 'Work name is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', 100),
					'message'		=> 'Maximum length of 100 characters'
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
					'message'		=> 'Maximum length of 50 characters'
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
					'message'		=> 'Maximum length of 80 characters'
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
					'message'		=> 'Maximum of 100 characters'
				)
			),
			'phone_number'			=> array(
				'notEmpty'			=> array(
					'rule'			=> 'notEmpty',
					'message'		=> 'Your contact number is required'
				),
				'maxLength'			=> array(
					'rule'			=> array('maxLength', )
				)
			)
		);
	}