<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/958/The-Pages-Controller
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		
		$metaDescription = '';
		$metaKeywords = array();
		
		switch ($page) {
			case 'home':
				$metaDescription = "At Elite Model Companions we endeavor to offer some of the most naturally beautiful, classy and sophisticated women available, catering to clientele of style, sophistication, class and importance. We guarantee that you will always receive our full attention to your requests and we will always strive to make your date both perfect and memorable";
 				$metaKeywords = array('Elite Model Companions', 'high class', 'Newcastle', 'central coast', 'Sydney escorts', 'agency', 'naturally', 'beautiful', 'classy', 'sophisticated', 'clientele', 'style', 'sophistication', 'class', 'importance', 'full attention', 'perfect', 'memorable', 'date');
			break;
			case 'guide':
				$metaDescription = "Before making an enquiry with us...Check the model's details on the website and be sure you are aware of her rates. Do not call or e-mail unless you are genuinely interested. Be respectful and friendly towards the booking co-coordinators, and bear in mind that this is a business transaction.";
				$metaKeywords = array('rates', 'Cleanliness', 'Money', 'Models', 'courteous');
			break;
			case 'rates':
				$metaDescription = "The determination of models rates takes into consideration various factors, including natural beauty, fitness, education, erotic technique, life experience, elegance, sophistication, charisma and much more! Discounts apply to extended bookings of more than two hours and group bookings.";
				$metaKeywords = array('fitness', 'erotic technique', 'charisma', 'high standard', 'affordable price', 'courtesans', 'professional', 'successful', 'celebrity', 'penthouse pets', 'playboy bunnies', 'porn stars');
			break;
		}
		$page_for_layout = $page . '_item';
		$this->set(compact('page', 'subpage', 'title_for_layout', 'page_for_layout', 'metaDescription', 'metaKeywords'));
		$this->render(implode('/', $path));
	}
}
