<?php
namespace MMProgramming\MMParcs\Controller;

class Admin extends \ModernWays\Mvc\Controller {
	
	public function index(){
		
		return $this->view('Admin', 'Index', null);
	}
}