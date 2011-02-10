<?php
	class customClass
	{
		public static function getSiteMenuItems()
		{
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
					'route'		=> array('controller' => 'elite_models', 'action' => 'rates'),
					'attr'		=> 'Rates'
				),
				'guide'	=> array(
					'text'		=> 'Guide',
					'route'		=> array('controller' => 'pages', 'action' => 'display', 'guide'),
					'attr'		=> 'Guide'
				),
				'employment'	=> array(
					'text'		=> 'Employment',
					'route'	=> array('controller' => 'employments', 'action' => 'index'),
					'attr'		=> 'Employment with Elite Model Companions'
				),
				'contacts'	=> array(
					'text'		=> 'Contact Us',
					'route'		=> array('controller' => 'contacts', 'action' => 'index'),
					'attr'		=> 'Contact Us',
					'li_attr'	=> 'farRight'
				)
			);
			
			return $links;
		}
	}