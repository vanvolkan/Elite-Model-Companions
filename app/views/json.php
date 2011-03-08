<?php
	class JsonView extends View {
		var $content = null;
		var $debugKit = null;
 
	  	function __construct(&$controller, $register = true) {
	    	if (is_object($controller) && isset($controller->viewVars['json'])) {
	      		$this->content = $controller->viewVars['json'];
	    	}
	    	if ($register) {
	    		ClassRegistry::addObject('view', $this);
	    	}
	    	Configure::write('debug', 0);
	  	}
 
	  	function render($action = null, $layout = null, $file = null) {
 
	    	if ($this->content === null) {
	      		$data = '';
	    	} else {
	      		$data = json_encode($this->content);
	    	}

			return $data;
	  	}
	}