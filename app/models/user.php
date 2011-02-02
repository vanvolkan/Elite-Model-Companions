<?php
	class User extends AppModel
	{
		public $name = 'User';
		
		function hashPasswords($data)
		{
			if (isset($data['User']['password']))
			{
				$data['User']['password'] = sha1($data['User']['password']);
				return $data;
			}
			
			return $data;
		}
	}