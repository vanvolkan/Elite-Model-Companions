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
						'li_attr'	=> 'farLeft',
						'slug'		=> 'users'
					),
					'elite_models'	=> array(
						'text'		=> 'Models',
						'route'		=> array('controller' => 'elite_models', 'action' => 'index'),
						'attr'		=> 'Edit models',
						'slug'		=> 'elite_models'
					),
					'logout'	=> array(
						'text'		=> 'Logout',
						'route'		=> array('controller' => 'users', 'action' => 'logout'),
						'attr'		=> 'Logout',
						'li_attr'	=> 'farRight',
						'slug'		=> 'elite_models/logout'
					)
				);
			} else {	
				$links = array(
					'home'	=> array(
						'text'		=> 'Home',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'home'),
						'attr'		=> 'Elite Model Companions Home',
						'li_attr'	=> 'farLeft',
						'slug'		=> '/'
					),
					'elite_models'	=> array(
						'text'		=> 'Models',
						'route'		=> array('controller' => 'elite_models', 'action' => 'index'),
						'attr'		=> 'Elite Models',
						'slug'		=> 'elite_models'
					),
					'rates'	=> array(
						'text'		=> 'Rates',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'rates'),
						'attr'		=> 'Rates',
						'class'		=> 'pages_rates rates',
						'slug'		=> 'rates'
					),
					'guide'	=> array(
						'text'		=> 'Guide',
						'route'		=> array('controller' => 'pages', 'action' => 'display', 'guide'),
						'attr'		=> 'Guide',
						'slug'		=> 'guide'
					),
					'employments'	=> array(
						'text'		=> 'Employment',
						'route'		=> array('controller' => 'employments', 'action' => 'index'),
						'attr'		=> 'Employment with Elite Model Companions',
						'slug'		=> 'employments'
					),
					'contacts'	=> array(
						'text'		=> 'Contact Us',
						'route'		=> array('controller' => 'contacts', 'action' => 'index'),
						'attr'		=> 'Contact Us',
						'li_attr'	=> 'farRight',
						'slug'		=> 'contacts'
					)
				);
			}
			
			return $links;
		}
	}