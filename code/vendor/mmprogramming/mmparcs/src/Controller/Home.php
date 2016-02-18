<?php
namespace MMProgramming\MMParcs\Controller;

class Home extends \ModernWays\Mvc\Controller {
	
	public function index(){
				
		return $this->view('Home', 'Index', null);
	}
}
