<?php
	class customClass
	{
		public static function getSiteMenuItems($isAdmin = false)
		{
			if ($isAdmin) {
				$links = array(
					'home'	=> array(
						'text'		=> 'Admin Home',
						'route'		=> array('controller' => 'users', 'action' => 'index'),
						'attr'		=> 'Admin homepage',
						'li_attr'	=> 'farLeft'
					),
					'elite_models'	=> array(
						'text'		=> 'Models',
						'route'		=> array('controller' => 'elite_models', 'action' => 'index'),
						'attr'		=> 'Edit models'
					),
					'logout'	=> array(
						'text'		=> 'Logout',
						'route'		=> array('controller' => 'users', 'action' => 'logout'),
						'attr'		=> 'Logout',
						'li_attr'	=> 'farRight'
					)
				);
			} else {	
				$links = array(
					'home'	=> array(
						'text'		=> 'Home',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'home'),
						'attr'		=> 'Elite Model Companions Home',
						'li_attr'	=> 'farLeft'
					),
					'elite_models'	=> array(
						'text'		=> 'Models',
						'route'		=> array('controller' => 'elite_models', 'action' => 'index'),
						'attr'		=> 'Elite Models'
					),
					'rates'	=> array(
						'text'		=> 'Rates',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'rates'),
						'attr'		=> 'Rates'
					),
					'guide'	=> array(
						'text'		=> 'Guide',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'guide'),
						'attr'		=> 'Guide'
					),
					'employments'	=> array(
						'text'		=> 'Employment',
						'route'		=> array('controller' => 'employments', 'action' => 'index'),
						'attr'		=> 'Employment with Elite Model Companions'
					),
					'contacts'	=> array(
						'text'		=> 'Contact Us',
						'route'		=> array('controller' => 'contacts', 'action' => 'index'),
						'attr'		=> 'Contact Us',
						'li_attr'	=> 'farRight'
					)
				);
			}
			
			return $links;
		}
	}