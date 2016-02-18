<?php
namespace MMProgramming\MMParcs\Controller;

class AppController extends \MMProgramming\MMParcs\Controller\DalController {
		
	public function __construct($route, $noticeBoard)
	{
		// Call parent constructor
		parent::__construct($route, $noticeBoard);	
	}	
}