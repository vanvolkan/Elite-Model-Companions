<?php
	class User extends AppModel
	{
		public $name = 'User';
		
		public $validate = array(
			'current_password'	=> array(
				'passwordMatches'	=> array(
					'rule'		=> array('checkPassword'),
					'message'	=> 'Your current password does not match what is in the database. Please try again.'
				)
			),
			'new_password'	=> array(
				'minLength'	=> array(
					'rule'		=> array('minLength', 5),
					'message'	=> 'Password must have a minimum of 5 characters'
				)
			),
			'new_password2'	=> array(
				'passwordMatches'	=> array(
					'rule'		=> array('passwordMatches'),
					'message'	=> 'Password mismatch. New passwords do not match. Please try again.'
				)
			)
		);
		
		public function checkPassword($pass)
		{
			$pass = array_values($pass);
			$pass = sha1($pass[0]);
			$found = $this->find('first', array(
				'conditions'	=> array(
					'id'		=> $this->id,
					'password'	=> $pass
				)
			));
			
			return $found;
		}
		
		public function passwordMatches($pass1)
		{
			$pass1 = array_values($pass1);
			$pass1 = $pass1[0];
			$pass2 = $this->data['User']['new_password'];
			
			return $pass1 == $pass2;
		}
		
		public function hashPasswords($data)
		{
			if (isset($data['User']['password']))
			{
				$data['User']['password'] = sha1($data['User']['password']);
				return $data;
			}
			
			return $data;
		}
		
		public function beforeSave()
		{
			if (!empty($this->data['User']['new_password2']))
				$this->data['User']['password'] = sha1($this->data['User']['new_password2']);
				
			return true;
		}
	}