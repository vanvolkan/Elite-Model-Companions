<?php  
/** 
 * Sitemap Deluxe v1.0 Beta 
 * 
 * by Cristian Deluxe http://www.cristiandeluxe.com // http://blog.cristiandeluxe.com 
 *  
 * Licenced by a Creative Commons GNU LGPL license 
 * http://creativecommons.org/license/cc-lgpl 
 * 
 * @copyright     Copyright 2008-2009, Cristian Deluxe (http://www.cristiandeluxe.com) 
 * @link          http://bakery.cakephp.org/articles/view/sitemap-deluxe 
 */  
class SitemapsController extends AppController { 
    var $name = 'Sitemaps'; 
    var $helpers = array('Time', 'Xml', 'Javascript'); 
    var $uses = array(); 
    var $array_dynamic = array(); 
    var $array_static = array(); 
    var $sitemap_url = '/sitemap.xml'; 
    var $yahoo_key = 'insert your yahoo api key here'; 

    /*  
     * Our sitemap  
     */ 
    function index(){ 
           Configure::write('debug', 0);         
        $this->__get_data(); 
        $this->set('dynamics', $this->array_dynamic); 
        $this->set('statics', $this->array_static);         
        if ($this->RequestHandler->accepts('html')) { 
            $this->RequestHandler->respondAs('html'); 
        } elseif ($this->RequestHandler->accepts('xml')) { 
            $this->RequestHandler->respondAs('xml'); 
        }         
    } 
     
    /*  
     * Action for send sitemaps to search engines 
     */ 
    function send_sitemap() { 
        // This action must be only for admins 
    } 
     
    /*  
     * This make a simple robot.txt file use it if you don't have your own 
     */ 
    function robot() { 
           Configure::write('debug', 0); 
        $expire = 25920000; 
        header('Date: ' . date("D, j M Y G:i:s ", time()) . ' GMT'); 
        header('Expires: ' . gmdate("D, d M Y H:i:s", time() + $expire) . ' GMT'); 
        header('Content-Type: text/plain'); 
        header('Cache-Control: max-age='.$expire.', s-maxage='.$expire.', must-revalidate, proxy-revalidate'); 
        header('Pragma: nocache'); 
        echo 'User-Agent: *'."\n".'Allow: /'."\n".'Sitemap: ' . FULL_BASE_URL . $this->sitemap_url; 
        exit(); 
    } 

    /*  
     * Here must be all our public controllers and actions 
     */ 
    function __get_data() { 
        ClassRegistry::init('EliteModel')->recursive = false; 
        $this->__add_dynamic_section( 
                             'EliteModel',  
                             ClassRegistry::init('EliteModel')->find('all', array('fields' => array('slug', 'modified', 'name'))),  
                             array( 
                                    'controllertitle' => 'Elite Models', 
                                    'fields' => array('id' => 'slug', 'title' => 'name'), 
                                    'changefreq' => 'daily', 
                                    'pr' => '1.0',  
                                    'url' => array('controller' => 'elite_models', 'action' => 'view')
                                   ) 
                             );            
		$this->__add_static_section( 
	                       'Rates',  
	                       array('controller' => 'pages', 'action' => 'display', 'rates'),  
	                       array( 
	                              'changefreq' => 'yearly', 
	                              'pr' => '0.4' 
	                             ) 
	                       );
		$this->__add_static_section( 
	                       'Guide',  
	                       array('controller' => 'pages', 'action' => 'display', 'guide'),  
	                       array( 
	                              'changefreq' => 'yearly', 
	                              'pr' => '0.4' 
	                             ) 
	                       );
		$this->__add_static_section( 
	                       'Employment',  
	                       array('controller' => 'employments', 'action' => 'index'),  
	                       array( 
	                              'changefreq' => 'yearly', 
	                              'pr' => '0.4' 
	                             ) 
	                       );
		$this->__add_static_section( 
	                       'Book a model',  
	                       array('controller' => 'bookings', 'action' => 'index'),  
	                       array( 
	                              'changefreq' => 'yearly', 
	                              'pr' => '0.4' 
	                             ) 
	                       );
		$this->__add_static_section( 
	                       'Contact Us',  
	                       array('controller' => 'contacts', 'action' => 'index'),  
	                       array( 
	                              'changefreq' => 'yearly', 
	                              'pr' => '0.4' 
	                             ) 
	                       );
    } 
     
    /*  
     * Add a "static" section 
     */ 
    function __add_static_section($title = null, $url = null, $options = null) { 
        if(is_null($title) || empty($title) || is_null($url) || empty($url) ) { 
            return false; 
        } 
        $defaultoptions = array( 
                                'pr' => '0.5', // Valid values range from 0.0 to 1.0 
                                'changefreq' => 'monthly',  // Possible values: always, hourly, daily, weekly, monthly, yearly, never
                            ); 
        $options = array_merge($defaultoptions, $options);         
        $this->array_static[] = array( 
                                     'title' => $title, 
                                     'url' => $url, 
                                     'options' => $options 
                                     );         
    } 
     
     
    /*  
     * Add a section based on data from our database 
     */ 
    function __add_dynamic_section($model = null, $data = null, $options = null){ 
        if(is_null($model) || empty($model) || is_null($data) || empty($data) ) { 
            return false; 
        }
		//var_dump($data);
        $defaultoptions = array( 
                                    'fields' => array( 
                                                        'id' => 'id',  
                                                        'date' => 'modified', 
                                                        'title' => 'title' 
                                                        ), 
                                    'controllertitle' => 'not set', 
                                    'pr' => '0.5', // Valid values range from 0.0 to 1.0 
                                    'changefreq' => 'monthly',  // Possible values: always, hourly, daily, weekly, monthly, yearly, never
                                    'url' => array( 
                                                   'controller' => false,  
                                                   'action' => false,  
                                                   'index' => 'index' 
                                                   ) 
                                ); 
        $options = array_merge($defaultoptions, $options); 
        $options['fields'] = array_merge($defaultoptions['fields'], $options['fields']); 
        $options['url'] = array_merge($defaultoptions['url'], $options['url']);         
        if($options['fields']['date'] == false) { 
            $options['fields']['date'] = time(); 
        }         
        $this->array_dynamic[] = array( 
                                     'model' => $model, 
                                     'options' => $options, 
                                     'data' => $data 
                                     );
    } 
     
    /*  
     * This make a GET petition to search engine url 
     */     
    function __ping_site($url = null, $params = null) { 
        if(is_null($url) || empty($url) || is_null($params) || empty($params) ) { 
            return false;     
        } 
        App::import('Core', 'HttpSocket'); 
        $HttpSocket = new HttpSocket(); 
        $html = $HttpSocket->get($url, $params); 
        return $HttpSocket->response; 
    } 
     
    /*  
     * Show response for ajax based on a boolean result 
     */     
    function __ajaxresponse($result = false){ 
        if(!$result) { 
            return 'fail'; 
        } 
        return 'success'; 
    } 
     
    /*  
     * Function for ping Google 
     */     
    function ping_google() { 
           Configure::write('debug', 0); 
        $url = 'http://www.google.com/webmasters/tools/ping'; 
        $params = 'sitemap=' . urlencode(FULL_BASE_URL . $this->sitemap_url); 
        echo $this->__ajaxresponse($this->__check_ok_google( $this->__ping_site($url, $params) ));         
        exit(); 
    } 
     
    /*  
     * Function for check Google's response 
     */     
    function __check_ok_google($response = null){ 
        if( is_null($response) || !is_array($response) || empty($response) ) { 
            return false; 
        } 
        if( 
           isset($response['status']['code']) && $response['status']['code'] == '200' && 
           isset($response['status']['reason-phrase']) && $response['status']['reason-phrase'] == 'OK' && 
           isset($response['body']) && !empty($response['body']) &&  
           strpos(strtolower($response['body']), "successfully added") != false) { 
            return true; 
        } 
        return false; 
    } 
     
    /*  
     * Function for ping Ask.com 
     */     
    function ping_ask() { // fail if we are in local environment 
           Configure::write('debug', 0); 
        $url = 'http://submissions.ask.com/ping'; 
        $params = 'sitemap=' .  urlencode(FULL_BASE_URL . $this->sitemap_url); 
        echo $this->__ajaxresponse($this->__check_ok_ask( $this->__ping_site($url, $params) )); 
        exit(); 
    } 
     
    /*  
     * Function for check Ask's response 
     */     
    function __check_ok_ask($response = null){ 
        if( is_null($response) || !is_array($response) || empty($response) ) { 
            return false; 
        } 
        if( 
           isset($response['status']['code']) && $response['status']['code'] == '200' && 
           isset($response['status']['reason-phrase']) && $response['status']['reason-phrase'] == 'OK' && 
           isset($response['body']) && !empty($response['body']) &&  
           strpos(strtolower($response['body']), "has been successfully received and added") != false) {
            return true; 
        } 
        return false; 
    } 
     
    /*  
     * Function for ping Yahoo 
     */     
    function ping_yahoo() { 
           Configure::write('debug', 0); 
        $url = 'http://search.yahooapis.com/SiteExplorerService/V1/updateNotification'; 
        $params = 'appid='.$this->yahoo_key.'&url=' . urlencode(FULL_BASE_URL . $this->sitemap_url); 
        echo $this->__ajaxresponse($this->__check_ok_yahoo( $this->__ping_site($url, $params) )); 
        exit(); 
    } 
     
    /*  
     * Function for check Yahoo's response 
     */     
    function __check_ok_yahoo($response = null){ 
        if( is_null($response) || !is_array($response) || empty($response) ) { 
            return false; 
        } 
        if( 
           isset($response['status']['code']) && $response['status']['code'] == '200' && 
           isset($response['status']['reason-phrase']) && $response['status']['reason-phrase'] == 'OK' && 
           isset($response['body']) && !empty($response['body']) &&  
           strpos(strtolower($response['body']), "successfully submitted") != false) { 
            return true; 
        } 
        return false; 
    } 
     
    /*  
     * Function for ping Bing 
     */     
    function ping_bing() { 
           Configure::write('debug', 0); 
        $url = 'http://www.bing.com/webmaster/ping.aspx'; 
        $params = '&siteMap=' . urlencode(FULL_BASE_URL . $this->sitemap_url); 
        echo $this->__ajaxresponse($this->__check_ok_bing( $this->__ping_site($url, $params) )); 
        exit(); 
    } 
     
    /*  
     * Function for check Bing's response 
     */     
    function __check_ok_bing($response = null){ 
        if( is_null($response) || !is_array($response) || empty($response) ) { 
            return false; 
        } 
        if( 
           isset($response['status']['code']) && $response['status']['code'] == '200' && 
           isset($response['status']['reason-phrase']) && $response['status']['reason-phrase'] == 'OK' && 
           isset($response['body']) && !empty($response['body']) &&  
           strpos(strtolower($response['body']), "thanks for submitting your sitemap") != false) {
            return true; 
        } 
        return false; 
    } 
}