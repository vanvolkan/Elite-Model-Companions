<?php
	class BannersController extends AppController
	{
		public $name = 'banners';
		
		public function getBanners($limit = 5)
		{
			if (isset($this->params['requested'])) {
				return $this->Banner->find('all', array(
					'limit'		=> $limit,
					'order'		=> array('Banner.created', 'Banner.modified')
				));
			}
		}
	}